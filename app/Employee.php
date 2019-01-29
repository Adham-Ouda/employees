<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    public $table="Employee";
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
