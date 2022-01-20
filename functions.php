<?php

// Según la ficha introducida devolvemos 1 o -1
function comprobarFicha($ficha) {
    switch ($ficha) {
        case "O": return 1;
        case "X": return -1;
    }
}

// Comprobación de filas, columnas y diagonales para averiguar si hay un ganador
// En caso de haber un ganador devolvemos el valor que posteriormente se introducirá en $result['gameRes']
function hayTresEnRaya($tablero, $ficha) {
    global $ganador;
    for ($i = 0; $i < count($tablero); $i++) {
        if (!$ganador) {
            if ($tablero[$i][0] == $ficha && $tablero[$i][1] == $ficha && $tablero[$i][2] == $ficha) {
                $ganador = true;
                return comprobarFicha($ficha);
            }
        }
        if (!$ganador) {
            if ($tablero[0][$i] == $ficha && $tablero[1][$i] == $ficha && $tablero[2][$i] == $ficha) {
                $ganador = true;
                return comprobarFicha($ficha);
            }
        }
    }
    if (!$ganador) {
        if ($tablero[0][0] == $ficha && $tablero[1][1] == $ficha && $tablero[2][2] == $ficha) {
            $ganador = true;
            return comprobarFicha($ficha);
        }
    }
    if (!$ganador) {
        if ($tablero[0][2] == $ficha && $tablero[1][1] == $ficha && $tablero[2][0] == $ficha) {
            $ganador = true;
            return comprobarFicha($ficha);
        }
    }
}

// Formamos un array unidimensional con las casillas del tablero actual y si ninguno de los valores está vacio entonces es que está lleno de fichas
function tableroLleno ($tablero) {
    $arrValores = array_merge(...$tablero);
    return !in_array("", $arrValores);
}
        