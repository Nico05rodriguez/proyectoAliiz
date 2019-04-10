<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Papeleria extends Model
{
    protected $fillable = ['nombre','imagen'];
    protected $table = 'papeles';
}
