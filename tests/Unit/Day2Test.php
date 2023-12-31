<?php

declare(strict_types=1);

namespace Unit;

use JoeyMcKenzie\AdventOfCode\Solutions\Day2\Solution;

test('solutions are correct for day two', function () {
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
