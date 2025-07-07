<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AgentSubscription;
use App\Models\Property;
use App\Models\SubscriptionPayment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    public function index()
    {
        $title = 'Agents';
        $links = [
            [
                'name' => $title
            ]
        ];
        $keyword = request()->keyword ?? '';
        $agents = User::where('role', 'agent')->orderBy('created_at', 'DESC');
        if (!blank($keyword)) {
            $agents->where(DB::raw('CONCAT(first_name, " ", last_name)'), 'like', '%' . $keyword . '%');
        }
        $agents = $agents->paginate(get_option('admin_perpage'));
        $search = true;
        return view('backend.agents.index', compact('agents', 'title', 'links', 'search'));
    }

    public function purchaseHistory($id)
    {
        $user = User::findOrFail($id);
        $title = $user->name . ' Purchase History';
        $links = [
            [
                'url' => route('admin.agent.index'),
                'name' => 'Agents'
            ],
            [
                'name' => $title
            ]
        ];
        $purchased = SubscriptionPayment::where('user_id', $user->id)->where('payment_status', 'success')->orderBy('payment_completed', 'DESC')->paginate(get_option('admin_perpage'));
        return view('backend.agents.purchase', compact('user', 'title', 'links', 'purchased'));
    }
}
