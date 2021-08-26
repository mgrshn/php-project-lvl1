<?php

namespace Brain\Games\GCD;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\askQuestion;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\errorCheck;
use function Brain\Games\Engine\progressCheck;
use function Brain\Games\Engine\congratulateWinner;

function gcdGame()
{
    $name = greeting();
    line('Find the greatest common divisor of given numbers.');
    for ($rounds = 0; $rounds < 3; $rounds++) {
        $gcd = 1;
        $firstNumber = rand(1, 100);
        $secondNumber = rand(1, 100);
        $smallestNumber = min($firstNumber, $secondNumber);
        $question = "{$firstNumber} {$secondNumber}";
        askQuestion($question);
        for ($i = $smallestNumber; $i > 1; $i--) {
            if (($firstNumber % $smallestNumber == 0) && ($secondNumber % $smallestNumber == 0)) {
                $gcd = $smallestNumber;
                break;
            } else {
                $smallestNumber--;
            }
        }
        $answer = getAnswer();
        if (errorCheck($gcd, $answer, $name)) {
            break;
        } else {
            line("Correct!");
        }
    }
    if (progressCheck($rounds)) {
        congratulateWinner($name);
    }
}
