<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    protected $table = 'images';

    protected $fillable = [
        'name',
        'url',
        'public_id'
    ];

    protected $dates = ['deleted_at'];

    public function imagetable()
    {
        return $this->morphTo();
    }
}
