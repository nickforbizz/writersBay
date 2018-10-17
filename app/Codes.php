<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Codes
{
    public static $SUCCESS="0";
    public static $USER_EXISTS="1";
    public static $FULLY_REGISTERED="2";
    public static $TEMPORAL_REGISTERED="3";
    public static $USER_UKNOWN="4";
    public static $INVALID_PASSWORD="5";
}
