<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index() {
        $news = News::orderBy('created_at', 'desc')->paginate(9);
        return view('blog.blog')->with('news', $news);
    }

    public function show($id) {
        $news = News::findOrFail($id);
        $comments = DB::table('news_comments')
            ->select('news.*', 'applications.created_at', 'companies.name as company_name', 'places_of_works.country as country', 'places_of_works.city as city')
            ->join('news','news.id','=','news_comments.news_id')
            ->where('news_comments.news_id','=',$id)
            ->orderBy('news_comments.created_at', 'desc')
            ->paginate(5);

        return view('blog.blog-details')
            ->with('news', $news)
            ->with('comments', $comments);
    }

    public function newsComment(Request $request) {

        $request->validate([
            'message'=> ['required', 'string'],
            'id' => ['required', 'numeric']
        ]);

        $news = News::findOrFail($request->input('id'));
        $news->comments()->attach(Auth::user(), ['body' => $request->input('message')]);
        return back()->with('success', 'Commento inviato!');
    }

    public function newsLike(Request $request, $opType) {
        $news = News::findOrFail($request['news_id']);

        if ($opType == 'add'){
            $news->likes()->attach(Auth::user());
        }

        else if ($opType == 'remove') {
            $news->likes()->detach(Auth::user());
        }

        // ajax

    }

    //ricerca per titolo
    public function search($query){
        $news = null;
        if ($query != null) {
            $news = News::where('title', 'LIKE', '%'.$query.'%')->orderBy('created_at', 'desc')->paginate(9);
        }

        return view('blog.blog')->with('news', $news)->with('query', $query);
    }
}
