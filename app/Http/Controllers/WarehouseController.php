<?php

namespace App\Http\Controllers;

use App\Products;
use App\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = Warehouse::paginate(10);

        return view('warehouse.index', compact('warehouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        $warehouse = Warehouse::all();
        $products = Products::all();
//       tak dodajemy szablon przy dodawaniu:
        return view('warehouse.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $warehouse = new Warehouse();
        $warehouse->id = $request->input('id');
        $warehouse->products_id = $request->input('products_id');
        $warehouse->capacity = $request->input('capacity');
        $warehouse->quantity = $request->input('quantity');
        $warehouse->price = $request->input('price');
        $warehouse->save();

        return redirect('/warehouses');
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
        $warehouse = Warehouse::find($id);
        $products = Products::all();

        return view('warehouse.edit', compact('warehouse', 'products'));
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
        $warehouse = Warehouse::find($id);

        $warehouse ->products_id = $request->input('products_id');
        $warehouse->capacity = $request->input('capacity');
        $warehouse->quantity = $request->input('quantity');
        $warehouse->price = $request->input('price');
        $warehouse->save();

        return redirect('/warehouses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warehouse = Warehouse::find($id);
        $warehouse->delete();

        return redirect('/warehouses');
    }
}
