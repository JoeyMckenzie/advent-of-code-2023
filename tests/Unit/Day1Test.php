<?php

declare(strict_types=1);

namespace Unit;

use JoeyMcKenzie\AdventOfCode2023\Solutions\Day1\Solution;

test('solutions are correct for day one', function () {
    // Arrange
    $solution = new Solution();

    // Act
    $part1 = $solution->part1();
    $part2 = $solution->part2();

    // Assert
    expect($part1)
        ->toBe(55477)
        ->and($part2)
        ->toBe(54431);
});
