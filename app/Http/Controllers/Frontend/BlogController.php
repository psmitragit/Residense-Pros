<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\BlogLike;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{
    public function blogDetails($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $title = $blog->name;
        $latestBlogs = getBlogs(limit: 5);
        $dates = [];
        $blogDates = Blog::select('published_at')->orderBy('published_at', 'DESC')->get();
        foreach ($blogDates as $key => $value) {
            try {
                $dateObj = Carbon::parse($value->published_at);
                $val = $dateObj->format('m/Y');
                $valDate = $dateObj->format('F Y');
            } catch (Exception $er) {
                $val = '';
            }
            if (!empty($val) && !array_key_exists($val, $dates)) {
                $dates[$val] = $valDate;
            }
        }
        $categories = Category::select('categories.id', 'categories.name')->join('blog_categories', 'blog_categories.category_id', 'categories.id')->groupBy('categories.id')->get();
        $selectedCategory = request()->category ?? '';
        $selectedDate = request()->m ?? '';
        $currentUrl = url()->current();

        $nextBlog = Blog::select('slug')->where('id', '>', $blog->id)->where('status', '1')->whereDate('published_at', '<=', date('Y-m-d'))->orderBy('id', 'ASC')->first();
        $prevBlog = Blog::select('slug')->where('id', '<', $blog->id)->where('status', '1')->whereDate('published_at', '<=', date('Y-m-d'))->orderBy('id', 'DESC')->first();

        $nextBlogUrl = '';
        $prevBlogUrl = '';

        if ($nextBlog) {
            $nextBlogUrl = route('blog.details', ['slug' => $nextBlog->slug]);
        }
        if ($prevBlog) {
            $prevBlogUrl = route('blog.details', ['slug' => $prevBlog->slug]);
        }
        $blogComments = $this->get_all_blog_comments($blog->id);
        return view('frontend.home.blog-details', compact('title', 'blog', 'latestBlogs', 'dates', 'categories', 'selectedCategory', 'selectedDate', 'currentUrl', 'nextBlogUrl', 'prevBlogUrl', 'blogComments'));
    }

    public function blogLike(Request $request)
    {
        $id = $request->id ?? '';
        $currentUrl = $request->currentUrl ?? '';
        $blog = Blog::find($id);
        if (!$blog) {
            return response()->json(['success' => 0, 'msg' => 'Blog not found']);
        }
        if (!auth()->check()) {
            if (!empty($currentUrl)) {
                session()->put('login_redirect', $currentUrl);
            }
            return response()->json(['success' => 0, 'msg' => 'Please login to like this post', 'open_auth_modal' => 1]);
        }
        $user = auth()->user();
        $like = BlogLike::where('user_id', $user->id)->where('blog_id', $blog->id)->first();
        if ($like) {
            $like->delete();
            return response()->json(['success' => 1, 'msg' => '', 'data' => ['count' => $blog->likes->count(), 'type' => 'unline']]);
        }
        BlogLike::insert([
            [
                'user_id' => $user->id,
                'blog_id' => $blog->id,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
        return response()->json(['success' => 1, 'msg' => '', 'data' => ['count' => $blog->likes->count(), 'type' => 'like']]);
    }

    public function comment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'parent_id' => ['nullable', 'exists:blog_comments,id'],
            'blog_id' => ['required', 'exists:blogs,id'],
            'name' => ['required'],
            'email' => ['required', 'email'],
            'comment' => ['required', 'max:500']
        ]);
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->keys() as $fieldKey) {
                $errors[$fieldKey] = $validator->errors()->first($fieldKey);
            }
            return response()->json(['success' => 0, 'errors' => $errors]);
        }

        $comment = new BlogComment();
        if (!empty($request->parent_id)) {
            $comment->parent_id = $request->parent_id;
        }
        $comment->blog_id = $request->blog_id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->save();
        session()->put('success', 'Comment posted successfully.');
        return response()->json(['success' => 1]);
    }

    public function get_all_blog_comments($blog_id)
    {
        $comments = $this->getAllComments($blog_id);
        $comment_html = "";
        $image = asset('assets/frontend/images/user_placeholder.png');
        if (count($comments) > 0) {
            $comment_html .= "<ol class='comments-list'>";
            foreach ($comments as $key => $value) {
                if (!empty($value->parent_id)) {
                    continue;
                }
                $cmntId = $value->id;
                $authorName = $value->name;
                $comment = $value->comment;
                $time = Carbon::parse($value->created_at)->diffForHumans();
                $comment_html .= "
				<li class='comment' id='comment-$cmntId' data-depth='1'> 
                    <article class='comment-body d-flex'>
                        <div class='left'>
                            <img src='$image' alt='$authorName'>
                        </div>
						<div class='right px-3 w-100'>
                            <div class='mb-1 d-flex justify-content-between align-items-center'>
                                <div>
								    <strong>$authorName</strong>
                                </div>
                                <span>" . $time . "</span>
                            </div>
                            <div>
                                <p>
                                $comment
                                </p>
                                <div class='reply mt-1 cmnt_reply' data-name='$authorName'  data-id='$cmntId'>
                                    <a href='javascript:void(0);' class='reply-btn' data-name='$authorName' data-id='$cmntId'>Reply</a>
                                </div>
                                <div class='reply-div'>
                                
                                </div>
                            </div>
                        </div>
                    </article>";
                // check is it a parent
                $check_is_it_parent = $this->check_is_it_parent($value->id, $comments);
                if ($check_is_it_parent) {
                    $comment_html .= $this->get_all_replies($value->id, $comments, $blog_id, 2);
                }
                // check is it a parent
                $comment_html .= "</li>";
            }
            $comment_html .= "</ol>";
        }
        return $comment_html;
    }

    public function check_is_it_parent($parent_id, $comments)
    {
        $id_array = [];
        foreach ($comments as $comment) {
            if (isset($comment->parent_id)) {
                $id_array[] = $comment->parent_id;
            }
        }
        return in_array($parent_id, $id_array);
    }

    public function get_all_replies($parent_id, $comments, $blog_id, $depth)
    {
        // $padding = ($depth < 4 ? '' : 'ps-0');
        $style = ($depth > 4 ? '' : 'padding-left: 50px');
        $html = "<ol class='comments-list' style='".$style."'>";
        $all_comments = $comments;
        $image = asset('assets/frontend/images/user_placeholder.png');
        $comments = $this->get_only_parent_id_object($parent_id, $comments);
        foreach ($comments as $key => $value) {
            $cmntId = $value->id;
            $authorName = $value->name;
            $comment = $value->comment;
            $parent_replyer_name = $value->parent->name;
            $time = Carbon::parse($value->created_at)->diffForHumans();;
            $html .= "
            <li id='comment-$cmntId' class='comment' data-depth='$depth'>
                <article class='comment-body d-flex' id='div-comment-$cmntId'>

                <div class='left'>
                    <img src='$image' alt='$authorName'>
                </div>
                <div class='right px-3 w-100'>
                    <div class='mb-1 d-flex justify-content-between align-items-center'>
                        <div>
                            <strong>$authorName</strong>
                            <span class='replyfor'><i class='fa-solid fa-share'></i>
                            $parent_replyer_name
                            </span>
                        </div>
                        <span>" . $time . "</span>
                    </div>
                    <div>
                        <p>
                            $comment
                        </p>
                        " . ($depth > 3 ? '<div class="mt-2"></div>' : '<div class="reply cmnt_reply reply mt-1"  data-name="' . $authorName . '"  data-id="' . $cmntId . '">
                            <a href="javascript:void(0);" class="reply-btn" data-name="' . $authorName . '"  data-id="' . $cmntId . '">Reply</a>
                        </div>') . "                       
                        <div class='reply-div'>
                        
                        </div> 
                    </div>
                </div>
            </article>
			";
            $check_is_it_parent = $this->check_is_it_parent($value['id'], $all_comments);
            if ($check_is_it_parent) {
                $new_depth = $depth + 1;
                $html .= $this->get_all_replies($value['id'], $all_comments, $blog_id, $new_depth);
            }
            $html .= "</li>";
        }
        $html .= "</ol>";
        return $html;
    }

    public function get_only_parent_id_object($parent_id, $comments)
    {
        return $comments->filter(function ($obj) use ($parent_id) {
            return $obj->parent_id == $parent_id;
        });
    }

    public function getAllComments($id)
    {
        return BlogComment::where('blog_id', $id)->where('status', 'approved')->orderBy('created_at', 'DESC')->get();
    }
}
