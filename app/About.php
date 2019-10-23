<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    //
	protected $table = 'pages';
	protected $keyType = 'string';
	protected $primaryKey = 'slug';
}
