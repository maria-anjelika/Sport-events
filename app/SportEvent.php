<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SportEvent extends Model
{
    protected $fillable = [
        'sportEventName','organizerName','date','continuance','type'
    ];
}
