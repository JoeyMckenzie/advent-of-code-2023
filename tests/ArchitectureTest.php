<?php

test('all files should be strictly typed')
    ->expect('JoeyMcKenzie\AdventOfCode2023')
    ->toUseStrictTypes()
    ->and('JoeyMcKenzie\AdventOfCode2023\Solutions\**')
    ->toBeReadonly()
    ->and('JoeyMcKenzie\AdventOfCode2023\Solutions\**')
    ->toBeFinal();
