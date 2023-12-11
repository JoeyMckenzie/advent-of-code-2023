<?php

use JoeyMcKenzie\AdventOfCode\Solutions\Day2\Solution;

final readonly class Day2Bench
{
    public function bench(): void
    {
        $solution = new Solution();
        $solution->part1();
        $solution->part2();
    }
}
