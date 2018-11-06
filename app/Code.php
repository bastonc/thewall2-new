<?php

namespace Ukrainediploms;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    //
    protected $table = 'codes';
    protected $fillable = ['user_id', 'code'];
}
