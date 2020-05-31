@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">
            

            <div class="content">
            <div class="title m-b-md">
                    SoportApp
                </div>
            @auth
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
                    <h2>OS/Nic details</h2>
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
                @endif

            @else
            <div class="links">
                    <a href="{{ route('login') }}">Login 👤</a>
                </div>
            @endauth
                
                <div class="links">
                    <a href="/">Back to main</a>
                </div>
            </div>
        </div>
@endsection
