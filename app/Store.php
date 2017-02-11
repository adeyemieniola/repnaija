<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
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
}
