<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\SubscriptionPlan;
use Illuminate\Http\Request;
use Stripe\Subscription;

use function PHPUnit\Framework\isNan;

class SubscriptionController extends Controller
{
    public function index()
    {
        $title = 'Subscriptions';
        $links = [
            [
                'name' => $title
            ]
        ];
        $subscriptions = SubscriptionPlan::orderBy('id', 'ASC')->get();
        return view('backend.subscriptions.index', compact('title', 'links', 'subscriptions'));
    }
    public function save(Request $request)
    {
        $error = [];
        //Validation
        $maxPrice = 0;
        $maxLimit = -1;
        foreach ($request->subscriptions as $key => $value) {
            foreach ($value as $k => $v) {
                if ($k == 'name') {
                    if (empty($v)) {
                        $error['name_' . $key] = 'This field is required';
                    }
                } else if ($k == 'price') {
                    if (blank($v)) {
                        $error['price_' . $key] = 'This field is required';
                        continue;
                    }
                    if (empty($v) || $v < 0) {
                        $error['price_' . $key] = 'Price should be more than 0';
                        continue;
                    }
                    if(!is_numeric($v)){
                        $error['price_' . $key] = 'Price should be a valid number';
                        continue;
                    }
                    if($v <= $maxPrice){
                        $error['price_' . $key] = 'This price should be more than it\'s previous one.';
                        continue;
                    }
                    $maxPrice = $v;
                } else if ($k == 'limit') {
                    if (blank($v)) {
                        $error['limit_' . $key] = 'This field is required';
                        continue;
                    }
                    if($v < 0){
                        $error['limit_' . $key] = 'The limit should not negetive number.';
                        continue;
                    }
                    if (!is_numeric($v)) {
                        $error['limit_' . $key] = 'Limit should be a valid number';
                        continue;
                    }
                    if ($v <= $maxLimit && $v > 0) {
                        $error['limit_' . $key] = 'This limit should be more than it\'s previous one.';
                        continue;
                    }
                    $maxLimit = $v;
                }
            }
        }

        if(!empty($error)){
            return response()->json(['success' => 0, 'errors' => $error]);
        }

        //Validation passed 
        foreach ($request->subscriptions as $key => $value) {
            $plan = SubscriptionPlan::find($key + 1);
            if($plan){
                $plan->name = $value['name'];
                $plan->price = $value['price'];
                $plan->limit = empty($value['limit']) ? 0 : $value['limit'];
                $plan->save();
            }
        }
        return response()->json(['success' => 1, 'msg' => 'Subscription plan updated successfully.']);
    }
}
