<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'category_id',
        'title'
    ];

    public function alternatives()
    {
        return $this->hasMany(Alternative::class);
    }
}

