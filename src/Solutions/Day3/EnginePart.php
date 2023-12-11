<?php

declare(strict_types=1);

namespace JoeyMcKenzie\AdventOfCode\Solutions\Day3;

final readonly class EnginePart
{
    public int $partNumber;

    public function __construct(public string $rawPartNumber, public int $row, public int $col)
    {
        $this->partNumber = intval($this->rawPartNumber);
    }
}
