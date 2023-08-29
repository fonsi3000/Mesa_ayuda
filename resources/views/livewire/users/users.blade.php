<div>
  <div class="row">
   <div class="col-lg-12">
       
      <div class="card">
 <div class="table-responsive text-nowrap">
   <a href="{{ route('users.create') }}" class="btn btn-primary">Crear Nuevo Usuario</a>
   <table class="table">
    <caption>.</caption>
     <thead>
       <tr>
         <th>Id</th>
         <th>Nombre</th>
         <th>Email</th>
         <th>Rol</th>
         <th>Fecha de creacion</th>
         <th>Actions</th>
       </tr>
     </thead>
     <tbody class="table-border-bottom-0">

           @foreach ($users as $user)
               <tr>
                   <td>{{$user->id}}</td>
                   <td>{{$user->name}}</td>
                   <td>{{$user->email}}</td>
                   <td>{{ $user->getRoleNames()->first() ?? 'N/A' }}</td>
                   <td>{{$user->created_at}}</td>
                   <td>
                     <a href="{{ route('users.show', $user->id )}}">Editar</a>
                     @can('admin')
                     | 
                     <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" style="background: none; border: none; color: rgba(82, 124, 236, 0.903); text-decoration: underline; cursor: pointer;">Eliminar</button>
                     </form>
                    @endcan  
                   </td>
               </tr>
            @endforeach
           
     </tbody>
   </table>
 </div>
</div>

   </div>
  </div>
</div>
