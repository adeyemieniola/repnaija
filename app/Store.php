<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use SoftDeletes;

    protected $table = 'stores';

    protected $fillable = [
      'name',
      'address',
      'description',
      'state',
      'lga',
      'user_id'
    ];

    protected $dates = ['deleted_at'];

    public function logo()
    {
        return $this->morphOne('App\Image', 'imagetable');
    }
}
