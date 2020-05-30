@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <a href="{{ url('/download') }}">Download App 📲</a><br>
                    <a href="{{ url('/search') }}">Buscar evidencias &#128269;</a><br>
                    <a href="{{ url('/evidencias') }}">Agregar evidencias </a><br>
                    <a href="{{ url('/myadmin') }}">DB Admin</a><br>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
