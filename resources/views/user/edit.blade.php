<x-app-layout>


<div class="card uper">
  <div class="card-header">
    Editar Usuario
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
      <form method="post" action="{{ route('user.update', $user->id ) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="client_nic">Nombre:</label>
              <input type="text" class="form-control" name="name" value="{{ $user->name }}"/>
          </div>
          <div class="form-group">
              <label for="os">Email:</label>
              <input type="email" class="form-control" name="email" value="{{ $user->email }}"/>
          </div>
          
          <div class="form-group">
            <label for="exampleFormControlSelect2">Role</label>
            <select class="form-control" id="role" name="role">
            <option value="tecnico">Tecnico</option>
            <option value="admin">Admin</option>
            </select>
        </div>
          <input type="hidden" class="form-control" name="id" value="{{ $user->id }}"/>
          <button type="submit" class="btn btn-primary">Actualizar Orden de servicio</button>
      </form>
      <div class="links">
                    @admin
                    <a href="/user">Back to list</a>
                    @endadmin
                    <a href="/">Back to main</a>
                </div>
  </div>
</div>
</x-app-layout>