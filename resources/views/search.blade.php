@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">
            

            <div class="content">
            <div class="title m-b-md">
                    SoportApp
                </div>
            @auth
            
                <form method="post" action="{{ action('OrderServiceController@search') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-group mb-3">
                <input name="nic" id="nic" type="number" class="form-control" placeholder="Search Nic/OS" aria-label="Nic" aria-describedby="button-addon2" required>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search  &#128269;</button>
                </div>
                </div>
                </form>
                @if(isset($images))
                <div class="sliderr">
			        <ul>
				
                        @foreach($images as $image)
                            <a href="http://soportapp.tk/storage/{{ $image }}"><img weight="100px" height="100px"  src="http://soportapp.tk/storage/{{ $image }}" /></a>
                        @endforeach
                    </ul>
		        </div>
                @endif
                @if(isset($message))
                    <p style="color:Red;">{{ $message }} </p>
                @endif
                @if(isset($details))
                    <p> The Search results for your query <b> {{ $query }} </b> are :</p>
                    <h2>Nic details</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nic</th>
                            <th>OS</th>
                            <th>Ver</th>
                            @admin
                            <th>Editar</th>
                            <th>Eliminar</th>
                            @endadmin
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($details as $nic)
                        <tr>
                            <td>{{$nic->client_nic}}</td>
                            <td>{{$nic->os}}</td>
                            <td><a href="{{ URL('/search/'.$nic->client_nic.'-'.$nic->os )}}">👁</a></td>
                            @admin
                            <td><a href="{{ URL('/editos/'.$nic->client_nic.'-'.$nic->os )}}">✎</a></td>
                            <td><a href="{{ URL('/deleteos/'.$nic->os )}}">🚮</a></td>
                            @endadmin
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

            @else
            <div class="links">
                    <a href="{{ route('login') }}">Login 👤</a>
                </div>
            @endauth
                
                <div class="links">
                    @admin
                    <a href="/listar">Back to list</a>
                    @endadmin
                    <a href="/">Back to main</a>
                </div>
            </div>
        </div>
@endsection
