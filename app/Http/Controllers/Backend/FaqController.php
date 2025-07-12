<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{
    public function index()
    {
        $title = 'FAQ';
        $links = [
            [
                'name' => $title
            ]
        ];
        $faq = Faq::orderBy('display_order', 'ASC')->get();
        return view('backend.faq.index', compact('title', 'links', 'faq'));
    }

    public function addEdit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['nullable', 'exists:faqs,id'],
            'question' => ['required'],
            'answer' => ['required']
        ]);
        if ($validator->fails()) {
            $errors = [];
            foreach ($validator->errors()->keys() as $fieldKey) {
                $errors[$fieldKey] = $validator->errors()->first($fieldKey);
            }
            return response()->json(['success' => 0, 'errors' => $errors]);
        }
        $faq = Faq::find($request->id);
        if (empty($request->id)) {
            $faq = new Faq();
            $faq->display_order = (int)(Faq::count()) + 1;
        }
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->save();
        session()->put('success', 'FAQ ' . (empty($request->id) ? 'added' : 'updated') . ' successfully.');
        return response()->json(['success' => 1, 'msg' => '']);
    }

    public function delete($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        return redirect()->back()->with('success', 'Faq deleted successfully.');
    }

    public function sort(Request $request)
    {
        $order = $request->order ?? [];
        foreach ($order as $key => $value) {
            $faq = Faq::find($value);
            $faq->display_order = $key + 1;
            $faq->save();
        }
        return response()->json(['success' => 1]);
    }

    public function get($id)
    {
        $faq = Faq::find($id);
        return response()->json(['success' => 1, 'data' => ['id' => $faq?->id ?? 0, 'question' => $faq?->question ?? '', 'answer' => $faq?->answer ?? '']]);
    }
}
