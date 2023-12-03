<?php

final readonly class Day2Bench
{
    public function bench(): void
    {
        $solution = new JoeyMcKenzie\AdventOfCode2023\Solutions\Day2\Solution();
        $solution->part1();
        $solution->part2();
    }
}
