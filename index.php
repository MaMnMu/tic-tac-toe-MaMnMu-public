<?php

require "vendor/autoload.php";

include 'functions.php';

use eftec\bladeone\bladeone;

$Views = __DIR__ . '\Views';
$Cache = __DIR__ . '\Cache';

$Blade = new BladeOne($Views, $Cache);

session_start();

define("BOARD_SIZE", 3);
define("PATH_PLAYER_PIC", "\public\assets\img\circle.jpg");
define("PATH_COMPUTER_PIC", "\public\assets\img\cross.jpeg");

if (empty($_POST)) {
    
    // Creamos un array bidimensional que represente el tablero de juego para controlar los cambios que se producen en este
    $board = array();
    for ($i = 0; $i < BOARD_SIZE; $i++) {
        $board[$i] = array();
        for ($j = 0; $j < BOARD_SIZE; $j++) {
            $board[$i][$j] = "";
        }
    }
    $_SESSION['board'] = $board;
    
    echo $Blade->run('move');
    
} else {

    $board = $_SESSION['board'];
    $result = array();

    $XUsuario = filter_input(INPUT_POST, 'x');
    $YUsuario = filter_input(INPUT_POST, 'y');
    $board[$XUsuario][$YUsuario] = "O";

    // Generamos las coordenadas de la CPU buscando una posición del tablero aleatoria vacía.
    // Entraremos siempre en esta generación de coordenadas menos cuando ya hay 9 fichas en el tablero ya que se crearía un bucle infinito al no encontrar ningunca celda libre
    $encontrado = false;
    if (!tableroLleno($board)) {
        while (!$encontrado) {
            $aleat1 = rand(0, count($board) - 1);
            $aleat2 = rand(0, count($board) - 1);
            if (empty($board[$aleat1][$aleat2])) {
                $board[$aleat1][$aleat2] = "X";
                $XComput = $aleat1;
                $YComput = $aleat2;
                $encontrado = true;
            }
        }
    } else {
        $result["gameRes"] = 0;
    }
    $_SESSION['board'] = $board;

    $ganador = false;
    $tresRayaO = hayTresEnRaya($board, "O");
    $tresRayaX = hayTresEnRaya($board, "X");

    // Si hay un ganador, asignamos a $result['gameRes'] el valor devuelto por la función respectiva 
    if ($ganador) {
        if ($tresRayaO != null) {
            $result['gameRes'] = $tresRayaO;
        } else if ($tresRayaX != null) {
            $result['gameRes'] = $tresRayaX;
        }
    }

    // Si el ganador es la CPU o aún no hay un ganador, colocaremos las coordenadas de la CPU en el array
    // Si el ganador es el usuario no haremos esta asignación ya que no tiene sentido mostrar una nueva X en el tablero
    if (($ganador && $result["gameRes"] == -1) || !$ganador) {
        $result["x"] = $XComput;
        $result["y"] = $YComput;
    }

    header('Content-type: application/json');
    echo json_encode($result);
    
}
