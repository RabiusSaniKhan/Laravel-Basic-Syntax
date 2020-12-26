<?php
namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;

class ArticleController extends Controller
{
    public function index()
    {
        return view('article.index',[
            'articles' => $this->getArticles()
        ]);
    }

    public function create()
    {
        return view('article.create',[
            'tags'=>Tag::all()
        ]);
    }

    public function store()
    {
        $article = new Article($this->getValidate());
        $article->user_id = 1;
        $article->save();
        $article->tags()->attach(\request('tags'));

        return redirect('/article');
    }

    public function show(Article $article)
    {
        return view('article.show',compact('article'));
    }

    public function edit(Article $article)
    {
        return view('article.edit',compact('article'));
    }

    public function update(Article $article)
    {
        $article->update(request()->validate([
            'title'=>'required',
            'body'=>'required',
            'excerpt'=>'required'
        ]));
        return redirect('/article/'.$article->id);
    }

    public function destroy(Article $article)
    {
        //
    }

    /**
     * @return array
     */
    public function getValidate(): array
    {
        $validateData = request()->validate([
            'title' => 'required',
            'body' => 'required',
            'excerpt' => 'required',
            'tags' => 'required | exists:tags,id'
        ]);

        return request(['title','excerpt','body']);
    }
    public function getArticles(){
        if(request('tag')){
            return Tag::where('id',request('tag'))->first()->articles;
        }
        elseif (request('user')){
            return User::where('id',request('user'))->first()->articles;
        }
        else{
            return Article::latest()->get();
        }
    }
}
