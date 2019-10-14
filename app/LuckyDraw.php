<?php

namespace App;

use App\Prize;
use App\WinningNumber;
use Illuminate\Database\Eloquent\Model;

class LuckyDraw extends Model
{
    protected $fillable = ['prize_id', 'winning_number'];
    
    public function prize(){
        return $this->hasOne('App\Prize');
    }
}
