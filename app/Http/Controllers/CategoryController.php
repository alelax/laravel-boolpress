<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;

class CategoryController extends Controller
{
    public function show($category_name)
    {
        
        $categories = Category::join('category_post', 'categories.id', '=', 'category_post.category_id')
                              ->join('posts', 'category_post.post_id', '=', 'posts.id')
                              ->where('categories.name', $category_name)    
                              ->select('*')->get();
        /* dd($categories); */   
        return view( 'post_by_category.index', ['filtered_post' => $categories, 'categoria' => $category_name] );
    }
}
