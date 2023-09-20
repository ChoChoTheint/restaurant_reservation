<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\tableStoreRequest;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::all();
        return view('admin.tables.index',compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(tableStoreRequest $request)
    {
        $tables = Table::create([
            'name' => $request->name,
            'guest_number' => $request->guest_number,
            'status' => $request->status,
            'location' => $request->location,
        ]);

        return to_route('admin.tables.index');
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
        $tables = Table::find($id);
        return view('admin.tables.edit',compact('tables'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $tables = Table::find($id);
        $request->validate([
            'name' => 'required',
            'guest_number' =>'required',
            'status' => 'required',
            'location' => 'required'   
        ]);
        try {
            $tables->update([
                'name' => $request->name,
                'guest_number' =>$request->guest_number,
                'status' => $request->status,
                'location' => $request->location   
            ]);
        } catch (\Exception $e) {
            return to_route('admin.tables.edit');
        }
        return to_route('admin.tables.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $table = Table::find($id);
        $table->delete();
        return to_route('admin.tables.index')->with('success', 'Menu deleted successfully.');
    }
}
