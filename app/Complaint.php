<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table = 'complaints';

    protected $primaryKey = 'id';

    protected $fillable = ['id','title','complait','employee_id'];
}
