<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocalTransaction extends Model
{
    protected $table = 'transactions';

    protected $guarded = ['id'];

    protected $casts = [
        'inputs' => 'array'
    ];
}
