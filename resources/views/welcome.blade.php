<x-guest-layout>

    <div class="flex-center position-ref full-height">
        <div class="content">

            <div class="title m-b-md">
                SoportApp
            </div>
            @if (isset($message))
                <p style="color:Red;">{{ $message }} </p>
            @endif
            @auth
                <div class="links">
                    <a class="btn" href="{{ url('/download') }}">Download App 📲</a>
                    <a class="btn" href="{{ url('/search') }}">Buscar evidencias &#128269;</a>
                    <a class="btn" href="{{ url('/evidencias') }}">Agregar evidencias ➕</a>
                    @admin
                        <a class="btn" href="{{ action('UserController@index') }}">Users 👥</a>
                        <a class="btn" href="{{ url('/myadmin') }}">DB Admin 💾</a>
                        <a class="btn" href="{{ url('/listar') }}">Ver Lista OS 👁</a>
                    @endadmin
                </div>
            @else
                <div class="links">
                    <a href="{{ route('login') }}">Login 👤</a>
                </div>
            @endauth


        </div>
    </div>

</x-guest-layout>
