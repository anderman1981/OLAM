<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;

class AlphabetSoupController extends Controller
{

    public function welcome(Request $request)
    {
        if ($request->isMethod('post')) {
            // Si el formulario fue enviado, procesa los datos
            $listaPalabras = explode(',', $request->input('listaPalabras'));
            $matrizInput = $request->input('matriz');

            // Divide las filas de la matriz
            $filas = explode(PHP_EOL, $matrizInput);

            // Inicializa la matriz
            $matriz = [];

            // Recorre cada fila y convierte los valores en un array
            foreach ($filas as $fila) {
                // Divide las columnas de la fila
                $columnas = explode(',', $fila);
                $matriz[] = $columnas;
            }

            // Lógica de búsqueda de palabras en la sopa de letras
            $resultados = $this->buscarPalabras($listaPalabras, $matriz);
            $resultadosAni = $this->buscarPalabrasAnimadas($listaPalabras, $matriz);

            // Retornar vista con los resultados
            return view('buscar', [
                'matriz' => $matriz,
                'listaPalabras' => $listaPalabras,
                'palabrasEncontradas' => $resultados['encontradas'],
                'palabrasNoEncontradas' => $resultados['noEncontradas'],
                'resultados' => $resultadosAni['encontradas'],
            ]);
        } else {
            // Si es una carga inicial, simplemente carga la vista
            return view('welcome');
        }
    }


    /**
     * Método para buscar palabras en la matriz de la sopa de letras.
     *
     * @param array $listaPalabras
     * @param array $matriz
     * @return array
     */
    public function buscarPalabras(array $listaPalabras, array $matriz)
    {
        $encontradas = [];
        $noEncontradas = [];

        $filas = count($matriz);
        $columnas = count($matriz[0]);

        foreach ($listaPalabras as $palabra) {
            $encontrada = false;

            // Búsqueda horizontal y vertical
            for ($i = 0; $i < $filas; $i++) {
                $fila = '';
                $columna = '';
                for ($j = 0; $j < $columnas; $j++) {
                    $fila .= $matriz[$i][$j];
                    $columna .= $matriz[$j][$i];
                }

                if (strpos($fila, $palabra) !== false || strpos($columna, $palabra) !== false) {
                    $encontradas[] = $palabra;
                    $encontrada = true;
                    break;
                }
            }

            // Búsqueda diagonal (izquierda a derecha, arriba a abajo y abajo a arriba)
            for ($i = 0; $i < $filas; $i++) {
                for ($j = 0; $j < $columnas; $j++) {
                    $diagonal1 = '';
                    $diagonal2 = '';
                    for ($k = 0; $k < strlen($palabra); $k++) {
                        if ($i + $k < $filas && $j + $k < $columnas) {
                            $diagonal1 .= $matriz[$i + $k][$j + $k];
                        }
                        if ($i - $k >= 0 && $j + $k < $columnas) {
                            $diagonal2 .= $matriz[$i - $k][$j + $k];
                        }
                    }
                    if (strpos($diagonal1, $palabra) !== false || strpos($diagonal2, $palabra) !== false) {
                        $encontradas[] = $palabra;
                        $encontrada = true;
                        break;
                    }
                }
            }

            if (!$encontrada) {
                $noEncontradas[] = $palabra;
            }
        }

        return [
            'encontradas' => array_values(array_unique($encontradas)),
            'noEncontradas' => $noEncontradas,
        ];
    }

    /**
     * Método para cargar la matriz y la lista de palabras desde el archivo JSON.
     *
     * @return array
     */
    public function cargarDatosDesdeJSON()
    {
        $rutaJSON = public_path('files/matriz.json');

        if (File::exists($rutaJSON)) {
            $contenidoJSON = File::get($rutaJSON);
            return json_decode($contenidoJSON, true);
        }

        return [];
    }
}
