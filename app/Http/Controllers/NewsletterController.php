<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters = Newsletter::all();
        return view('newsletters.newsletter', compact('newsletters'));
    }

    public function getNewsletter() {
        $newsletters = DB::select('select * from newsletters');
        
        return view('news', compact('newsletters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newsletters.addnewsletter');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$errors = ['error' => '', 'done' => ''];

        $request->validate([
            'image' => 'required|image|mimes:png,jfif,jpg,jpeg|max:2048'
        ]);

        $file=$request->file("image");
        $imageName=time().'_'.$file->extension();;
        $file->move(\public_path("images/"),$imageName);

        $newsletter = new Newsletter([
            'image' => $imageName,
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'summary' => $request->summary,
            'description' => $request->description,
        ]);
            
        $newsletter->save();

        return redirect()->route('newsletters.newsletter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newsletter = Newsletter::find($id);
        return view('newsletters.updatenewsletter', compact('newsletter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newsletter = Newsletter::where('id', $id)->first();

        if (File::exists("image".$newsletter->image)) {
            File::delete("image".$newsletter->image);
        }

        $file=$request->file("image");
        $newsletter->image=time()."_".$file->getClientOriginalName();
        $file->move(public_path("image"),$newsletter->image);
        $request['image']=$newsletter->image;

        $title = $request->title;
        $sub_title = $request->sub_title;
        $summary = $request->summary;
        $description = $request->description;
        $image = $newsletter->image;

       DB::update('update newsletters set title = ?, sub_title = ?, summary = ?, description = ?, image = ? where id = ?',[$title, $sub_title, $summary, $description, $image, $id]);

       return redirect()->route('newsletters.newsletter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        //
    }
}
