<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $table = 'vacancies';
    protected $primaryKey = 'id';
    protected $fillable = ['id','vacancy','qty'];
}
