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

            @if (session('success'))
                <h6 class="alert alert-success">{{ session('success') }}</h6> 
            @endif
            <form action="{{route('breeding.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="peso" class="form-label">Peso en kg</label>
                    <input type="number" class="form-control" name="peso" placeholder="356">
                </div>
                <div class="mb-3">
                    <label for="costo" class="form-label">Costo</label>
                    <input type="number" class="form-control" name="costo" placeholder="1560">
                </div>
                <div class="mb-3">
                    <label for="color_musculo" class="form-label">Color del músculo</label>
                    <select class="form-select" name="color_musculo">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="marmoleo" class="form-label">Marmoleo</label>
                    <select class="form-select" name="marmoleo">
                        <option value="1">Calidad 1</option>
                        <option value="2">Calidad 2</option>
                        <option value="3">Calidad 3</option>
                        <option value="4">Calidad 4</option>
                        <option value="5">Calidad 5</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="proveedor" class="form-label">Proveedor</label>
                    <select class="form-select" name="proveedor">
                        @foreach ($supplies as $supplie)
                            <option value="{{$supplie->id}}">{{$supplie->name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" cols="10" onKeyDown="valida_num_caracteres()" onKeyUp="valida_num_caracteres()"></textarea>
                    <p class="text-end fw-light text-secondary" id="msg-caracteres">Máximo de caracteres permitiros: 255</p>
                </div>
                <button class="btn btn-info">Agregar nueva cría</button>
                <a class="btn btn-secondary" href="{{route('home')}}">Regresar</a>
            </form>
        </div>
    </div>
@endsection