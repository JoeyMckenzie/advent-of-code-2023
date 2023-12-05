<?php

test('all files should be strictly typed')
    ->expect('JoeyMcKenzie\AdventOfCode')
    ->toUseStrictTypes()
    ->and('JoeyMcKenzie\AdventOfCode\Solutions\**')
    ->toBeReadonly()
    ->and('JoeyMcKenzie\AdventOfCode\Solutions\**')
    ->toBeFinal();
