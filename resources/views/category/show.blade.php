@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6> 
    @endif
    <h3 class="text-center">Ordenado por 
        @if ($id == 1)
            grasa tipo 1
        @endif
        @if ($id == 2)
            grasa tipo 2
        @endif
        @if ($id == 3)
            crías enfermas
        @endif
        @if ($id == 4)
            crías sanas
        @endif
        @if ($id == 5)
            crías en cuarentena
        @endif
    </h3>
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
                        @if ($breeding->sick == 0)
                            <li class="list-group-item list-group-item-success">Cría Saludable</li>
                        @endif

                        @if ($breeding->sick == 1)
                            <li class="list-group-item list-group-item-danger">Cría por enfermar</li>
                        @endif 

                        @if ($breeding->quarantine == 1)
                            <li class="list-group-item list-group-item-warning">En cuarentena</li>
                        @endif
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