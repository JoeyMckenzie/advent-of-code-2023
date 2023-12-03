<?php

declare(strict_types=1);

namespace Unit;

use JoeyMcKenzie\AdventOfCode2023\Solutions\Day1\Day1;

test('is a collection', function () {
    // Arrange
    $solution = new Day1();

    // Act
    expect($solution->part1())->toBe(55477);
    expect($solution->part2())->toBe(55477);
});
