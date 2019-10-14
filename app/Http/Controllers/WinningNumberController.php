<?php

namespace App\Http\Controllers;

use App\Customer;
use App\WinningNumber;
use Illuminate\Http\Request;

class WinningNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('Admin/winning_number',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'winning_number' => 'required|max:5|min:5',
            'customer_id' => 'required',

        ]);
        
        $winningNumber = new WinningNumber();
        $winningNumber->winning_number = $request->winning_number;
        $winningNumber->customer_id = $request->customer_id;
        $winningNumber->save();
        return redirect('/admin/winning_number/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WinningNumber  $winningNumber
     * @return \Illuminate\Http\Response
     */
    public function show(WinningNumber $winningNumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WinningNumber  $winningNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(WinningNumber $winningNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WinningNumber  $winningNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WinningNumber $winningNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WinningNumber  $winningNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(WinningNumber $winningNumber)
    {
        //
    }
}
