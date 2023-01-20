<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with('song')->get();
        return view('articles.lyrics', compact('articles'));
    }

    public function getArticle() {
        $articles = DB::select('select * from articles');
        return view('article', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $songs = Song::all();
        return view('articles.addlyrics', compact('songs'));
    }

    public function getDetails(Request $request) {
        $details = Song::select('artist_name', 'song_address', 'id')->where('song_name', $request->id)->first();

        return response()->json($details);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = Article::where('song_name', $request->input('songname'))->first();

        $errors = ['error' => '', 'done' => ''];

        if (!$article == '') {
            $errors[0] = "This lyrics already is registered!";
            return view('articles.addlyrics', compact('errors'));
        }
        Article::create([
            'song_name' => $request->input('songname'),
            'artist_name' => $request->input('artist'),
            'song_address' => $request->input('address'),
            'song_id' => $request->input('songid'),
            'lyrics' => $request->input('lyrics'),
        ]);

        return redirect()->route('articles.lyrics');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $songs = Song::all();
        return view('articles.updatelyrics', compact('article', 'songs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $song_name = $request->input('songname');
        $artist_name = $request->input('artist');
        $song_address = $request->input('address');
        $song_id = $request->input('songid');
        $lyrics = $request->input('lyrics');

        DB::update('update articles set song_name = ?, artist_name = ?, song_address = ?, song_id = ?, lyrics = ? where id = ?',[$song_name, $artist_name, $song_address, $song_id, $lyrics, $id]);

        return redirect()->route('articles.lyrics');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::where('id', $id);
        $article->delete();
        return redirect()->route('articles.lyrics');
    }
}
