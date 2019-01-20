<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //

    protected $fillable = [
        'filename', 'user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

}
