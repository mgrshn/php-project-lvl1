<?php

namespace Brain\Games\isEven;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\askQuestion;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\errorCheck;
use function Brain\Games\Engine\progressCheck;
use function Brain\Games\Engine\congratulateWinner;

function isEven(): void
{
    $result = '';
    $name = greeting();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $roundsCount = 0;
    for ($i = 0; $i < 3; $i++) {
        $randomValue = rand(1, 50);
        $randomValue = (string) $randomValue;
        askQuestion($randomValue);
        $answer = getAnswer();

        if ($randomValue % 2 === 0) {
            $result = 'yes';
        } else {
            $result = 'no';
        }

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
