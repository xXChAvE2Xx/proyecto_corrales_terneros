@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6> 
    @endif

    @if ($breeding->quarantine == 1)
        <h6 class="alert alert-warning">Esta cría se encuentra en cuarentena desde el {{date_format($breeding->updated_at,"d/m/Y");}}</h6> 
    @endif

    <div class="col">
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Example_image.svg/600px-Example_image.svg.png">
    </div>
    <div class="col">
        <ul class="list-group">
            <li class="list-group-item active">Información de la cría </li>
            <li class="list-group-item">Peso: {{$breeding->weight}} Kg</li>
            <li class="list-group-item">Costo: {{$breeding->cost}} pesos</li>
            <li class="list-group-item">Color de Musculo: {{$breeding->color_muscle}}</li>
            <li class="list-group-item">Marmoleo: Calidad {{$breeding->marbling}}</li>
            <li class="list-group-item">Descripción: {{$breeding->description}}</li>
            <li class="list-group-item">Fecha de registro: {{ date_format($breeding->created_at,"d/m/Y H:i:s"); }}</li>
            <li class="list-group-item">Proveedor: {{$supplie->name}}</li>
            @if ($breeding->quarantine == 1)
                <li class="list-group-item">Corral Actual: {{$corral->name}}</li>
            @endif
        </ul>
        @if (Auth::user()->id_position == 1)
            <a href="{{ route('breeding.edit', ['id' => $breeding->id]) }}" class="btn btn-secondary"><i class="fa fa-pencil-square-o"></i> Editar</a>                                
        @endif
    </div>
    <div class="col">
        <ul class="list-group">
            <li class="list-group-item active">Salud de la cría</li>
            @if ($health != null)
                @if (($health->temperature >= 37.5 && $health->temperature <= 39.5) && ($health->heart_frecuency >= 70 && $health->heart_frecuency <= 80) && ($health->breathing_rate >= 15 && $health->breathing_rate <= 20) && ($health->blood_pressure >= 8 && $health->blood_pressure <= 10))
                    
                    <li class="list-group-item list-group-item-success">Cría Saludable
                        @if (Auth::user()->id_position == 2 && $breeding->quarantine == 1)
                            <a href="{{ route('quarantine.index', ['id' => $breeding->id]) }}" class="btn btn-sm btn-success">Eliminar Cuarentena</a>
                        @endif
                    </li>
                @else
                    <li class="list-group-item list-group-item-danger">Cría por enfermar 
                        @if (Auth::user()->id_position == 2 && $breeding->quarantine == 0)
                            <a href="{{ route('quarantine.index', ['id' => $breeding->id]) }}" class="btn btn-sm btn-danger">Poner en cuarentena</a>
                        @endif
                    </li>
                    
                @endif
                <li class="list-group-item @if (($health->temperature >= 37.5 && $health->temperature <= 39.5)) list-group-item-success @else list-group-item-danger @endif">Temperatura: {{$health->temperature}} °C</li>
                <li class="list-group-item @if (($health->heart_frecuency >= 70 && $health->heart_frecuency <= 80)) list-group-item-success @else list-group-item-danger @endif">Frecuencia cardiaca: {{$health->heart_frecuency}} LPM </li>
                <li class="list-group-item @if (($health->breathing_rate >= 15 && $health->breathing_rate <= 20)) list-group-item-success @else list-group-item-danger @endif">Frecuencia respiratoria: {{$health->breathing_rate}} RPM</li>
                <li class="list-group-item @if (($health->blood_pressure >= 8 && $health->blood_pressure <= 10)) list-group-item-success @else list-group-item-danger @endif">Frecuencia sanguínea: {{$health->blood_pressure}} min</li>
                @if (Auth::user()->id_position == 3)
                    <a href="{{ route('health.update', ['id' => $breeding->id] ) }}" class="btn btn-info"> Actualizar datos de sensores</a>
                @endif
            @else
                <li class="list-group-item">No se ha registrado información</li>
                @if (Auth::user()->id_position == 3)
                    <a href="{{ route('health.register', ['id' => $breeding->id] ) }}" class="btn btn-info"> Agregar datos de sensores</a>
                @endif
            @endif
        </ul>
    </div>
  </div>
</div>
@endsection