@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
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
            <li class="list-group-item">Fecha de registro: {{  }}</li>
            <li class="list-group-item">Proveedor: {{$supplie->name}}</li>
        </ul>
    </div>
    <div class="col">
        <ul class="list-group">
            <li class="list-group-item active">Salud de la cría</li>
            @if ($health != null)
                @if (($health->temperature >= 37.5 && $health->temperature <= 39.5) && ($health->heart_frecuency >= 70 && $health->heart_frecuency <= 80) && ($health->breathing_rate >= 15 && $health->breathing_rate <= 20) && ($health->blood_pressure >= 8 && $health->blood_pressure <= 10))
                    
                    <li class="list-group-item list-group-item-success">Cría Saludable</li>

                @else
                    <li class="list-group-item list-group-item-danger">Cría por enfermar</li>
                @endif
                <li class="list-group-item @if (($health->temperature >= 37.5 && $health->temperature <= 39.5)) list-group-item-success @else list-group-item-danger @endif">Temperatura: {{$health->temperature}} °C</li>
                <li class="list-group-item @if (($health->heart_frecuency >= 70 && $health->heart_frecuency <= 80)) list-group-item-success @else list-group-item-danger @endif">Frecuencia cardiaca: {{$health->heart_frecuency}} LPM </li>
                <li class="list-group-item @if (($health->breathing_rate >= 15 && $health->breathing_rate <= 20)) list-group-item-success @else list-group-item-danger @endif">Frecuencia respiratoria: {{$health->breathing_rate}} RPM</li>
                <li class="list-group-item @if (($health->blood_pressure >= 8 && $health->blood_pressure <= 10)) list-group-item-success @else list-group-item-danger @endif">Frecuencia sanguínea: {{$health->blood_pressure}} min</li>
            @else
                <li class="list-group-item">No se ha registrado información</li>
            @endif
        </ul>
    </div>
  </div>
</div>
@endsection