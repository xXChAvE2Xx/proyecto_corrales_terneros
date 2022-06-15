@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('quarantine.update', ['id' => $breeding->id]) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <input type="hidden" class="form-control" name="quarantine" value="@if ($breeding->quarantine == 0) 1 @else 0 @endif">
                </div>
                <div class="mb-3">
                    <label for="corral" class="form-label">Se trasladó al corral:</label>
                    <select class="form-select" name="corral">
                        @foreach ($corrals as $corral)
                            <option value="{{$corral->id}}">{{$corral->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-warning">Poner en cuarentena</button>
                <a class="btn btn-secondary" href="{{route('breeding.show', ['id' => $breeding->id])}}">Regresar</a>
            </form>
        </div>
    </div>
@endsection