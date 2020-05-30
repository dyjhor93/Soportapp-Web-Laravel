@extends('layouts.app')

@section('content')
        <div class="flex-center position-ref full-height">
            <div class="content">
            
                <div class="title m-b-md">
                    SoportApp
                </div>
                @auth
                <div class="links">
                    <a href="{{ url('/download') }}">Download App 📲</a>
                    <a href="{{ url('/search') }}">Buscar evidencias &#128269;</a>
                    <a href="{{ url('/evidencias') }}">Agregar evidencias ➕</a>
                    <a href="{{ url('/myadmin') }}">DB Admin 💾</a>
                </div>
                @else
                <div class="links">
                    <a href="{{ route('login') }}">Login 👤</a>
                </div>
                @endauth
                
                
            </div>
        </div>

        @endsection