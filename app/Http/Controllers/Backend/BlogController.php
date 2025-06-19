<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $title = 'Posts';
        $search = 1;
        $links = [
            [
                'name' => 'Posts'
            ]
        ];
        $blogs = Blog::orderBy('created_at', 'DESC')->get();
        return view('backend.blogs.index', compact('title', 'search', 'links', 'blogs'));
    }

    public function add()
    {
        $title = 'Add Post';
        $links = [
            [
                'url' => route('admin.blog.index'),
                'name' => 'Posts'
            ],
            [
                'name' => $title
            ]
        ];
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('backend.blogs.add', compact('title', 'links', 'categories'));
    }

    public function edit($id)
    {
        $title = 'Edit Post';
        $links = [
            [
                'url' => route('admin.blog.index'),
                'name' => 'Posts'
            ],
            [
                'name' => $title
            ]
        ];
        $blog = Blog::findOrFail($id);
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('backend.blogs.add', compact('title', 'links', 'blog', 'categories'));
    }

    public function addEdit()
    {
        dd(request()->all());
    }
}
