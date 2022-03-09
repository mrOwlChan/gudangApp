<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Query Database dengan Database Query Builder
        // $warehouses = DB::table('warehouses')->get();

        // Query Database dengan Eloquent ORM
        $warehouses = Warehouse::all();

        return view('warehouse.index', ['warehouses' => $warehouses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $warehouses = Warehouse::all();
        $warehouses = Warehouse::all();

        return view('warehouse.create', ['warehouses' => $warehouses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi Data
        $validatedData = $request->validate([
            'name' => ['required', 'min:5', 'max:100'],
            'type' => ['required'],
            'address' => ['required', 'min:5'],
            'desc' => ['required', 'min:5'],
            'code' => ['required'],
            'statusready' => ['required']
        ]);
        
        // Store data dengan Eloquent ORM 1
        //  $insertData = new Warehouse;
        //  $insertData->name = $request->name;
        //  $insertData->type = $request->type;
        //  $insertData->address = $request->address;
        //  $insertData->desc = $request->desc;
        //  $insertData->code = $request->code;
        //  $insertData->statusready = $request->statusready;
        //  $insertData->save();

        // Store data dengan Eloquent ORM 2
        Warehouse::create($validatedData);

        // Redirect
        return redirect('/warehouse')->with('success', 'Add warehouse '.$request->name.' with code: '.$request->code.' success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
        // 
        return view('warehouse.edit', ['warehouse' => $warehouse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        // Validasi Data
        $validatedData = $request->validate([
            'name' => ['required', 'min:5', 'max:100'],
            'type' => ['required'],
            'address' => ['required', 'min:5'],
            'desc' => ['required', 'min:5'],
            'statusready' => ['required']
        ]);

        // Update dengan Eloquent ORM
        Warehouse::where('id', $warehouse->id)->update($validatedData);

        // Redirect
        return redirect('/warehouse')->with('success', 'Edit warehouse with code: '.$warehouse->code.' success!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehouse  $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        // Proses Delete 
        Warehouse::destroy($warehouse->id);

        return redirect('/warehouse')->with('success', 'Delete warehouse '.$warehouse->name.' with code: '.$warehouse->code.' success!');
    }
}
