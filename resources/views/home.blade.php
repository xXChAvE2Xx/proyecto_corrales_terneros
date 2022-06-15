@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6> 
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12 d-flex flex-wrap">
            @foreach ($breedings as $breeding)
                <div class="card fat-type-{{$breeding->fat_type}}" style="width: 18rem; margin-right:15px; margin-top:15px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Example_image.svg/600px-Example_image.svg.png" class="card-img-top" alt="Ternera">
                    <div class="card-body">
                        <h5 class="card-title">Numero de cría: {{$breeding->id}}</h5>
                        <p class="card-text">{{$breeding->description}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Fecha: {{date_format($breeding->created_at,"d/m/Y H:i:s");}}</li>
                        <li class="list-group-item">Costo: {{$breeding->cost}} pesos</li>
                        <li class="list-group-item">Peso: {{$breeding->weight}} kg</li>
                        <li class="list-group-item" id="grasa-1">Grasa tipo {{ $breeding->fat_type }}</li>
                    </ul>
                    <div class="card-body">
                        <div class="btn-group-vertical justify-content-center" role="group">
                            <a href="{{ route('breeding.show', ['id' => $breeding->id]) }}" class="btn btn-primary">Ver más información</a>
                        </div>
                    </div>  
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
