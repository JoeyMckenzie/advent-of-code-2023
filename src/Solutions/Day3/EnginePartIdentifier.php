<?php

declare(strict_types=1);

namespace JoeyMcKenzie\AdventOfCode\Solutions\Day3;

final readonly class EnginePartIdentifier
{
    /** @var string[] */
    public array $symbols;

    /** @var string[] */
    public array $parts;

    /** @var string[] */
    private array $engineSchematic;

    /**
     * @param  string[]  $engineSchematic
     */
    public function __construct(array $engineSchematic)
    {
        $this->engineSchematic = $engineSchematic;
    }

    public function getParts(): void
    {

    }

    /**
     * @return EnginePart[]
     */
    public function parseSchematicLinesForPattern(string $pattern): array
    {
        /** @var EnginePart[] $matchedParts */
        $matchedParts = [];

        $test = collect($this->engineSchematic)
            ->map(function (string $schematic, int $index) use ($pattern) {
                preg_match_all($pattern, $schematic, $matches);

                return collect($matches[0])
                    ->map(fn (string $match, int $matchIndex) => new EnginePart($match, $index, $matchIndex));
            });

        foreach ($this->engineSchematic as $row => $schematic) {
            preg_match($pattern, $schematic, $matches);
            if (! empty($matches[0])) {
                foreach ($matches[0] as $index => $match) {
                    $matchedParts[] = new EnginePart($match, $row, $index);
                }
            }
        }

        return $matchedParts;
    }
}
