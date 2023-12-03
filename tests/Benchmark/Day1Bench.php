<?php

final readonly class Day1Bench implements TestBenchmark
{
    public function bench(): void
    {
        $solution = new JoeyMcKenzie\AdventOfCode2023\Solutions\Day1\Solution();
        $solution->part1();
        $solution->part2();
    }
}
