@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
        <h2>Se está editando la cría No.: {{ $breeding->id }}</h2>
            @if (count($errors) > 0)
            <div class = "alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('breeding.update', ['id' => $breeding->id])}}" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="peso" class="form-label">Peso en kg</label>
                    <input type="number" class="form-control" name="peso" value="{{$breeding->weight}}">
                </div>
                <div class="mb-3">
                    <label for="costo" class="form-label">Costo</label>
                    <input type="number" class="form-control" name="costo" value="{{$breeding->cost}}">
                </div>
                <div class="mb-3">
                    <label for="color_musculo" class="form-label">Color del musculo</label>
                    <select class="form-select" name="color_musculo">
                    <option selected hidden>Selecciona una opcion</option>
                        <option value="1" @if ($breeding->color_muscle == 1) selected @endif>1</option>
                        <option value="2" @if ($breeding->color_muscle == 2) selected @endif>2</option>
                        <option value="3" @if ($breeding->color_muscle == 3) selected @endif>3</option>
                        <option value="4" @if ($breeding->color_muscle == 4) selected @endif>4</option>
                        <option value="5" @if ($breeding->color_muscle == 5) selected @endif>5</option>
                        <option value="6" @if ($breeding->color_muscle == 6) selected @endif>6</option>
                        <option value="7" @if ($breeding->color_muscle == 7) selected @endif>7</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="marmoleo" class="form-label">Marmoleo</label>
                    <select class="form-select" name="marmoleo">
                        <option selected hidden>Selecciona una opcion</option>
                        <option value="1" @if ($breeding->marbling == 1) selected @endif>Calidad 1</option>
                        <option value="2" @if ($breeding->marbling == 2) selected @endif>Calidad 2</option>
                        <option value="3" @if ($breeding->marbling == 3) selected @endif>Calidad 3</option>
                        <option value="4" @if ($breeding->marbling == 4) selected @endif>Calidad 4</option>
                        <option value="5" @if ($breeding->marbling == 5) selected @endif>Calidad 5</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="proveedor" class="form-label">Proveedor</label>
                    <select class="form-select" name="proveedor">
                        <option selected hidden>Selecciona una opcion</option>
                        @foreach ($supplies as $supplie)
                            <option value="{{$supplie->id}}" @if ($breeding->id_supplier == $supplie->id) selected @endif>{{$supplie->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripcion</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" cols="10" onKeyDown="valida_num_caracteres()" onKeyUp="valida_num_caracteres()">{{ $breeding->description }}</textarea>
                    <p class="text-end fw-light text-secondary" id="msg-caracteres"></p>
                </div>
                <button class="btn btn-primary">Editar cría</button>
                <a class="btn btn-secondary" href="{{ route('breeding.show', ['id' => $breeding->id]) }}">Regresar</a>
            </form>
        </div>
    </div>
@endsection