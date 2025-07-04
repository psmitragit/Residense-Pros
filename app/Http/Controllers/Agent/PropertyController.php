<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function published()
    {
        $title = 'Published Properties';
        $links = [
            [
                'name' => $title
            ]
        ];
        $properties = $this->getProperty('published');
        $type = 'published';
        $showAdd = true;
        $btnAction = ['view', 'archive', 'update'];
        return view('agent.property.list', compact('title', 'links', 'properties', 'type', 'showAdd', 'btnAction'));
    }
    public function drafted()
    {
        $title = 'Drafted Properties';
        $links = [
            [
                'name' => $title
            ]
        ];
        $type = 'draft';
        $properties = $this->getProperty('draft');
        $showAdd = true;
        $btnAction = ['view', 'archive', 'update'];
        return view('agent.property.list', compact('title', 'links', 'properties', 'type', 'showAdd', 'btnAction'));
    }
    public function pending()
    {
        $title = 'Pending Approval Properties';
        $links = [
            [
                'name' => $title
            ]
        ];
        $type = 'pending';
        $properties = $this->getProperty('pending');
        $showAdd = true;
        $btnAction = ['view', 'update'];
        return view('agent.property.list', compact('title', 'links', 'properties', 'type', 'showAdd', 'btnAction'));
    }
    public function archive()
    {
        $title = 'Archived Properties';
        $links = [
            [
                'name' => $title
            ]
        ];
        $properties = Property::where('created_by', auth()->id())->where('archive', 1)->get();
        $type = 'archive';
        $showAdd = false;
        $btnAction = ['unarchive'];
        return view('agent.property.list', compact('title', 'links', 'properties', 'type', 'showAdd', 'btnAction'));
    }

    public function getProperty($status)
    {
        return Property::where('created_by', auth()->id())->where('archive', 0)->where('status', $status)->get();
    }

    public function archiveProperty($id){
        $property = Property::where('created_by', auth()->id())->where('id', $id)->where('archive', 0)->firstOrFail();
        $property->archive = 1;
        $property->save();
        return redirect()->back()->with('success', 'Property archived successfully.');
    }
    public function unarchiveProperty($id){
        $property = Property::where('created_by', auth()->id())->where('id', $id)->where('archive', 1)->firstOrFail();
        $property->archive = 0;
        $property->save();
        return redirect()->back()->with('success', 'Property unarchived successfully.');
    }
}
