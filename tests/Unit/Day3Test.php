<?php

declare(strict_types=1);

namespace Unit;

use JoeyMcKenzie\AdventOfCode\Solutions\Day3\Solution;

test('solutions are correct for day three', function () {
    // Arrange
    $solution = new Solution();

    // Act
    $part1 = $solution->part1();
    $part2 = $solution->part2();

    // Assert
    expect($part1)
        ->toBe(2600)
        ->and($part2)
        ->toBe(86036);
});
