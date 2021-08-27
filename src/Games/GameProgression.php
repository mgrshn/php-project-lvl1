<?php

namespace Brain\Games\Progression;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Engine\greeting;
use function Brain\Games\Engine\askQuestion;
use function Brain\Games\Engine\getAnswer;
use function Brain\Games\Engine\errorCheck;
use function Brain\Games\Engine\progressCheck;
use function Brain\Games\Engine\congratulateWinner;

function progression(): void
{
    $name = greeting();
    line('What number is missing in the progression?');
    $rounds = 0;
    for ($rounds; $rounds < 3; $rounds++) {
        $question = '';
        $firstElem = rand(1, 50);
        $initialProgression = [$firstElem];
        $stepOfProgression = rand(1, 10);
        for ($elements = 0; $elements < rand(5, 10); $elements++) {
            $initialProgression[] = $initialProgression[$elements] + $stepOfProgression;
        }
        $progressionLength = count($initialProgression);
        $positionOfSkippingNumber = rand(0, $progressionLength - 1);
        $progressionWithSkip = $initialProgression;
        $progressionWithSkip[$positionOfSkippingNumber] = '..';
        for ($i = 0; $i < $progressionLength; $i++) {
            $question = $question . "{$progressionWithSkip[$i]} ";
        }
        askQuestion($question);
        $answer = getAnswer();
        if (errorCheck($initialProgression[$positionOfSkippingNumber], $answer, $name)) {
            break;
        } else {
            line('Correct!');
        }
    }
    if (progressCheck($rounds)) {
        congratulateWinner($name);
    }
}
