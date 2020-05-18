@extends('layouts.app')

@section('content')
<div class="container-fluid">
 <h1>Lista de Usuarios Registrados
    <div class="row">
        <div class="col-3">

            <div class="card bg-danger">
                <h5>Total usuarios Registrados</h5>
                <?php use App\User; $users_count = User::all()->count(); ?>
                <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>
            </div>
        </div>
    </div>
  <a href="usuarios/create"><button type="button" class="btn btn-success float-right">Agregar Usuario</button></a> <br>
 </h1>
    <h6>
       @if($search)
        <div class="alert alert-primary" role="alert">
        Los resultados de su busqueda '{{$search}}'son:
        </div>
        @endif
    </h6>  
    <table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">EMAIL</th>
            <th scope="col">OPCIONES</th>
        </tr>
    </thead>
    <tbody>
        @foreach($Enviar_aVista as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td> 
                    <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST"> 
                        <a href="{{ route('usuarios.show' , $user->id)}}"><button type="button" class="btn btn-dark">Ver</button></a>
                        <a href="{{ route('usuarios.edit' , $user->id)}}"> <button type="button" class="btn btn-primary">Editar</button></a>
                        @csrf <!-- Este token es usado para verificar que el usuario autenticado es quien en realidad está haciendo la petición a la aplicación. -->
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
             </tr>
        @endforeach
    </tbody>
    </table>
        <div class="row">
           <div class="mx-auto"> <!--permite centrar la paginación -->
                {{ $Enviar_aVista->links() }} <!-- Permite activar la paginación , es decir muestra los numeros de páginas-->
            </div>
        </div>    
</div>
@endsection
