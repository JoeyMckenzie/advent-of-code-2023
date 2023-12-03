<?php

declare(strict_types=1);

namespace JoeyMcKenzie\AdventOfCode2023\Solutions\Day1;

final readonly class Day1
{
    private const string FILE_PATH = __DIR__.'/input.txt';

    public function part1(): int
    {
        /** @var string[] $lines */
        $lines = file(self::FILE_PATH, FILE_IGNORE_NEW_LINES);

        /** @var int $totalSum */
        $totalSum = collect($lines)
            // Replace anything that isn't a number with an empty string
            ->map(fn (string $line) => preg_replace('/[^0-9]/', '', $line))
            ->map(function (mixed $numericString) {
                $firstDigit = substr($numericString ?? '', 0, 1);
                $lastDigit = substr($numericString ?? '', -1);

                return intval($firstDigit.$lastDigit);
            })
            ->sum();

        return $totalSum;
    }

    public function part2(): int
    {
        /** @var string[] $lines */
        $lines = file(self::FILE_PATH, FILE_IGNORE_NEW_LINES);
        $totalSum = 0;

        foreach ($lines as $line) {
            /** @var string[][] $matches */
            $matches = [];

            // Holy fuck... don't ask me about overlapping matches ever again
            // "twone" will forever be my enemy...
            preg_match_all('/(?=(\d|one|two|three|four|five|six|seven|eight|nine))/', $line, $matches);
            /** @var string[] $matched */
            $matched = $matches[1];
            $matchesCollection = collect($matched);

            /** @var string $firstMatch */
            $firstMatch = $matchesCollection->first();

            /** @var string $secondMatch */
            $secondMatch = $matchesCollection->last();

            $firstDigit = $this->matchInput($firstMatch);
            $lastDigit = $this->matchInput($secondMatch);
            $totalSum += intval($firstDigit.$lastDigit);
        }

        return $totalSum;
    }

    private function matchInput(string $input): int
    {
        return match ($input) {
            'one' => 1,
            'two' => 2,
            'three' => 3,
            'four' => 4,
            'five' => 5,
            'six' => 6,
            'seven' => 7,
            'eight' => 8,
            'nine' => 9,
            default => intval($input)
        };
    }
}
