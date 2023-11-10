<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Models\Order;
use App\Http\Requests\StorePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('paymentMethod.index', ['paymentMethods'=>$paymentMethods]);
    }

    public function store(StorePaymentMethodRequest $request)
    {
        $paymentMethod = new PaymentMethod();
        $paymentMethod->name = $request->get('name');
        $paymentMethod->save();
        return redirect('/medios-de-pago');
    }

    public function update(UpdatePaymentMethodRequest $request, $id)
    {
        $paymentMethod = PaymentMethod::find($id);
        $paymentMethod->name = $request->name;
        $paymentMethod->save();
        return redirect('/medios-de-pago');
    }

    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        $paymentMethod->delete();
        return redirect('/medios-de-pago');
    }
}
