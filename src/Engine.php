<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

function greeting(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);
    return $name;
}

function askQuestion(string $question): void
{
    line("Question: {$question}");
}

function getAnswer(): string
{
    $answer = prompt('Your Answer');
    return $answer;
}

/*Проверяем сходится ли ожидаемый результат с введённым игроком"*/
function errorCheck(string $actualResult, string $playersResponse, string $name): bool
{
    if ($actualResult != $playersResponse) {
        line("{$playersResponse} is wrong answer ;(. Correct answer was {$actualResult}\nLet's try again, {$name}!");
        return true;
    } else {
        return false;
    }
}

function progressCheck(int $round): bool
{
    if ($round === 3) {
        return true;
    } else {
        return false;
    }
}

function congratulateWinner(string $name): void
{
    line("Congratulations, {$name}!");
}
