<?php

namespace App\Enums;

enum UserType
{
    case Male;
    case Female;
    case Pair;

    public static function stringCases(): array
    {
        $cases = [];
        foreach (self::cases() as $case) {
            $cases[] = $case->name;
        }
        return $cases;
    }
}
