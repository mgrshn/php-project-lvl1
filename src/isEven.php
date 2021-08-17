<?php

namespace Brain\Games\isEven;

use function cli\line;
use function cli\prompt;

function isEven()
{
    $autoloadPath1 = __DIR__ . '/../../../autoload.php';
    $autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
    if (file_exists($autoloadPath1)) {
        require_once $autoloadPath1;
    } else {
        require_once $autoloadPath2;
    }

    line('Wellcome to the Brain Games!');
    $name = prompt('May i have your name?');
    line('Hello, %s!', $name);
    //
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $goodAnswersCount = 0;
    for ($i = 0; $i < 3; $i++) {
        $randomValue = rand(1, 50);
        line("Question: {$randomValue}");
        $answer = prompt('Your Answer');
        if ($randomValue % 2 === 0 && $answer !== 'yes') {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'yes'.\nLet's try again, {$name}!");
            break;
        } elseif ($randomValue % 2 === 1 && $answer !== 'no') {
            line("'{$answer}' is wrong answer ;(. Correct answer was 'no'.\nLet's try again, {$name}!");
            break;
        } else {
            line('Correct!');
            $goodAnswersCount++;
        }
    }
    if ($goodAnswersCount === 3) {
        line("Congratulations, {$name}");
    }
}
