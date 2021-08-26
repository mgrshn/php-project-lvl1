<?php

namespace Brain\Games\isPrime;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\askQuestion;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\errorCheck;
use function Brain\Games\Engine\progressCheck;
use function Brain\Games\Engine\congratulateWinner;

function isPrime()
{
    $name = greeting();
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($rounds = 0; $rounds < 3; $rounds++) {
        $result = '';
        $number = rand(0, 113);
        askQuestion($number);
        $highestIntegralSquareRoot = floor(sqrt($number));
        $primeChecker = true;
        for ($i = 2; $i < $number; $i++) {
            if ($number % $i == 0) {
                $primeChecker = false;
                break;
            }
        }
        $answer = getAnswer();
        if ($primeChecker == true) {
            $result = 'yes';
        } else {
            $result = 'no';
        }
        if (errorCheck($result, $answer, $name)) {
            break;
        } else {
            line("Correct!");
        }
    }
    if (progressCheck($rounds)) {
        congratulateWinner($name);
    }
}
