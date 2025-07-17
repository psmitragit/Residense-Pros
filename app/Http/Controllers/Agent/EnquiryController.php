<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\EnqueryHistory;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiries = EnqueryHistory::where('user_id', auth()->id())->orderBy('created_at', 'DESC')->paginate(get_option('frontend_perpage'));
        return view('agent.enquiry.index', compact('enquiries'));
    }
}
