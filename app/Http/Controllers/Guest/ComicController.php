<?php

namespace App\Http\Controllers\Guest;

use App\Models\Comic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComicController extends Controller
{
    // variabile privata per i controlli che si può usare ovunque.(vedi update) / oppure si possono ricopiare le validations direttamente.
    private $validations = [
            'title'           =>      'required|string|max:200',
            'description'     =>      'required|string',
            'thumb'           =>      'required|url',
            'price'           =>      'required|integer|max:50',
            'series'          =>      'required|string|max:200',
            'sale_date'       =>      'required|string|max:50',
            'type'            =>      'required|string|max:200',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::paginate(4);
        // $comics = Comic::all(); - seleziona tutti i dati
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // controllare cosa inserisce l'utente
        $request->validate([
            'title'           =>      'required|string|max:200',
            'description'     =>      'required|string',
            'thumb'           =>      'required|url',
            'price'           =>      'required|integer|max:50',
            'series'          =>      'required|string|max:200',
            'sale_date'       =>      'required|string|max:50',
            'type'            =>      'required|string|max:200',
        ]);



        $data = $request->all();
        // salvare i dati nel database
        $newComic = new Comic();
        $newComic->title = $data['title'];
        $newComic->description = $data['description'];
        $newComic->thumb = $data['thumb'];
        $newComic->price = $data['price'];
        $newComic->series = $data['series'];
        $newComic->sale_date = $data['sale_date'];
        $newComic->type = $data['type'];

        
        // $newComic = Comic::create($data);
        $newComic->save(); 
        // reinderizzare l'utente in modo che non possa reinserire i dati involontariamente
        return redirect()->route('comics.show' , ['comic' => $newComic->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        // validare i dati
        $data = $request->all();
        $request->validate($this->validations);
        // aggiornare i dati nel DB
        $comic->title           = $data['title'];
        $comic->thumb           = $data['thumb'];
        $comic->series          = $data['series'];
        $comic->type            = $data['type'];
        $comic->price           = $data['price'];
        $comic->sale_date       = $data['sale_date'];
        $comic->description     = $data['description'];
        $comic->update();

        // modo alternativo per reinderizzare l'utente
        // return redirect()->route('comics.show' , ['comic' => $comic->id]);
        return to_route('comics.show',['comic' => $comic->id]);
    }

    /**
     *
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Comic $comic)
    {
        $comic->delete();
        return to_route('comics.index')->with('delete_success', $comic);
    }

    public function restore($id){
    

        $comic = Comic::withTrashed()
                ->where('id', $id)
                ->restore();
        $comic = Comic::find($id);
        return to_route('comics.index')->with('restore_success', $comic);

    }

    
    // public function harddelete($id){
    //     $comic = Comic::withTrashed()
    //     ->where('id', $id);
    //     $comic->forceDelete();
    //     return to_route('comics.trashed')->with('delete_success', $comic);
    // }
    
    // public function trash(){
        //  $trashedcomics = Comic::withTrashed()->paginate(5);
        //  return view('comics.trashed', compact('comic'));

    // }
}

