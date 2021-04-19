@extends('layouts/main')
@section('content')
<h2>Toutes les Recettes</h2>
<table style="border: 1px solid ligthblue;">
    <tr>
        <th>Id</th>
        <th>Author Id</th>
        <th>Title</th>
        <th>url</th>
        <th>date</th>
    </tr>
    @foreach($recettes as $recette)
    <tr>
        <td>{{$recette['id']}}</td>
        <td>{{$recette['author_id']}}</td>
        <td>{{$recette['title']}}</td>
        <td>{{$recette['url']}}</td>
        <td>{{$recette['date']}}</td>
    </tr>
    @endforeach
</table>
@endsection