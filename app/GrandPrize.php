<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrandPrize extends Model
{
    protected $fillable = ['winning_number', 'customer_id'];
    protected $table = 'grand_prize_view';
}
