<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adres;
class AdresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adressen = Adres::all();
        return view('index', compact('adressen'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('create');
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
        $request->validate([
          'naam'=>'required|unique:adres',
          'adres'=>'required|unique:adres',
        ]);

        $adres = new Adres([
          'naam'=> $request->get('naam'),
          'adres'=> $request->get('adres'),
        ]);
        $adres->save();
        return redirect('/')->with('succesvol', 'Adres opgeslagen!');
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
        $adres = Adres::find($id);
        return view('edit', compact('adres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        
        $request->validate([
            'naam'=>'required|unique:adres',
            'adres'=>'required|unique:adres',
        ]);

        $adres = Adres::find($id);

        $adres->naam = $request->get('naam'); 
        $adres->adres = $request->get('adres'); 
        $adres->save();
        return redirect('/')->with('success', 'Adres updated!'); 
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
            $adres = Adres::find($id);
            if($adres->delete()){
                
                return response()->json(true);
            }else{
                return response()->json(false);
                
            }
                
    }
}
