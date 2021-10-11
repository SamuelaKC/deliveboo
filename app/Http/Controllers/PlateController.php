<?php

namespace App\Http\Controllers;

use App\Category;
use App\Plate;
use Illuminate\Http\Request;


class PlateController extends Controller
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
        $data = $request->all();

        $plate = new Plate();

        $this->fillAndSavePlate($plate, $data);
        // viene salvato nel DB

        return redirect()->route('plates.index', $plate->id);
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
    public function edit(Plate $plate)
    {
        $categories = Category::all();
        return view('plates.edit', compact('plate', 'categories')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        $data=$request->all();
        $this->fillAndSavePlate($plate, $data);
        return redirect()->route('plates.show', $plate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        $plate->delete();
        return redirect()->route('plates.index');
        // settare nell'index il collegamento alla route, nella form :
        // {{  route('book.delete', $book}}
        // e dopo il @csrf
        // @method('DELETE') per cambiare il method 'POST' scritto necessariamente sopra nel form

        // <form action="{{route('plates.destroy',$plate)}}" method="POST">
        //     @csrf
        //     @method('DELETE')
        //     <button type="submit">Elimina</button>
        // </form>
    }

    private function fillAndSavePlate(Plate $plate, $data)
    {
        $plate->name = $data['name'];
        $plate->description = $data['description'];
        $plate->available = $data['available'];
        $plate->price = $data['price'];
        $plate->picture = $data['picture'];
        $plate->save();
    }
}
