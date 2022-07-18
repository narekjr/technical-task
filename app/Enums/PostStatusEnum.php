<?php

namespace App\Enums;

enum PostStatusEnum: int
{
    /** For new unprepared posts */
    case New = 0;

    /** For posts ready to send */
    case Ready = 1;

    /** For sent posts */
    case Sent = 2;
}
