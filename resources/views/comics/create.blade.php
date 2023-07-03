@extends('layouts.baselayout')

@section('contents')

<form style="width: 900px; margin-left:2em;" method="POST" action="{{ route('comics.store') }}">
    <h2 class="py-2">Inserisci un nuovo Comic:</h2>
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input 
        type="text" 
        class="form-control @error('title') is-invalid @enderror" 
        id="title" 
        name="title"
        value="{{ old('title') }}">
        <div class="invalid-feedback">
            @error('title') {{ $message }} @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="thumb" class="form-label">Immagine</label>
        <input 
        type="text" 
        class="form-control @error('thumb') is-invalid @enderror" 
        id="thumb"  
        name="thumb"  
        value="{{ old('thumb') }}">
        <div class="invalid-feedback">
            @error('thumb') {{ $message }} @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="series" class="form-label">Series</label>
        <input 
        type="text" 
        class="form-control @error('series') is-invalid @enderror" 
        id="series"  
        name="series"  
        value="{{ old('series') }}">
        <div class="invalid-feedback">
            @error('series') {{ $message }} @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <input 
        type="text" 
        class="form-control @error('type') is-invalid @enderror" 
        id="type"  
        name="type"  
        value="{{ old('type') }}">
        <div class="invalid-feedback">
            @error('type') {{ $message }} @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input 
        type="text" 
        class="form-control @error('price') is-invalid @enderror" 
        id="price"  
        name="price"  
        value="{{ old('price') }}">
        <div class="invalid-feedback">
            @error('price') {{ $message }} @enderror
        </div>
    </div>

    <div class="mb-3">
        <label for="sale_date" class="form-label">Sale-date</label>
        <input 
        type="text" 
        class="form-control @error('sale_date') is-invalid @enderror" 
        id="sale_date"  
        name="sale_date"  
        value="{{ old('sale_date') }}">
        <div class="invalid-feedback">
            @error('sale_date') {{ $message }} @enderror
        </div>
    </div>


    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea 
        class="form-control @error('sale_date') is-invalid @enderror" 
        id="description" 
        rows="3" 
        name="description"
        value="{{ old('description') }}"
        >
        </textarea>
        <div class="invalid-feedback">
            @error('description') {{ $message }} @enderror
        </div>
    </div>

    <button class="btn btn-primary">Salva</button>
</form>
@endsection