<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function blogs() {
        return view('blog.blogs', ['blogs' => Blog::all()]);
    }

    //új blog létrehozása
    public function send_to_new_blog() {
        return view('blog.modify_blog');
    }

    public function new_blog(Request $request) {        
        $validated = $request->validate([
            'title' => 'required',
            'text' => 'required',
        ]);

        $blog = new Blog;
        $blog->title = $request->input('title');
        $blog->text = $request->input('text');

        $tags = $blog->tags;
        $tags['1'] = $request->input('tags');        
        $blog->tags = $tags;
                
        $request->user()->owner_blogs()->save($blog); 

        return redirect()->route('blogList');
    }

    //blog szerkesztése
    public function send_to_modify_blog($blog_id) {
        $blog = Blog::where('id', $blog_id)->firstOrFail();
        return view('blog.modify_blog')->with('blog', $blog);
    }

    public function modify_blog(Request $request, $blog_id) {
        $blog = Blog::where('id', $blog_id)->firstOrFail();
        $validated = $request->validate([
            'title' => 'required',
            'text' => 'required',
        ]);
        $blog->update($validated);      
        
        $tags = $blog->tags;
        $tags['1'] = $request->input('tags');        
        $blog->tags = $tags;
                
        $blog->save();

        return redirect()->route('blogList');
    }

    //saját blogok listázása
    public function blog_list() {
        return view('blog.blog_list', ['blogs' => Blog::where('user_id', Auth::user()->id)->orderBy('updated_at')->get()]);
    }

    //blog törlése
    public function delete_blog($blog_id) {
        $blog = Blog::where('id', $blog_id)->firstOrFail();
        
        $blog->delete();

        return redirect()->route('blogList'); 
    }

}