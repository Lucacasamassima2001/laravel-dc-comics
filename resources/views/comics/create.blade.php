@extends('layouts.baselayout')

@section('contents')
<h2 class="py-2">Inserisci un nuovo Comic:</h2>
<form method="POST" action="{{ route('comics.store') }}">
    @csrf
    <div class="mb-3">
        <label for="titolo" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title">
    </div>

    <div class="mb-3">
        <label for="src" class="form-label">Thumb</label>
        <input type="text" class="form-control" id="thumb" name="thumb" @error('src') is-invalid @enderror>
        <div class="invalid-feedback">
            @error('src') {{ $message }} @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="tipo" class="form-label">Series</label>
        <input type="text" class="form-control" id="series" name="series">
    </div>

    <div class="mb-3">
        <label for="tipo" class="form-label">Type</label>
        <input type="text" class="form-control" id="type" name="type">
    </div>

    <div class="mb-3">
        <label for="cottura" class="form-label">Price</label>
        <input type="text" class="form-control" id="price" name="price">
    </div>

    <div class="mb-3">
        <label for="peso" class="form-label">Sale-date</label>
        <input type="text" class="form-control" id="sale_date" name="sale_date">
    </div>


    <div class="mb-3">
        <label for="descrizione" class="form-label">Description</label>
        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
    </div>

    <button class="btn btn-primary">Salva</button>
</form>
@endsection