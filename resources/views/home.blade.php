@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 d-flex flex-nowrap">
            @foreach ($breedings as $breeding)
                <div class="card" style="width: 18rem; margin-right:15px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Example_image.svg/600px-Example_image.svg.png" class="card-img-top" alt="Ternera">
                    <div class="card-body">
                        <h5 class="card-title">{{$breeding->color_muscle}}</h5>
                        <p class="card-text">{{$breeding->description}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Costo: {{$breeding->cost}} pesos</li>
                        <li class="list-group-item">Peso: {{$breeding->weight}} kg</li>
                        <li class="list-group-item">Grasa tipo {{$breeding->color_muscle}}</li>
                        <li class="list-group-item">Grasa tipo {{$breeding->color_muscle}}</li>
                    </ul>
                    <div class="card-body">
                        <a href="#" class="card-link">Enferma</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
