<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Film;

class filmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = film::all();
        return view('film.home', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('film.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'title' => 'required|unique:posts|max:255',
        //     'director' => 'required|string|max:255',
        //     'cast' => 'required|string|max:255',
        //     'price' => 'required|numeric|min:0.01|max:1000',
        //     'year' => 'required|date',
        //     'production_house' => 'required|string|max:255',
        // ]);
        $data = $request->all();
        $film = new Film;
        // $film->title = $data['title'];
        // $film->director = $data['director'];
        // $film->cast = $data['cast'];
        // $film->price = $data['price'];
        // $film->year = $data['year'];
        // $film->production_house = $data['production_house'];
        $film->fill($data);
        $saved = $film->save();
        if ($saved) {
            return redirect()->route('films.index');
        }
        dd('errore');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        if(empty($film)) {
            abort('404');
        }

        return view('film.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        if(empty($film)) {
            abort('404');
        }

        return view('film.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        $data = $request->all();
        $updated = $film->update($data);
        if ($updated) {
            return redirect()->route('films.show', compact('film'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        $title = $film->title;
        $film->delete();
        $data = [
            'title' => $title,
            'film' => Film::all()
        ];
        $films = film::all();
        return view('film.home', $data, compact('films'));
    }
}
