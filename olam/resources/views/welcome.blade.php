<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alphabet Soup</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="antialiased">
    <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="mt-16">
                <h2>Visualización de Sopa de Letras</h2>

                <!-- Formulario para ingresar lista de palabras y matriz -->
                <form id="app" method="post" action="{{ route('welcome') }}">
                    @csrf
                    <h3>Copiar y pegar el texto</h3>
                    <p>MANATI,PERRO,GATO,CONEJO,TIBURON,ELEFANTE,ALCON,SERPIENTE,JAGUAR,CANGURO,LOBO,MONO,NUTRIA,LEON,LORO,TORO,ORUGA</p>
                    <label for="listaPalabras">Lista de Palabras (separadas por comas):</label>
                    <input type="text" name="listaPalabras" required>
                    <br>
                    <br>
                    <label for="matriz">Matriz (separada por comas):</label>
                    <textarea name="matriz" required rows="15" cols="50"></textarea>
                    <br>
                    <h3>Copiar y pegar el texto</h3>
                    <p>N,D,E,K,I,C,A,N,G,U,R,O,G,E<br>
                        S,X,R,Y,K,V,I,I,Q,G,W,Q,O,D<br>
                        J,A,G,U,A,R,Z,W,B,N,K,O,U,A<br>
                        M,L,E,L,E,F,A,N,T,E,H,O,G,W<br>
                        L,O,B,O,N,U,T,R,I,A,O,U,S,U<br>
                        W,W,O,S,O,G,A,T,O,V,R,T,M,O<br>
                        H,L,Z,N,C,T,Y,Z,E,O,X,A,U,R<br>
                        C,E,C,Y,T,I,B,U,R,O,N,S,R,O<br>
                        C,O,N,E,J,O,Y,U,S,M,R,S,H,T<br>
                        Y,N,I,F,E,F,P,T,E,Z,O,O,S,F<br>
                        O,S,S,E,R,P,I,E,N,T,E,F,L,G<br>
                        P,P,V,D,D,X,U,F,A,L,C,O,N,Y<br>
                        M,O,N,O,C,U,Q,W,M,A,N,A,T,I<br>
                        N,N,X,H,E,B,P,M,U,P,E,R,R,O</p>
                    <button type="submit">Buscar Palabras</button>
                </form>

                <!-- Mostrar resultados si están disponibles -->
                @if (isset($listaPalabras) && isset($matriz))


                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                        <table border="1">
                            @foreach ($matriz as $fila)
                                <tr>
                                    @foreach ($fila as $letra)
                                        <td>{{ $letra }}</td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                    </div>
                    <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                        <h3>Palabras Encontradas:</h3>
                        <pre>{{ print_r($palabrasEncontradas, true) }}</pre>

                        <h3>Palabras No Encontradas:</h3>
                        <pre>{{ print_r(array_diff($listaPalabras, $palabrasEncontradas), true) }}</pre>
                    </div>
                </div>

                @endif
            </div>
        </div>
    </div>
</body>
</html>
