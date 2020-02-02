<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static DeActivated()
 * @method static static Activated()
 */
final class KeyToolStatus extends Enum
{
    const DeActivated =   0;
    const Activated =   1;
}
