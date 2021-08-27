<?php

namespace Brain\Games\Calculator;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\askQuestion;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\errorCheck;
use function Brain\Games\Engine\progressCheck;
use function Brain\Games\Engine\congratulateWinner;

function calculatorGame(): void
{
    $name = greeting();
    $result = 0;
    line('What is the result of the expression?');
    $roundsCount = 0;
    for ($i = 0; $i < 3; $i++) {
        $firstRandomNumber = rand(1, 50);
        $secondRandomNumber = rand(1, 50);
        $operations = ['+', '-', '*'];
        $randomOperation = $operations[rand(0, 2)];
        $question = ("{$firstRandomNumber} {$randomOperation} {$secondRandomNumber}");

        askQuestion($question);

        switch ($randomOperation) {
            case '+':
                $result = $firstRandomNumber + $secondRandomNumber;
                break;
            case '-':
                $result = $firstRandomNumber - $secondRandomNumber;
                break;
            case '*':
                $result = $firstRandomNumber * $secondRandomNumber;
                break;
        }
        $answer = getAnswer();
        $result = (string) $result;
        if (errorCheck($result, $answer, $name)) {
            break;
        } else {
            line("Correct!");
            $roundsCount++;
        }
    }
    if (progressCheck($roundsCount)) {
        congratulateWinner($name);
    }
}
