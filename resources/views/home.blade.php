@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6> 
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12 d-flex flex-nowrap">
            @foreach ($breedings as $breeding)
                <div class="card" style="width: 18rem; margin-right:15px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Example_image.svg/600px-Example_image.svg.png" class="card-img-top" alt="Ternera">
                    <div class="card-body">
                        <p class="card-text">{{$breeding->description}}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Fecha: {{date_format($breeding->created_at,"d/m/Y H:i:s");}}</li>
                        <li class="list-group-item">Costo: {{$breeding->cost}} pesos</li>
                        <li class="list-group-item">Peso: {{$breeding->weight}} kg</li>
                        <li class="list-group-item">Grasa tipo {{$breeding->color_muscle}}</li>
                    </ul>
                    <div class="card-body">
                        <div class="btn-group-vertical justify-content-center" role="group">
                            <a href="{{ route('breeding.show', ['id' => $breeding->id]) }}" class="btn btn-primary">Ver más información</a>
                            @if (Auth::user()->id_position == 1)
                                <a href="{{ route('breeding.edit', ['id' => $breeding->id]) }}" class="btn btn-secondary"><i class="fa fa-pencil-square-o"></i> Editar</a>
                            @endif

                            @if (Auth::user()->id_position == 3)
                                <a href="#" class="btn btn-info">Registrar datos de sensores</a>
                            @endif
                        </div>
                        
                    </div>  

                    
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
