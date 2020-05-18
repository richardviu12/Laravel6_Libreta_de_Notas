@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-around"> <!--Esta clase permite justificar o auto-ordenar las notas en pantalla, permite que se muestre una al lado de la otra -->
        @foreach($notas as $nota)
        <div class="card border-primary mb-3" style="max-width: 18rem;">
            <div class="card-header"><b>{{$nota->titulo}}</b>
               <br> <p class="small float-right">{{$nota->created_at}}</p>
            </div>
            <div class="card-body text-primary">
                <p class="card-text">{{$nota->texto}}</p>
            </div>
        </div>
        @endforeach
    </div>
@endsection
