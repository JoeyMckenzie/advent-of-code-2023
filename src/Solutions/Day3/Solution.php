<?php

declare(strict_types=1);

namespace JoeyMcKenzie\AdventOfCode\Solutions\Day3;

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
        $enginePartIdentifier = new EnginePartIdentifier($input);

        // First, match anything that's not a . or number, effectively identifying all the parts
        $symbols = $enginePartIdentifier->parseSchematicLinesForPattern('/[^.0-9]/');

        // Next, match all number parts
        $parts = $enginePartIdentifier->parseSchematicLinesForPattern("/\d+/");

        /** @var int $sum */
        $sum = collect($parts)
            ->where(fn (EnginePart $part) => collect($symbols)->where(fn (EnginePart $symbol) => abs($part->row - $symbol->row) &&
                $symbol->col <= $part->row + strlen($part->rawPartNumber) &&
                $part->col <= $symbol->col + strlen($symbol->rawPartNumber)))
            ->sum(fn (EnginePart $part) => $part->partNumber);

        return $sum;
    }

    #[Override]
    public function part2(): int
    {
        // TODO: Implement part2() method.
        return 0;
    }
}
