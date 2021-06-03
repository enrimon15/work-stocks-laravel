<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
            ->select('news_comments.*', 'users.name as user_name', 'users.avatar as user_avatar', 'users.id as user_id')
            ->join('news','news.id','=','news_comments.news_id')
            ->join('users','users.id','=','news_comments.user_id')
            ->where('news_comments.news_id','=',$id)
            ->orderBy('news_comments.created_at', 'desc')
            ->paginate(5);
        $latest = News::orderBy('created_at', 'desc')->limit(4)->get();

        return view('blog.blog-details')
            ->with('news', $news)
            ->with('comments', $comments)
            ->with('latest', $latest);
    }

    public function newsComment(Request $request) {

        $request->validate([
            'message'=> ['required', 'string'],
            'id' => ['required', 'numeric']
        ]);

        $news = News::findOrFail($request->input('id'));
        $news->comments()->attach(Auth::user(), ['body' => $request->input('message')]);
        return back()->with('success', __('blog.success'));
    }

    public function newsCommentDelete($id) {
        $comment = DB::table('news_comments')
            ->distinct()
            ->select('news_comments.*', 'users.id as user_id')
            ->join('users','users.id','=','news_comments.user_id')
            ->where('news_comments.id', '=', $id)
            ->groupBy('news_comments.id');

        $commentGet = $comment->get()->first();
        if ($commentGet->user_id != Auth::user()->id) {
            // error
        }

        $comment->delete();
        return back()->with('success', __('blog.successDelete'));

    }

    public function newsLike($id, $opType) {
        $news = News::findOrFail($id);
        $body = null;
        $url = null;

        if ($opType == 'add'){
            $news->likes()->attach(Auth::user());
            $body = 'mr-2 lni lni-heart-filled';
            $url = route('newsLike',['id'=> $news->id, 'opType' => 'remove']);
        }

        else if ($opType == 'remove') {
            $news->likes()->detach(Auth::user());
            $body = 'mr-2 lni lni-heart';
            $url = route('newsLike',['id'=> $news->id, 'opType' => 'add']);
        }

        return response(json_encode(['body'=>$body, 'url'=>$url, 'opType'=>$opType]), 200);
        //return back()->with('success', __('blog.successLike'));
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
