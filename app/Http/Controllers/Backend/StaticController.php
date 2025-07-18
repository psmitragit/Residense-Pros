<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function index()
    {
        $title = 'Static Pages';
        $links = [
            [
                'name' => $title
            ]
        ];
        $pages = StaticPage::orderBy('id', 'ASC')->get();
        return view('backend.static.index', compact('pages', 'title'));
    }

    public function edit($id)
    {
        $page = StaticPage::find($id);
        if (!$page) {
            return response()->json(['success' => 0, 'msg' => 'Page Not Found.']);
        }
        return response()->json(['success' => 1, 'data' => ['id' => $page->id, 'content' => $page->content]]);
    }

    public function update(Request $request)
    {
        if (empty($request->content)) {
            return response()->json(['success' => 0, 'errors' => ['content' => 'This field is required.']]);
        }
        $id = $request->id ?? '';
        $page = StaticPage::find($id);
        if (!$page) {
            return response()->json(['success' => 0, 'msg' => 'Page Not Found.']);
        }
        $page->content = $request->content ?? '';
        $page->save();
        return response()->json(['success' => 1]);
    }
}
