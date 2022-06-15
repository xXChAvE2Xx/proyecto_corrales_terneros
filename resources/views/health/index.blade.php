@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
         @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-3">
           <h5>Se esta agrenado los datos de la cría número: {{$id}}</h5>
        </div>
        <form action="{{ route('health.store', $id)}}" method="post">
            @csrf
            <label for="temperature" class="form-label">Temperatura</label>
                <input type="text" class="form-control" name="temperature">
            </div>
            <div class="mb-3">
                <label for="heart_frecuency" class="form-label">Frecuencia cardiaca</label>
                 <input type="number" class="form-control" name="heart_frecuency">
            </div>
            <div class="mb-3">
                <label for="breathing_rate" class="form-label">Frecuencia respiratoria</label>
                <input type="number" class="form-control" name="breathing_rate">
            </div>
            <div class="mb-3">
                <label for="blood_pressure" class="form-label">Frecuencia sanguínea</label>
                <input type="number" class="form-control" name="blood_pressure">
            </div>
            <button class="btn btn-primary">Agregar datos del sensor</button>
            <a class="btn btn-secondary" href="{{ route('breeding.show', ['id' => $id]) }}">Regresar</a>
        </form>
    </div>
</div>
@endsection