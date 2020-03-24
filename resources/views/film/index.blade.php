<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(!empty($id))
      <div>Hai cancellato il film {{$id}}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('films.store')}}" method="POST">
        @csrf
        <input type="text" name="title" value="" placeholder="Titolo">
        <input type="text" name="director" value="" placeholder="Regista">
        <input type="text" name="cast" value="" placeholder="Attori">
        <input type="text" name="price" value="" placeholder="Prezzo">
        <input type="text" name="year" value="" placeholder="Anno">
        <input type="text" name="production_house" value="" placeholder="Casa di produzione">
        <input type="submit" value="Vai">
        @method('POST')
    </form>
</body>
</html>