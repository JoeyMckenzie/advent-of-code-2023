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
        /** @var string[] $input */
        $input = file(self::FILE_PATH, FILE_IGNORE_NEW_LINES);

        /** @var int $gameSum */
        $gameSum = collect($input)
            ->map(fn (string $turn) => new Game($turn))
            ->filter(fn (Game $game) => $game->gameIsPossible())
            ->sum(fn (Game $game) => $game->gameId);

        return $gameSum;
    }

    #[Override]
    public function part2(): int
    {
        /** @var string[] $input */
        $input = file(self::FILE_PATH, FILE_IGNORE_NEW_LINES);

        /** @var int $gameSum */
        $gameSum = collect($input)
            ->map(fn (string $turn) => new Game($turn))
            ->map(fn (Game $game) => $game->getMinimumPowerForTurn())
            ->sum();

        return $gameSum;
    }
}
