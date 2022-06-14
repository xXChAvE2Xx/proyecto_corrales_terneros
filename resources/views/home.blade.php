@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
           <div class="card" style="width: 18rem;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Example_image.svg/600px-Example_image.svg.png" class="card-img-top" alt="Ternera">
                <div class="card-body">
                    <h5 class="card-title">Nombre</h5>
                    <p class="card-text">Descripcion de la Ternera</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Costo: $1,589 pesos</li>
                    <li class="list-group-item">Peso: 185 kg</li>
                    <li class="list-group-item">Grasa tipo 1</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Enferma</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
