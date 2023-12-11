<?php

use JoeyMcKenzie\AdventOfCode\Solutions\Day1\Solution;

final readonly class Day1Bench
{
    public function bench(): void
    {
        $solution = new Solution();
        $solution->part1();
        $solution->part2();
    }
}
