{{-- @extends('home'); --}}

{{-- @section('contents') --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DC-comics</title>
</head>
<body>
    <div class="container-big d-flex g-5">
        @foreach($comics as $comic)
        <div class="card" style="width: 18rem;">
            <img style="height: 120px" src="{{$comic->thumb}} " class="card-img-top" alt="{{$comic->title}} ">
            <div class="card-body">
              <h5 class="card-title">{{$comic->title}}</h5>
              <p class="card-text">{{$comic->series}}</p>
              <p class="card-text">{{$comic->price}} $</p>
              <a href="{{route('comics.show', ['comic' => $comic->id])}} " class="btn btn-primary">Mostra</a>
            </div>
          </div>
        @endforeach
    </div>
</body>
</html>


{{-- @endsection --}}