<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrizeWinner;
class PrizeWinnerController extends Controller
{
    public function index()
    {
        $prizesWinners = PrizeWinner::all();
        return View('Admin.prize_winner', compact('prizesWinners'));

    }
}
