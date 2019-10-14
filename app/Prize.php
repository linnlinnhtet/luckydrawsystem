<?php

namespace App;

use App\LuckyDraw;
use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    protected $fillable = ['name'];

    public function luckyDraw(){
        return $this->belongsTo('App\LuckyDraw');
    }
}
