<div>
  <div class="row">
   <div class="col-lg-12">
       
      <div class="card">
 <div class="table-responsive text-nowrap">
   <a href="{{ route('users.create') }}" class="btn btn-primary">Crear Nuevo Usuario</a>
   <table class="table">
     <thead>
       <tr>
         <th>Id</th>
         <th>Nombre</th>
         <th>Email</th>
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
                   <td>{{$user->created_at}}</td>
                   <td>
                     <a href="{{ route('users.show', $user->id )}}">Editar</a> | 
                     <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">
                         @csrf
                         @method('DELETE')
                         <a href="#" onclick="this.closest('form').submit();">Eliminar</a>
                     </form>
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
