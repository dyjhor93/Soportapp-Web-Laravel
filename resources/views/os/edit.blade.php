@extends('layouts.app')

@section('content')
<div class="card uper">
  <div class="card-header">
    Edit Orden de servicio
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('orderservice.update', $orderService->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="client_nic">Nic Cliente:</label>
              <input type="number" class="form-control" name="client_nic" value="{{ $orderService->client_nic }}"/>
          </div>
          <div class="form-group">
              <label for="os">Orden de servicio:</label>
              <input type="number" class="form-control" name="os" value="{{ $orderService->os }}"/>
          </div>
          <input type="hidden" class="form-control" name="onic" value="{{ $orderService->client_nic }}"/>
          <input type="hidden" class="form-control" name="oos" value="{{ $orderService->os }}"/>
          <input type="hidden" class="form-control" name="id" value="{{ $orderService->id }}"/>
          <button type="submit" class="btn btn-primary">Actualizar Orden de servicio</button>
      </form>
      <div class="links">
                    @admin
                    <a href="/listar">Back to list</a>
                    @endadmin
                    <a href="/">Back to main</a>
                </div>
  </div>
</div>
@endsection