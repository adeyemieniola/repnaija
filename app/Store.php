<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes;

    protected $table = 'stores';
    protected $attributes = array(
        'logo' => 'default.png'
    );

    protected $fillable = [
      'name',
      'logo',
      'address',
      'description',
      'state',
      'lga',
      'user_id'
    ];

    protected $dates = ['deleted_at'];
}
