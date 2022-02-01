<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;

class SiteController extends Controller
{
    public function index(Plan $plan)
    {
        $plans = $plan->with('features')->get();
        return view('home.index', compact('plans'));
    }

    public function createSession(Plan $plan, $urlPlan)
    {
        if (!$plan =  $plan->where('url', $urlPlan)->first()) {

            return redirect()->route('site.home');
        }

        session()->put('plan', $plan);
        return redirect()->route('subscriptions.checkout');
    }
}
