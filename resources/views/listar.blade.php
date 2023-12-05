<x-app-layout>


        <div class="flex-center position-ref full-height">
            

            <div class="content">
            <div class="title m-b-md">
                    SoportApp
                </div>
                @if(isset($message))
                    <p style="color:Red;">{{ $message }} </p>
                @endif
            @auth
                @if(isset($images))
                <div class="sliderr">
			        <ul>
				
                        @foreach($images as $image)
                            <a href="/storage/{{ $image }}"><img weight="100px" height="100px"  src="/storage/{{ $image }}" /></a>
                        @endforeach
                    </ul>
		        </div>
                @endif
                @if(isset($details))
                    <h2>OS/Nic details</h2>
                    <div class="form-group row">
                    <label for="os" class="col-sm-2 col-form-label">OS</label>
                    <div class="col-sm-10">
                      <input type="number" name="os" onkeyup="myFunction()" maxlength="15" class="form-control" id="os" placeholder="Buscar por orden de servicio">
                    </div>
                  </div>
                    
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Nic</th>
                            <th>OS</th>
                            <th>Ver</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                        @foreach($details as $nic)
                        <tr>
                            <td>{{$nic->client_nic}}</td>
                            <td>{{$nic->os}}</td>
                            <td><a href="{{ URL('/search/'.$nic->client_nic.'-'.$nic->os )}}">👁</a></td>
                            <!--<td><a href="{{ URL('/editos/'.$nic->client_nic.'-'.$nic->os )}}">✎</a></td>-->
                            <td><a href="{{ route('orderservice.edit', $nic->id)}}" >🖉</a></td>
                            
                            <td><a href="{{ URL('/deleteos/'.$nic->os )}}">🚮</a></td>
                        </tr>
                        @endforeach
                        <!--
                    <tfoot>
                        <tr>
                            <th>Nic</th>
                            <th>OS</th>
                            <th>Ver</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </tfoot>-->
                    </table>

<!--
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nic</th>
                            <th>OS</th>
                            <th>Ver</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $nic)
                        <tr>
                            <td>{{$nic->client_nic}}</td>
                            <td>{{$nic->os}}</td>
                            <td><a href="{{ URL('/search/'.$nic->client_nic.'-'.$nic->os )}}">👁</a></td>
                            <td><a href="{{ URL('/editos/'.$nic->client_nic.'-'.$nic->os )}}">✎</a></td>
                            <td><a href="{{ URL('/deleteos/'.$nic->os )}}">🚮</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
-->
                @endif
            @else
            <div class="links">
                    <a href="{{ route('login') }}">Login 👤</a>
                </div>
            @endauth
                
                <div class="links">
                    <a href="/">Back to main</a>
                    <a href="/listar">Back to list</a>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ asset('js/addons/datatables.min.js') }}"></script>
    <script type="text/javascript">
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("os");
            filter = input.value.toUpperCase();
            table = document.getElementById("dtBasicExample");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</x-app-layout>
