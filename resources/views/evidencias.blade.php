@extends('layouts.app')

@section('content')
            <div class="container">
            
                <div class="title">
                    SoportApp
                </div>
                @auth
                @if(isset($message))
                    <p style="color:Red;">{{ $message }} </p>
                @endif
                <form class="justify-content-center " action="{{ action('OrderServiceController@uploadweb') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <div class="form-group row">
                    <label for="nic"  class="col-sm-2 col-form-label">Nic</label>
                    <div class="col-sm-10">
                      <input type="number" maxlength="10" name="nic" class="form-control" id="nic" placeholder="Nic" required>
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="os" class="col-sm-2 col-form-label">OS</label>
                    <div class="col-sm-10">
                      <input type="number" name="os" maxlength="10" class="form-control" id="os" placeholder="OS" required>
                    </div>
                  </div>
                  <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                  </div>
                  <div class="custom-file">
                    <input type="file" name="pic" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" required>
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                  </div>
                </div>
                  
                  <div class="form-group row">
                    <div class="col-sm-10">
                      <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                  </div>
                </form>


                <div class="links">
                    <a href="/">Back to main</a>
                    @admin
                    <a href="/listar">Back to list</a>
                    @endadmin
                </div>
                @else
                <div class="links">
                    <a href="{{ route('login') }}">Login 👤</a>
                </div>
                @endauth
            </div>
        </div>
@endsection
