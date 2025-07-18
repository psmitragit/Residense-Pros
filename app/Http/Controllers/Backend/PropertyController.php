<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $title = 'Active Properties';
        $links = [
            [
                'name' => $title
            ]
        ];
        $keyword = request()->keyword ?? '';
        $properties = Property::whereIn('status', ['published'])->where('archive',  '0')->orderBy('published_at', 'DESC');
        if(!blank($keyword)){
            $properties->where('name', 'like', '%'.$keyword.'%');
        }
        $properties = $properties->paginate(get_option('admin_perpage') ?? 10);
        $search = true;
        return view('backend.property.index', compact('properties', 'title', 'links', 'search'));
    }

    public function blocked()
    {
        $title = 'Blocked Properties';
        $links = [
            [
                'name' => $title
            ]
        ];
        $keyword = request()->keyword ?? '';
        $properties = Property::whereIn('status', ['blocked'])->orderBy('blocked_at', 'DESC');
        if (!blank($keyword)) {
            $properties->where('name', 'like', '%' . $keyword . '%');
        }
        $properties = $properties->paginate(get_option('admin_perpage') ?? 10);
        $search = true;
        return view('backend.property.blocked_listing', compact('properties', 'title', 'links', 'search'));
    }

    public function doBlock($id)
    {
        $property = Property::findOrFail($id);
        $property->status = 'blocked';
        $property->blocked_at = date('Y-m-d H:i:s');
        $property->save();
        return redirect()->back()->with('success', 'Property blocked successfully');
    }
    public function doUnBlock($id)
    {
        $property = Property::findOrFail($id);
        $property->status = 'published';
        $property->blocked_at = NULL;
        $property->save();
        return redirect()->back()->with('success', 'Property unblocked successfully');
    }
}
