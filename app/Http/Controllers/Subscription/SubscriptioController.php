<?php

namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnSelf;

class SubscriptioController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {

        return view('subscriptions.index', [
            'intent' => auth()->user()->createSetupIntent(),
        ]);
    }

    public function store(Request $request)
    {
        $request->user()->newSubscription('default', 'price_1KJGPjDK26XkRLHdK3W9n9oV')
            ->create($request->token);

        return redirect()->route('subscriptions.premium');
    }

    public function premium()
    {

        return view('subscriptions.premium');
    }

    public function account()
    {
        $invoices = auth()->user()->invoices();

        return view('subscriptions.account', compact('invoices'));
    }

    public function downloadInvoice($invoiceId){
       return Auth::user()
       ->downloadInvoice($invoiceId,[
        'vendor' => config('app.name'),
        'product' => 'Assinatura VIP'
    ]);
       
    }

    public function cancel()
    {
         auth()->user()->subscription('default')->cancel();

        return redirect()->route('subscriptions.account');
    }

    public function resume()
    {
         auth()->user()->subscription('default')->resume();

        return redirect()->route('subscriptions.account');
    }
    
    
}


