<?php

namespace App\Enums;

enum Gender: int
{
    case Male = 0;
    case Female = 1;
    case Other = 2;

    public function label(): string
    {
        return match($this) {
            self::Male => 'Male',
            self::Female => 'Female',
            self::Other => 'Other',
        };
    }

    public static function options(): array
    {
        return array_map(
            fn(Gender $gender) => ['value' => $gender->value, 'label' => $gender->label()],
            self::cases()
        );
    }
}