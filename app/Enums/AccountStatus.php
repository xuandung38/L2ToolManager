<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static READY()
 * @method static static PROCESSING()
 * @method static static HANG_ON()
 * @method static static COMPLETED()
 */
final class AccountStatus extends Enum
{
    const READY =  0; //Sẵn sàng
    const PROCESSING  =  1; //Đang up
    const HANG_ON = 2; //Treo tháp
    const COMPLETED = 3; //Hoàn thành
}
