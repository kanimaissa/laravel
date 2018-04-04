<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emi extends Model
{
    protected $table = "emis";
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
