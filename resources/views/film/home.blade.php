<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(!empty($title))
      <div>Hai cancellato il film {{$title}}</div>
    @endif
    <div class="data">
        @foreach ($films as $films)
            <div>
            <p>{{$films->title}}</p>
            <p>{{$films->director}}</p>
            <p>{{$films->cast}}</p>
            <p>{{$films->price}}</p>
            <p>{{$films->year}}</p>
            <p>{{$films->production_house}}</p>
            <form action="{{route('films.show', $films->id)}}" method="GET">
                @csrf
                @method('GET')
                <input type="hidden" name="id" value="{{$films->id}}">
                <input type="submit" value="vedi">
            </form>
            </div>
        @endforeach
    </div>
</body>
</html>