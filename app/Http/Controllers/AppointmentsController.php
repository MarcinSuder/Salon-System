<?php

namespace App\Http\Controllers;

use App\Appointments;
use App\AppointmentsHasProducts;
use App\Clients;
use App\Products;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = Appointments::paginate(10);

        return view('appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Clients::all();
//       tak dodajemy szablon przy dodawaniu:
        return view('appointments.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointment = new Appointments();

        $appointment->clients_id = $request->input('clients_id');
        $appointment->date = $request->input('date');
        $appointment->paid = $request->input('paid');
        $appointment->notes = $request->input('notes');
        $appointment->save();

        return redirect('/appointments/' . $appointment->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Products::all();


        return view('appointments.show', compact('id','products'));
    }

    public function used($id)
    {
        $products = Products::all();
        $appointments = AppointmentsHasProducts::where('appointments_id', $id)->get();

        return view('appointments.used', compact('id','appointments', 'products'));
    }

    public function editUsed(Request $request)
    {
        $post = $request->all();

        $i = 0;
        foreach ($post['products_id'] as $item) {

            if($post['app_id'][$i] == 0) {
                $pivotTable = new AppointmentsHasProducts();
            } else {
                $pivotTable = AppointmentsHasProducts::find($post['app_id'][$i]);
            }
            $pivotTable->products_id = $item;
            $pivotTable->appointments_id = $post['id'];
            $pivotTable->used = $post['used'][$i];
            $pivotTable->save();
            $i++;
        }

        return redirect('/appointments');
    }

    public function removeUsed($id)
    {
        $appointment = AppointmentsHasProducts::find($id);
        $appointment->delete();

        return back();
    }

    public function add(Request $request)
    {
        $post = $request->all();


        $i = 0;
        foreach ($post['products_id'] as $item) {

            $pivotTable = new AppointmentsHasProducts();
            $pivotTable->products_id = $item;
            $pivotTable->appointments_id = $post['id'];
            $pivotTable->used = $post['used'][$i];
            $pivotTable->save();
            $i++;
        }

        return redirect('/appointments');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointments::find($id);
        $clients = Clients::all();
        return view('appointments.edit', compact('appointment', 'clients'));
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
        $appointment = Appointments::find($id);
        $appointment->clients_id = $request->input('clients_id');
        $appointment->date = $request->input('date');
        $appointment->paid = $request->input('paid');
        $appointment->notes = $request->input('notes');
        $appointment->save();

        return redirect('/appointments/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointments::find($id);
        $appointment->delete();

        return redirect('/appointments');
    }
}
