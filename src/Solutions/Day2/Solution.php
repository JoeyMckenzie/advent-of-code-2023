<?php

declare(strict_types=1);

namespace JoeyMcKenzie\AdventOfCode2023\Solutions\Day2;

use _PHPStan_79aa371a9\Nette\NotImplementedException;
use JoeyMcKenzie\AdventOfCode2023\Solutions\SolutionContract;
use Override;

/**
 * @implements SolutionContract<float, int>
 */
final readonly class Solution implements SolutionContract
{
    private const string FILE_PATH = __DIR__.'/input.txt';

    #[Override]
    public function part1(): int|float
    {
        /** @var string[] $games */
        $games = file(self::FILE_PATH, FILE_IGNORE_NEW_LINES);
        $possibleGames = [];

        // Target cube counts
        $targetCubes = [
            'red' => 12,
            'green' => 13,
            'blue' => 14,
        ];

        foreach ($games as $game) {
            $gameInfo = explode(': ', $game);
            $gameID = trim($gameInfo[0]);
            $sets = explode('; ', $gameInfo[1]);

            // Check if the game is possible with the target cube counts
            $possible = true;
            foreach ($sets as $set) {
                $cubes = explode(', ', $set);
                foreach ($cubes as $cube) {
                    [$count, $color] = explode(' ', $cube);
                    if ($targetCubes[$color] < $count) {
                        $possible = false;
                        break 2; // Break both inner and outer loops
                    }
                }
            }

            if ($possible) {
                $possibleGames[] = $gameID;
            }
        }

        // Calculate the sum of IDs of possible games
        return array_sum($possibleGames);
    }

    #[Override]
    public function part2(): mixed
    {
        throw new NotImplementedException();
    }
}
