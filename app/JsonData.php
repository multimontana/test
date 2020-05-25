<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JsonData extends Model
{
    protected $table = 'json_data';
    protected $fillable = ['json_file'];
}
