<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Http\Resources\NewsResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsliste = News::paginate(4); // für 4 News pro Seite unter /app/news im Frontend
        return NewsResource::collection($newsliste);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.newsanlegen');
    }

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
            'news_anrede' => 'required|min:4|max:4',
            'news_vorname'=> 'nullable|min:2|max:30',
            'news_nachname'=> 'nullable|min:2|max:30',
            'news_email'=> 'nullable|min:2|max:50',
        ]);

        if ($validator->fails()) {
            return Response::json([
                'error' => $validator->errors()], 200);
            
        }else {
            $news = new News();
            $news->news_anrede = $request->news_anrede;
            $news->news_vorname = $request->news_vorname;
            $news->news_nachname = $request->news_nachname;
            $news->news_email = $request->news_email;
           
            if($news->save()){
                return new NewsResource($news);
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
    public function edit(News $news)
    {
        return view('news.edit')->with('news',$news);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $news = News::findOrFail($id);
        $news->id = $request->id;
        $news->news_anrede = $request->news_anrede;
        $news->news_vorname = $request->news_vorname;
        $news->news_nachname = $request->news_nachname;
        $news->news_email = $request->news_email;
        if($news->save())
        {
            return new NewsResource($news);
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
    }
}
