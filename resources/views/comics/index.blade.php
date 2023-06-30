@extends('layouts.baselayout')

@section('contents')


    <div class="container">
        <a href="/comics/create" class="btn btn-primary">Crea nuovo</a>
    </div>
      <div class="container-big d-flex gap-5 flex-wrap justify-content-center py-3">
          @foreach($comics as $comic)
          <div class="card" style="width: 18rem;">
              <img style="height: 250px;" src="{{$comic->thumb}} " class="card-img-top" alt="{{$comic->title}} ">
              <div class="card-body">
                <h5 class="card-title" style="height: 50px">{{$comic->title}}</h5>
                <p class="card-text" style="height: 30px">{{$comic->series}}</p>
                <p class="card-text">{{$comic->price}} $</p>
                <a href="{{route('comics.show', ['comic' => $comic->id])}} " class="btn btn-primary">Mostra</a>
              </div>
            </div>
          @endforeach
      </div>
      <div class="paginator">
        {{ $comics->links('pagination::bootstrap-5') }}
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