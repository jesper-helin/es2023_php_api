<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Concert;
use App\Models\SeatRow;
use App\Models\Show;

class SeatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($concertId, $showId)
    {
        $checkIfConcertExists = Concert::find($concertId);
        $checkIfShowExists = Show::where('concert_id', '=', $concertId)->find($showId);
        if(!$checkIfConcertExists || !$checkIfShowExists) {
            return response()->json([
                "error" => "A concert or show with this ID does not exist",
            ], 404);
        }
        
        $rows = SeatRow::join('seats', 'seats.seat_rows_id', '=', 'seat_rows.id')->get();
        // $rows = SeatRow::with(['seats'])->get();
        // return [
        //     "rows" => $rows
        // ];
        foreach($rows as $row) {
            return response()->json([
                "rows" => $rows,
            ], 200);
        }
        // return [
        //     "rows" => $rows
        // ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
