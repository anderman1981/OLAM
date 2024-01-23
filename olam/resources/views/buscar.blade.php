@extends('welcome')
@section('content')
    <div>
        <h2>Visualización de Sopa de Letras</h2>
        <h3>Matriz:</h3>
        <pre>{{ print_r($matriz, true) }}</pre>

        <h3>Lista de Palabras:</h3>
        <pre>{{ print_r($listaPalabras, true) }}</pre>

        <h3>Palabras Encontradas:</h3>
        <pre>{{ print_r($palabrasEncontradas, true) }}</pre>

        <h3>Palabras No Encontradas:</h3>
        <pre>{{ print_r(array_diff($listaPalabras, $palabrasEncontradas), true) }}</pre>

    </div>
@endsection
