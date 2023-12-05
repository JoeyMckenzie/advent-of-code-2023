<?php

declare(strict_types=1);

namespace JoeyMcKenzie\AdventOfCode\Solutions\Day2;

use JoeyMcKenzie\AdventOfCode\Solutions\SolutionContract;
use Override;

/**
 * @implements SolutionContract<int, int>
 */
final readonly class Solution implements SolutionContract
{
    private const string FILE_PATH = __DIR__.'/input.txt';

    #[Override]
    public function part1(): int
    {
        /** @var string[] $lines */
        $lines = file(self::FILE_PATH, FILE_IGNORE_NEW_LINES);

        // Define the target cube counts
        $targetCounts = ['red' => 12, 'green' => 13, 'blue' => 14];
        $gameSum = 0;

        foreach ($lines as $line) {
            // Start with 'Game 3: 12 red, 18 blue, 3 green; 14 red, 4 blue, 2 green; 4 green, 15 red'
            // ['Game 3: 12 red, 18 blue, 3 green', '14 red, 4 blue, 2 green', '4 green, 15 red']
            $games = explode(';', $line);
            $idMatch = [];
            preg_match('/\d/', $games[0], $idMatch);
            $id = intval($idMatch[0]);

            // ['12 red, 18 blue, 3 green', '14 red, 4 blue, 2 green', '4 green, 15 red']
            $games[0] = preg_replace('/^Game \d+: /', '', $games[0]);
            $currentGameIsPossible = true;

            foreach ($games as $turn) {
                // '12 red, 18 blue, 3 green' => ['12 red', '18 blue', '3 green']
                $turns = explode(', ', $turn);

                foreach ($turns as $combo) {
                    $diceMatches = [];
                    $colorMatches = [];
                    preg_match('/\d/', $combo, $diceMatches);
                    preg_match('/red|blue|green/', $combo, $colorMatches);
                    $targetCount = $targetCounts[$colorMatches[0]];

                    $count = intval($diceMatches[0]);
                    echo "id $id Impossible game detected $count is greater than target $targetCount\n";
                    if (intval($diceMatches[0]) > $targetCount) {
                        $currentGameIsPossible = false;
                        break;
                    }
                }

                if (! $currentGameIsPossible) {
                    break;
                }
            }

            $idValue = intval($idMatch[0]);

            if ($currentGameIsPossible) {
                $gameSum += $idValue;
            }
        }

        // Calculate the sum of possible game IDs
        return $gameSum;
    }

    #[Override]
    public function part2(): mixed
    {
        throw new NotImplementedException();
    }
}
