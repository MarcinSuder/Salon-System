<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Clients;
use Illuminate\Http\Request;

class ClientsController extends Controller
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
    public function index(Request $request)
    {
        $wyszukaj_klienta= $request->input('wyszukaj_klienta');
//      $clients = Clients::paginate(10);
        $clients = Clients::where('first_name', 'LIKE', '%'.$wyszukaj_klienta.'%')
            ->orwhere('last_name', 'LIKE', '%'.$wyszukaj_klienta.'%')
            ->paginate(10);


        return view('clients.index', compact('clients', 'wyszukaj_klienta'));
    }

    public function appointments($id)
    {
        $appointments = Clients::find($id)->appointments()->get();

        return view('clients.appointments' , compact('appointments'));
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
        return view('clients.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clients= new Clients();
        $clients ->id = $request->input('id');
        $clients->first_name = $request->input('first_name');
        $clients->last_name = $request->input('last_name');
        $clients->phone_number = $request->input('phone_number');
        $clients->preferences = $request->input('preferences');
        $clients->save();

        return redirect('/clients');
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
        $client= Clients::find($id);

        return view('clients.edit', compact('client'));
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
        $clients = Clients::find($id);
        $clients->first_name = $request->input('first_name');
        $clients->last_name = $request->input('last_name');
        $clients->phone_number = $request->input('phone_number');
        $clients->preferences = $request->input('preferences');
        $clients->save();

        return redirect('/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clients = Clients::find($id);
        $clients->delete();

        return redirect('/clients');
    }
}
