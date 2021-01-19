<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $table="user_infos";

    protected $guarded = [
        'user_id',
        'title',
        'description',
        'date'
    ];
}
