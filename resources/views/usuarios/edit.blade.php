@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
     <div class="col-sm-6">
            <!--Mostrar errores en pantalla-->
            <h1>Editar Usuario:{{ $user->name}}</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <!-- fin del codigo para mostrar errores en pantalla -->

            <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
            @method('PATCH')
             @csrf <!--Token utilizado como seguridad para validad que el formulario esta siendo enviado por el usuario logeado y evitar uan inyección sql -->
                  <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}" placeholder="Escribe tu nombre">
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="Escribe tu email">
                  </div>
                  <button type="submit" class="btn btn-primary">Actualizar</button>
                  <a href="{{url('usuarios')}}"> <button type="button" class="btn btn-danger">Cancelar</button> </a>
             </form>
     </div>
  </div>
</div>
@endsection