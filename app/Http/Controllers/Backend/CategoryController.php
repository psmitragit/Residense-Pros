<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $title = 'Categories';
        $search = 1;
        $links = [
            [
                'name' => 'Category'
            ]
        ];
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('backend.category.index', compact('title', 'search', 'links', 'categories'));
    }

    public function addEdit(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'id' => ['nullable', 'exists:categories,id'],
            'name' => ['required', 'unique:categories,name,' . ($request->id ?? 0)],
        ]);

        if ($validation->fails()) {
            return response()->json(['success' => 0, 'errors' => $validation->errors()->toArray()]);
        }

        if (empty($request->id)) {
            $category = new Category();
        } else {
            $category = Category::find($request->id);
        }
        $category->name = $request->name;
        $category->save();
        session()->put('success', 'Category ' . (empty($request->id) ? 'added' : 'updated') . ' successfully');
        return response()->json(['success' => 1, 'redirect' => route('admin.categories.index')]);
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully');
    }
}
