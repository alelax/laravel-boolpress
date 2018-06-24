<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{   

    public function show()
    {        
        $posts = Post::orderBy('created_at', 'desc')
                    ->limit(5)
                    ->get();
        
        return view('home.index', ['posts' => $posts]);
    }

    public function postDetail($postslug)
    {  
        $post_clicked = Post::where('title', $postslug) -> first();
        
        return view('post_detail.index', ['post_clicked' => $post_clicked ]);
    }

    public function newPost(Request $request)
    {
        if ($request->isMethod('get')) {

            $categories = Category::All();
            /* dd($categories); */
            return view('post_add.index', ['categories' => $categories]); 
        }
        elseif ($request->isMethod('post')) {
            
            $new_post = new Post();
            $new_post->title = $request->input('postTitle'); 
            $new_post->subtitle = $request->input('postSubTitle'); 
            $new_post->content = $request->input('postContent');
            $new_post->author = $request->input('postAuthor');

            $validate = $request->validate([
                'title'    => 'required',
                'subtitle' => 'required',
                'content'  => 'required',
                'author'   => 'required'
            ]);
            
            $new_post->save();

            $new_post->categories()->sync($request->input('postCategory'));

            return redirect()->route('admin.postNew');
        }
    }

    public function edit(Request $request, $postslug)
    {
        if ($request->isMethod('get')) {
        
            $post_to_editing = Post::where('title', $postslug) -> first();
            $categories = Category::All();
            return view('post_edit.index', ['post_to_editing' => $post_to_editing, 'categories' => $categories ]);
        
        }elseif ($request->isMethod('post')) {
            
            $post_to_editing = Post::where('title', $postslug) -> first();
            $post_to_editing->title = $request->input('postTitle'); 
            $post_to_editing->subtitle = $request->input('postSubTitle'); 
            $post_to_editing->content = $request->input('postContent');
            $post_to_editing->author = $request->input('postAuthor');
            
            $post_to_editing->save();

            $post_to_editing->categories()->sync($request->input('postCategory'));

            $validate = $request->validate([
                'title'    => 'required',
                'subtitle' => 'required',
                'content'  => 'required',
                'author'   => 'required'
            ]);

            return redirect()->route('post.detail', $post_to_editing['title']);
        }
    }
   /*  public function edit(Request $request, $postslug)
    {
        
        

        
        

        
    } */
}
