<?php

namespace App\Http\Controllers;

use App\Category;
use App\Plate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlateController extends Controller
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
        $userId = Auth::id();
        $plates = Plate::where('user_id', $userId)->get();
        return view('plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('plates.create',compact('categories') );
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
    public function show(Plate $plate)
    {        
        return view('plates.show', compact('plate'));
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
        $userId = Auth::id();
            if ($userId === $plate->user_id) {
                return view('plates.edit', compact('plate', 'categories')); 
            } else {
                return view('error.index');
            }

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
        return redirect()->route('plates.index', $plate);
        // return view('plates.show', compact('plate'));
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
        $plate->available = key_exists('available', $data) ? true: false;
        $plate->price = $data['price'];
        $plate->picture = $data['picture'];
        $plate->category_id = $data['categories'];
        $plate->save();
    }
}