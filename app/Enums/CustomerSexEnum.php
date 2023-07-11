<?php

namespace App\Enums;

use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Values;

enum CustomerSexEnum: string
{
    use InvokableCases, Values;

    case MALE = 'male';
    case FEMALE = 'female';
}
