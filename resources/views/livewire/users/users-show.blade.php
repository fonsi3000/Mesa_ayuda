<div>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Creando Nuevo Usuario</h5> 
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('users.update', $user->id) }}">

            @csrf
            <input type="hidden" name="user_id" value="{{$user->id}}">
            <div class="mb-3">
              <label class="form-label" for="basic-default-fullname">Nombre Completo</label>
              <input type="text" name="name" value="{{$user->name}}" class="form-control" id="basic-default-fullname" placeholder="John Doe" />
            </div>
          
            <div class="mb-3">
              <label class="form-label" for="basic-default-email">Correo Electronico</label>
              <div class="input-group input-group-merge">
                <input type="text" name="email"  value="{{$user->email}}" id="basic-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2" />
             
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="basic-default-password">Contraseña</label>
              <input type="password" name="old_password" id="basic-default-password" class="form-control phone-mask" placeholder="Contraseña" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="basic-default-password">Contraseña nueva</label>
                <input type="password" name="new_password" id="basic-default-password" class="form-control phone-mask" placeholder="Contraseña" />
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>
        </div>
      </div> 
</div>
