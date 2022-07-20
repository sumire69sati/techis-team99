<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    CONST TYPES = [
        1 => "アウター",
        2 => "トップス",
        3 => "ボトム",
    ];
}
