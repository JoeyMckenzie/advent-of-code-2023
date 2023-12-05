<?php

declare(strict_types=1);

namespace JoeyMcKenzie\AdventOfCode\Solutions;

/**
 * @template TPart1
 * @template TPart2
 */
interface SolutionContract
{
    /**
     * @return TPart1
     */
    public function part1(): mixed;

    /**
     * @return TPart2
     */
    public function part2(): mixed;
}
