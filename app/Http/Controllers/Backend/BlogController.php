<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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

        $selectedAuthor = request()->author ?? '';
        $selectedCategory = request()->category ?? '';
        $authors = Blog::select('author')->distinct()->get()->pluck(['author']);
        $authors = $authors?->toArray() ?? [];
        $categories = BlogCategory::select('categories.id', 'categories.name')->join('categories', 'categories.id', 'blog_categories.category_id')->join('blogs', 'blogs.id', 'blog_categories.blog_id')->distinct()->get();

        $blogs = Blog::query();
        if (!empty((request()->keyword ?? ''))) {
            $blogs->where('name', 'like', '%' . (request()->keyword ?? '') . '%');
        }
        if (!empty($selectedAuthor)) {
            $blogs->where('author', $selectedAuthor);
        }
        if (!empty((request()->date_from ?? ''))) {
            $blogs->whereDate('published_at', '>=', date('Y-m-d', strtotime(request()->date_from)));
        }
        if (!empty((request()->date_to ?? ''))) {
            $blogs->whereDate('published_at', '<=', date('Y-m-d', strtotime(request()->date_to)));
        }
        if(!empty($selectedCategory)){
            $blogs->whereHas('categories', function($q) use ($selectedCategory){
                $q->where('categories.id', $selectedCategory);
            });
        }

        $blogs = $blogs->orderBy('created_at', 'DESC')->paginate(get_option('admin_perpage'));

        return view('backend.blogs.index', compact('title', 'search', 'links', 'blogs', 'authors', 'selectedAuthor', 'selectedCategory', 'categories'));
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
        $selected_cat_ids = [];
        foreach ($blog->categories as $key => $value) {
            $selected_cat_ids[] = $value->id;
        }
        return view('backend.blogs.add', compact('title', 'links', 'blog', 'categories', 'selected_cat_ids'));
    }

    public function addEdit(Request $request)
    {
        DB::beginTransaction();
        try {
            $rules = [
                'id' => ['nullable', 'exists:blogs,id'],
                'name' => ['required'],
                'short_description' => ['required'],
                'content' => ['required'],
                'author' => ['required'],
                'publish_date' => ['required']
            ];
            if (empty($request->id)) {
                $rules['image'] = ['required', 'mimes:jpg,jpeg,png'];
            } else {
                $rules['image'] = ['nullable', 'mimes:jpg,jpeg,png'];
            }
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json(['success' => 0, 'errors' => $validator->errors()->toArray()]);
            }

            $blog = new Blog();
            if (!empty($request->id)) {
                $blog = Blog::find($request->id);
            }
            $blog->name = $request->name ?? '';
            $blog->short_description = $request->short_description ?? '';
            $blog->content = $request->content ?? '';
            $blog->author = $request->author ?? '';
            $blog->published_at = date('Y-m-d', strtotime($request->publish_date));
            $blog->save();

            BlogCategory::where('blog_id', $blog?->id)->delete();
            foreach ($request->categories as $key => $value) {
                BlogCategory::insert([
                    'blog_id' => $blog->id,
                    'category_id' => $value
                ]);
            }
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = 'IMG_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $request->image->move(public_path('storage/blog'), $imageName);
                $dbImage = 'storage/blog/' . $imageName;
                $blog->image = $dbImage;
                $blog->save();
            }
            DB::commit();
            session()->put('success', 'Blog successfully ' . (empty($request->id) ? 'created' : 'updated') . '.');
            return response()->json(['success' => 1, 'msg' => '', 'redirect' => route('admin.blog.index')]);
        } catch (Exception $err) {
            DB::rollback();
            return response()->json(['success' => 0, 'msg' => $err->getMessage()]);
        }
    }

    public function delete($id)
    {
        $blog = Blog::findOrFail($id);
        if (is_file_exists($blog->image)) {
            unlink($blog->image);
        }
        $blog->delete();
        return redirect()->back()->with('success', 'Blog deleted successfully.');
    }
}
