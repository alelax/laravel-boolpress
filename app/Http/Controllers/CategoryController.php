<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
    public function show($category_name)
    {
        
        /* $categories = Category::join('category_post', 'categories.id', '=', 'category_post.category_id')
                              ->join('posts', 'category_post.post_id', '=', 'posts.id')
                              ->where('categories.name', $category_name)    
                              ->select('*')->get();
         */
        
         
        $category = Category::where('name', $category_name)->first();

        if (empty($category)) abort(404);

        $posts = $category->posts;
        
        return view( 'post_by_category.index', ['filtered_post' => $posts, 'categoria' => $category_name] );

    }



}

