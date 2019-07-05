<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    protected $guarded=[];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
