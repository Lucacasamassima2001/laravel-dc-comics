@extends('layouts.baselayout')

@section('contents')


        @if(session('delete_success'))
        @php $comic =session('delete_success')@endphp
        <div class="alert alert-danger mx-3">
        Il {{$comic->title}} è stato eliminato in maniera definitiva
        </div>
        @endif

      
      <h1 class="text-center text-danger">Cestino:</h1>
      <div class="container-big d-flex gap-5 flex-wrap justify-content-center py-3">
          @foreach($trashedcomics as $comic)
          <div class="card" style="width: 18rem;">
              <img style="height: 250px;" src="{{$comic->thumb}} " class="card-img-top" alt="{{$comic->title}} ">
              <div class="card-body">
                <h5 class="card-title" style="height: 50px">{{$comic->title}}</h5>
                <p class="card-text" style="height: 30px">{{$comic->series}}</p>
                <p class="card-text">{{$comic->price}} $</p>
                <form 
                action="{{route('comics.restore', ['comic' => $comic->id])}}" 
                method="post"
                class="d-inline-block"
                >
                  @csrf
                  <button class="btn btn-warning">Ripristina</button>
                </form>
                <form 
                action="{{route('comics.harddelete', ['comic' => $comic->id])}}" 
                method="post"
                class="d-inline-block"
                >
                  @csrf
                  @method('delete')
                  <button class="btn btn-danger">Elimina definitivamente</button>
                </form>
              </div>
            </div>
          @endforeach
      </div>
      <div class="paginator">
        {{ $trashedcomics->links('pagination::bootstrap-5') }}
      </div>


      
      
      
      {{-- <div>
          <ul>
              @for($i = 1; $i <= $comics->lastPage(); $i++)
                  <li>
                      <a href="/comics?page={{ $i }}">{{ $i }}</a>
                  </li>
              @endfor
          </ul>
      </div> --}}
      
  


@endsection