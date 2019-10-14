<?php

namespace App\Http\Controllers;


use DB;
use App\Prize;
use App\WinningNumber;
use App\OtherPrize;
use App\GrandPrize;
use App\LuckyDraw;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;


class LuckyDrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prizes = Prize::all();
        $winning_no = WinningNumber::all();
        return View('Admin.lucky_draw',compact('prizes','winning_no'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lucky_draw = new LuckyDraw();
        $lucky_draw->prize_id = $request->price_id;
        $lucky_draw->winning_number = $request->winningNo;

        $lucky_draw->save();
        return redirect('/admin/luckydraw/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LuckyDraw  $luckyDraw
     * @return \Illuminate\Http\Response
     */
    public function show(LuckyDraw $luckyDraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LuckyDraw  $luckyDraw
     * @return \Illuminate\Http\Response
     */
    public function edit(LuckyDraw $luckyDraw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LuckyDraw  $luckyDraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LuckyDraw $luckyDraw)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LuckyDraw  $luckyDraw
     * @return \Illuminate\Http\Response
     */
    public function destroy(LuckyDraw $luckyDraw)
    {
    }

    public function del() {
        LuckyDraw::truncate();
        return redirect('/admin/prize_winner');
    }

    public function generateNumber(Request $request) {
    
        $prizeType = $request->get('prizeType');

        if($prizeType == 1){
            $grandPrize = GrandPrize::all()->random(1);
            return response()->json($grandPrize);

        }else{
            $otherPrize = OtherPrize::all()->random(1);
            return response()->json($otherPrize);
        }
    
        
    }
    
}
