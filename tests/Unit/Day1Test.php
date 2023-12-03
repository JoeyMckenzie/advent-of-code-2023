<?php

declare(strict_types=1);

namespace Unit;

use JoeyMcKenzie\AdventOfCode2023\Solutions\Day1\Solution;

test('is a collection', function () {
    // Arrange
    $solution = new Solution();

    // Act
    expect($solution->part1())
        ->toBe(55477)
        ->and($solution->part2())
        ->toBe(54431);
});
