<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blog;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function blogs() {
        return view('blog.blogs', ['blogs' => Blog::orderByDesc('updated_at')->get()]);
    }

    //új blog létrehozása
    public function send_to_new_blog() {
        return view('blog.modify_blog');
    }

    public function new_blog(Request $request) {        
        $validated = $request->validate([
            'title' => 'required|max:255',
            'text' => 'required',
            'tag1' =>'required|max:25',
            'tag2' => 'max:25',
            'tag3' => 'max:25'
        ]);

        $blog = new Blog;
        $blog->title = $request->input('title');
        $blog->text = $request->input('text');
        $blog->tag1 = $request->input('tag1');
        $blog->tag2 = $request->input('tag2');
        $blog->tag3 = $request->input('tag3');
                
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
            'title' => 'required|max:255',
            'text' => 'required',
            'tag1' =>'required|max:25',
            'tag2' => 'max:25',
            'tag3' => 'max:25'
        ]);
        $blog->update($validated);      
        
        $blog->tag2 = $request->input('tag2');
        $blog->tag3 = $request->input('tag3');
                
        $blog->save();

        return redirect()->route('blogList');
    }

    //saját blogok listázása
    public function blog_list() {
        return view('blog.blog_list', ['blogs' => Blog::where('user_id', Auth::user()->id)->orderByDesc('updated_at')->get()]);
    }

    //blog törlése
    public function delete_blog($blog_id) {
        $blog = Blog::where('id', $blog_id)->firstOrFail();
        
        $blog->delete();

        return redirect()->route('blogList'); 
    }

    //blog keresése
    public function blog_search(Request $request) {
        $search = $request->input('tag');

        $blogs = Blog::where('tag1', $search)->orWhere('tag2', $search)->orWhere('tag3', $search)->get();

        return view('blog.blogs', ['blogs' => $blogs]);
    }

}
