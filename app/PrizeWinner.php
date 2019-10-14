<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrizeWinner extends Model
{
    protected $fillable = ['customer_name','prize_name','winning_number'];
    protected $table = 'prize_winner_view';
}
