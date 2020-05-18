@extends('layouts.app')

@section('content')
<div class="container">
 <div class="row">
     <div class="col-sm-6">
            <form action="/usuarios" method="POST">
             @csrf <!--Token utilizado como seguridad para validar que el formulario esta siendo enviado por el usuario logeado y evitar uan inyección sql -->
                  <div class="form-group">
                    <label for="name">Nombre:</label>
                    <input type="text" class="form-control" name="name" placeholder="Escribe tu nombre">
                  </div>
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="Escribe tu email">
                  </div>
                  <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                  <button type="submit" class="btn btn-primary">Registrar</button>
                  <a href="{{url('usuarios')}}"><button type="button" class="btn btn-danger">Cancelar</button> </a>
             </form>
     </div>
  </div>
</div>
@endsection