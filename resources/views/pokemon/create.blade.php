@extends('base')

@section('basecontent')

    <form action="{{url('pokemon')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="nombre">nombre</label>
            <input value="{{old('nombre')}}" required type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre de pokemon">
        </div>
        <div class="form-group">
            <label for="vida">vida</label>
            <input value="{{old('vida')}}" required type="number" class="form-control" id="vida" name="vida" placeholder="vida">
        </div>
        <div class="form-group">
            <label for="defensa">defensa</label>
            <input value="{{old('defensa')}}" required type="text" class="form-control" id="defensa" name="defensa" placeholder="defensa">
        </div>
        <div class="form-group">
            <label for="sexo">sexo</label>
            <input value="{{old('sexo')}}" required type="text" class="form-control" id="sexo" name="sexo" placeholder="sexo del pokemon">
        </div>
        <div class="form-group">
            <label for="tamaño">tamaño</label>
            <input value="{{old('tamaño')}}" required type="text" class="form-control" id="tamaño" name="tamaño" placeholder="tamaño">
        </div>
        <div class="form-group">
            <label for="tipo">tipo</label>
            <input value="{{old('tipo')}}" required type="text" class="form-control" id="tipo" name="tipo" placeholder="tipo">
        </div>
        <button type="submit" class="btn btn-primary">add</button>
    </form>

@endsection