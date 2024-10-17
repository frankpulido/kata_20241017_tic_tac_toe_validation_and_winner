<?php
declare(strict_types = 1);
require "tic_tac_toe.php";

$array1 = [['X','O','O'],['O','X','O'],['-','O','X']];
$array2 = [['O','X','-'],['O','X','-'],['O','-','-']];
$array3 = [['O','X','O'],['X','O','X'],['X','X','O']];
$array4 = [['X','X','O'],['O','O','X'],['X','O','O']];

$game1 = new TicTacToe($array1);
$game2 = new TicTacToe($array2);
$game3 = new TicTacToe($array3);
$game4 = new TicTacToe($array4);

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
?>