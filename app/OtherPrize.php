<?php

namespace App;
use DB;

use Illuminate\Database\Eloquent\Model;

class OtherPrize extends Model
{
    protected $fillable = ['winning_number','customer_id'];
    protected $table = 'other_prize_view';
}
