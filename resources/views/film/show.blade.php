<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>{{$film->title}}</p>
    <p>{{$film->director}}</p>
    <p>{{$film->cast}}</p>
    <p>{{$film->price}}</p>
    <p>{{$film->year}}</p>
    <p>{{$film->production_house}}</p>
    <form action="{{route('films.destroy', $film->id)}}" method="POST">
        @csrf
        @method('DELETE')
        <input type="submit" value="cancella">
    </form>
</body>
</html>