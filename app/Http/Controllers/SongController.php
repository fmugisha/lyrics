<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::all();
        return view('songs.song', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.addsong');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $song = Song::where('song_name', $request->input('songname'))->first();

        $errors = ['error' => '', 'done' => ''];

        if (!$song == '') {
            $errors[0] = "This song is registered!";
            return view('songs.addsong', compact('errors'));
        }
        Song::create([
            'song_name' => $request->input('songname'),
            'artist_name' => $request->input('artist'),
            'song_address' => $request->input('address'),
        ]);

        return redirect()->route('songs.song');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function show(Song $song)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $song = Song::find($id);
        return view('songs.updatesong', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $song_name = $request->input('songname');
        $artist_name = $request->input('artist');
        $song_address = $request->input('address');

        DB::update('update songs set song_name = ?, artist_name = ?, song_address = ? where id = ?',[$song_name, $artist_name, $song_address, $id]);
        DB::update('update articles set song_name = ?, artist_name = ?, song_address = ? where song_id = ?',[$song_name, $artist_name, $song_address, $id]);

        return redirect()->route('songs.song');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Song  $song
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song = Song::where('id', $id)->first();
        $article = Article::where('song_name', $song->song_name);
        $article->delete();
        $song->delete();
        return redirect()->route('songs.song');
    }
}
