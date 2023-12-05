<?php

declare(strict_types=1);

namespace JoeyMcKenzie\AdventOfCode\Solutions\Day2;

use Illuminate\Support\Collection;

final readonly class Game
{
    /**
     * @var array<string, int>
     */
    private const array GAME_POSSIBILITIES = ['red' => 12, 'green' => 13, 'blue' => 14];

    public int $gameId;

    // Game 8: 20 red, 5 green, 10 blue; 14 red, 8 blue, 5 green; 5 green, 4 blue, 9 red; 18 red, 1 green; 2 blue, 1 green, 5 red
    public function __construct(private string $gameInput)
    {
        preg_match('/\d+/', $this->gameInput, $idMatch);
        $this->gameId = intval($idMatch[0]);
    }

    public function gameIsPossible(): bool
    {
        // Next, sift through the individual inputs => [['20 red', '5 green' '10 blue'], ...]
        return collect($this->getFlattenedGameInput())
            ->map(fn (string $turn) => explode(', ', $turn))
            // We can flatten these for simplicity => ['20 red', '5 green' '10 blue', ...]
            ->flatten()
            ->every(fn (string $input) => $this->inputIsPossible($input));
    }

    /**
     * @return Collection<int, string>
     */
    private function getFlattenedGameInput(): Collection
    {
        // First, get the turns => '20 red, 5 green, 10 blue; 14 red, 8 blue, 5 green; 5 green, 4 blue, 9 red; 18 red, 1 green; 2 blue, 1 green, 5 red'
        $turnWithoutGameId = preg_replace('/^Game \d+: /', '', $this->gameInput);

        // Next, split the turns by semicolon => ['20 red, 5 green, 10 blue', '14 red, 8 blue, 5 green', '5 green, 4 blue, 9 red', '18 red, 1 green', '2 blue, 1 green, 5 red']
        $turns = explode('; ', $turnWithoutGameId ?? '');

        /** @var Collection<int, string> $flattened */
        $flattened = collect($turns)
            ->map(fn (string $turn) => explode(', ', $turn))
            // We can flatten these for simplicity => ['20 red', '5 green' '10 blue', ...]
            ->flatten();

        return $flattened;
    }

    public function inputIsPossible(string $input): bool
    {
        [$count, $color] = explode(' ', $input);
        $countLimit = self::GAME_POSSIBILITIES[$color];

        return intval($count) <= $countLimit;
    }

    public function getMinimumPowerForTurn(): int
    {
        $minimums = [
            'red' => 0,
            'blue' => 0,
            'green' => 0,
        ];

        foreach ($this->getFlattenedGameInput() as $input) {
            [$count, $color] = explode(' ', $input);
            $colorCount = intval($count);

            if ($colorCount > $minimums[$color]) {
                $minimums[$color] = $colorCount;
            }
        }

        /** @var int $power */
        $power = collect($minimums)
            ->reduce(fn (int $carry, int $value): int => $carry * $value, 1);

        return $power;
    }
}
