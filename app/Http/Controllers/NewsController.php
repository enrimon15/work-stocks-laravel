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
        try {
            $news = News::orderBy('created_at', 'desc')->paginate(9);
            return view('blog.blog')->with('news', $news);
        } catch(\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    public function show($id) {
        try {
            $news = News::findOrFail($id);
            $comments = DB::table('news_comments')
                ->select('news_comments.*', 'users.name as user_name', 'users.avatar as user_avatar', 'users.id as user_id')
                ->join('news', 'news.id', '=', 'news_comments.news_id')
                ->join('users', 'users.id', '=', 'news_comments.user_id')
                ->where('news_comments.news_id', '=', $id)
                ->orderBy('news_comments.created_at', 'desc')
                ->paginate(5);
            $latest = News::orderBy('created_at', 'desc')->limit(4)->get();

            return view('blog.blog-details')
                ->with('news', $news)
                ->with('comments', $comments)
                ->with('latest', $latest);
        } catch(\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    public function newsComment(Request $request) {
        try {
            $request->validate([
                'message' => ['required', 'string'],
                'id' => ['required', 'numeric']
            ]);

            $news = News::findOrFail($request->input('id'));
            $news->comments()->attach(Auth::user(), ['body' => $request->input('message')]);
            return back()->with('success', __('blog.success'));
        } catch(\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    public function newsCommentDelete($id) {
        try {
            $comment = DB::table('news_comments')
                ->distinct()
                ->select('news_comments.*', 'users.id as user_id')
                ->join('users', 'users.id', '=', 'news_comments.user_id')
                ->where('news_comments.id', '=', $id)
                ->groupBy('news_comments.id');

            $commentGet = $comment->get()->first();
            if ($commentGet->user_id != Auth::user()->id) {
                abort(401, 'unauthorized');
            }

            $comment->delete();
            return back()->with('success', __('blog.successDelete'));
        } catch(\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }

    }

    public function newsLike($id, $opType) {
        try {
            $news = News::findOrFail($id);
            $body = null;
            $url = null;

            if ($opType == 'add') {
                $news->likes()->attach(Auth::user());
                $body = 'mr-2 lni lni-heart-filled';
                $url = route('newsLike', ['id' => $news->id, 'opType' => 'remove']);
            } else if ($opType == 'remove') {
                $news->likes()->detach(Auth::user());
                $body = 'mr-2 lni lni-heart';
                $url = route('newsLike', ['id' => $news->id, 'opType' => 'add']);
            } else {
                abort(404, 'not found');
            }

            return response(json_encode(['body' => $body, 'url' => $url, 'opType' => $opType]), 200);
        } catch(\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }

    //ricerca per titolo
    public function search($query){
        try {
            $news = null;
            if ($query != null) {
                $news = News::where('title', 'LIKE', '%' . $query . '%')->orderBy('created_at', 'desc')->paginate(9);
            }

            return view('blog.blog')->with('news', $news)->with('query', $query);
        } catch(\Exception $ex) {
            echo($ex);
            abort(500, 'generic error');
        }
    }
}
