<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function greeting()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May i have your name?');
    line('Hello, %s!', $name);
    return $name;
}

function askQuestion($question)
{
    line("Question: {$question}");
}

function getAnswer(): string
{
    $answer = prompt('Your Answer');
    return $answer;
}

/*Проверяем сходится ли ожидаемый результат с введённым игроком"*/
function errorCheck($actualResult, $playersResponse, $name): bool
{
    if ($actualResult != $playersResponse) {
        line("{$playersResponse} is wrong answer ;(. Correct answer was {$actualResult}\nLet's try again, {$name}!");
        return true;
    } else {
        return false;
    }
}

function progressCheck($round): bool
{
    if ($round === 3) {
        return true;
    } else {
        return false;
    }
}

function congratulateWinner($name)
{
    line("Congratulations, {$name}!");
}
