<?php
declare(strict_types = 1);
require "tic_tac_toe.php";

/*
README Rubén
Cambios hechos para validar resultados :

1) Invalidar de existir más de 1 ganador.
Los bucles do-while de los métodos checkRows y checkColumns :
    La condición era : while ($i <= 2 || $end = false)
    La he cambiado por si acaso existían 2 columnas iguales : while ($i <= 2)
Antes se interrumpía el bucle al encontrar el primer "3 en raya"" (fila o columna), ahora podría encontrar más de una raya horizontal o vertical.
$witness podría contar 8 rayas de llenar el tablero totalmente con el miemo símbolo.

Me vi tentado a hacer un merge de los 3 métodos de verificación de filas/columnas/diagonales, pero pensando en posible evolución del ejercicio dando información más detallada creí conveniente dejar de momento los 3 de forma separada.

2) Invalidar de haber ocurrido un salto en el turno de jugada.
Esta verificación la haré antes.
La diferencia de turnos de jugada no puede ser de más de 1 turno.

3) Tamaño del array recibido y cantidad de símbolos usados.
Se sobreentiende que esto es problema del diseño de captura de datos. NO VALIDO.
*/

$array1 = [['X','O','O'],['O','X','O'],['-','O','X']]; // Array Rubén : INVALIDADO (X juega 3 veces y O juega 5)
$array2 = [['O','X','-'],['O','X','-'],['O','-','-']];
$array3 = [['O','X','O'],['X','O','X'],['X','X','O']];
$array4 = [['X','X','O'],['O','O','X'],['X','O','O']];
$array5 = [['X','X','X'],['O','O','O'],['X','X','O']]; // INVALIDADO (2 ganadores horizontales)
$array6 = [['O','X','O'],['O','X','X'],['O','X','X']]; // INVALIDADO (2 ganadores verticales)

$game1 = new TicTacToe($array1);
$game2 = new TicTacToe($array2);
$game3 = new TicTacToe($array3);
$game4 = new TicTacToe($array4);
$game5 = new TicTacToe($array5);
$game6 = new TicTacToe($array6);

echo PHP_EOL;
$winner1 = $game1->checkWinner();
echo $winner1;
echo PHP_EOL;
$winner2 = $game2->checkWinner();
echo $winner2;
echo PHP_EOL;
$winner3 = $game3->checkWinner();
echo $winner3;
echo PHP_EOL;
$winner4 = $game4->checkWinner();
echo $winner4;
echo PHP_EOL;
$winner5 = $game5->checkWinner();
echo $winner5;
echo PHP_EOL;
$winner6 = $game6->checkWinner();
echo $winner6;
echo PHP_EOL;
echo PHP_EOL;
?>