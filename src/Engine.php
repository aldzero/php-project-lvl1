<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;

const NUM_OF_QUESTIONS = 3;

function greetUser(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    return $name;
}

function getRandomNumber(int $min = 1, int $max = 20): int
{
    return rand($min, $max);
}

function getRandomAction(): string
{
    $actions = ['+', '-', '*'];

    $maxIndex = count($actions) - 1;

    $index = getRandomNumber(0, $maxIndex);

    return $actions[$index];
}

function getResult(string $name, $userAnswer, $correctAnswer): bool
{
    if ($userAnswer !== $correctAnswer) {
        line("'$userAnswer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
        line("Let's try again, $name!");

        return false;
    }
    line('Correct!');
    return true;
}

function getIntegerAnswer(): int
{
    while (true) {
        $answer = prompt('Your answer');

        if (is_numeric($answer) && $answer == (int)$answer) {
            return (int)$answer;
        }

        line('Incorrect value, try again! Allowed values: integer');
    }
}

function getYesNoAnswer(): string
{
    while (true) {
        $answer = prompt('Your answer');

        if ($answer === 'yes' || $answer === 'no') {
            return $answer;
        }

        line('Incorrect value, try again! Allowed values: "yes" or "no"');
    }
}
