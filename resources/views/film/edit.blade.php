<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('films.update', $film->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <input type="text" name="title" value="{{$film->title}}" placeholder="Titolo">
        <input type="text" name="director" value="{{$film->director}}" placeholder="Regista">
        <input type="text" name="cast" value="{{$film->cast}}" placeholder="Attori">
        <input type="text" name="price" value="{{$film->price}}" placeholder="Prezzo">
        <input type="text" name="year" value="{{$film->year}}" placeholder="Anno">
        <input type="text" name="production_house" value="{{$film->production_house}}" placeholder="Casa di produzione">
        <input type="hidden" name="id" value="{{$film->id}}">
        <input type="submit" value="Vai">
    </form>
</body>
</html>