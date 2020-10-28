<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable =[
    	'id',
    	'created_at',
    	'updated_at',
    	'description',
    	'amount',
    	'ruzhowa_id',
    ];
}
