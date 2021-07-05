<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Resources\NewsResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon; //Date

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return NewsResource::collection(News::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function create()
    {
        return view('news.newsanlegen');
    }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'news_titel' => 'required|min:2|max:70',
            'news_textfeld'=> 'required|min:10|max:255',
            'news_bild_url'=> 'nullable',
        ]);

        if ($validator->fails()) {
            return \response('Validierung fehlgeschlagen, der News-Titel muss angegeben werden!', 200)
            ->header('Content-Type', 'text/plain');
            
        }else {
            $news = new News();
            $news->news_titel = $request->news_titel;
            $news->news_textfeld = $request->news_textfeld;
            $news->news_bild_url = $request->news_bild_url;
            $date = Carbon::now();
            $news->created_at=$date->toDateTimeString();
           
            if($news->save()){
                return \response('News-Post erfolgreich gespeichert!', 200)
                ->header('Content-Type', 'text/plain');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $news = News::find($id);
        return $news;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    /*
    public function edit(News $news)
    {
        return view('news.edit')->with('news',$news);
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $news = News::findOrFail($id);
        $news->id = $request->id;
        $news->news_titel = $request->news_titel;
        $news->news_textfeld = $request->news_textfeld;
        $news->news_bild_url = $request->news_bild_url;

        $date = Carbon::now();
        $news->updated_at=$date->toDateTimeString();

        if($news->save())
        {
            return \response('News-Post erfolgreich in DB gespeichert!', 200)
            ->header('Content-Type', 'text/plain');
        }else {
            return \response('News-Post konnte nicht gespeichert werden!', 200)
            ->header('Content-Type', 'text/plain');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news = News::findOrFail($id);
        $news->delete();
    }
}
