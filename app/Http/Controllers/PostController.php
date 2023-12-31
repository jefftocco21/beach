<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    public function index()
    {
        // dd(request()->user()->can('admin'));
        return view('posts.index', [
            'posts' => Post::latest()->filter(
                request(['search', 'category', 'author']))
                    ->paginate(9)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
            return view('posts.show', [
        'post' => $post
    ]);
    }



} 
