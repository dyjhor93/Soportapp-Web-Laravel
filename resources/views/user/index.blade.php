@extends('layouts.app')
@section('sidebar')
    
@endsection
@section('content')
        <div class="flex-center position-ref full-height">
            

            <div class="content">
            <div class="title m-b-md">
                    SoportApp
                </div>
                @if(isset($message))
                    <p style="color:Red;">{{ $message }} </p>
                @endif
            @auth
                @if(isset($details))
                    <h2>User Role details</h2>
                    <div class="form-group row">
                    <label for="os" class="col-sm-2 col-form-label">OS</label>
                    <div class="col-sm-10">
                      <input type="text" name="os" onkeyup="myFunction()" maxlength="15" class="form-control" id="os" placeholder="Buscar por correo">
                    </div>
                  </div>
                    
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <!--<th>Ver</th>-->
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                        @foreach($details as $user)
                        
                        <tr>
                        
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <!--<td><a href="{{ action('UserController@show', $user->id )}}">👁</a></td>-->
                            @if($user->id!=Auth::user()->id)
                            <td><a href="{{ route('user.edit', $user->id)}}" >🖉</a></td>
                            <td><a href="{{ route('user.destroy', $user->id)}}}">🚮</a></td>
                            @endif
                        </tr>
                        @endforeach
                        
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
                    <a href="/user">Back to list</a>
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
@endsection
