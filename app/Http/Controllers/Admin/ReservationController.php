<?php

namespace App\Http\Controllers\Admin;

use App\Models\Table;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationStoreRequest;
use Illuminate\Support\Facades\Log;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::all();
        return view('admin.reservation.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        $tables = Table::all();
        return view('admin.reservation.create',compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationStoreRequest $request)
    {
        Reservation::create($request->validated());
        return to_route('admin.reservation.index')->with('success', 'Reservation created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $reservations = Reservation::find($id);
        
        $tables = Table::all();
        return view('admin.reservation.edit',compact('reservations','tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $reservations = Reservation::find($id);
    //    dd($reservations->all());
        try {
            $reservations->update([
                    'first_name' => $request->first_name,
                    'last_name' =>$request->last_name,
                    'email' => $request->email,
                    'tel_number' => $request->tel_number,
                    'res_date' => $request->email,
                    'guest_number' => $request->guest_number,
                    'table_id' => $request->table_id
            ]);
            dd($reservations->all());
        } catch (\Exception $e) {
            return view('admin.reservation.edit');
        }
       
        return view('admin.reservation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reservation $reservation,$id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return to_route('admin.reservation.index')->with('warning', 'Reservation deleted successfully.');
    }
}
