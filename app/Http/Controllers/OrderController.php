<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Table;
use App\Models\Product;
use App\Models\Category;
use App\Models\PaymentMethod;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
//Admin actions
    public function index()
    {
        $orders = Order::all();
        return view('order.index', ['orders'=>$orders]);
    }

    public function detail($id)
    {
        $order = Order::find($id);
        foreach($order->products as $product)
        {
            $count = ($product->price * $product->pivot->quanty);
            $result = $product->pivot->subtotal = $count;
            $order->total = $result;
            $order->save();
        }        
        return view('order.detail', ['order'=>$order]);
    }

    public function changeStatus(UpdateOrderRequest $request, $id)
    {
        $order = Order::find($id);
        if ($request->status == 'ENTREGADA')
        {
            $order->status = $request->status;
            $order->table->save();
        }
        elseif ($request->status == 'ANULADA')
        {
            $order->status = $request->status;
            $order->table->status = 'LIBRE';
            $order->table->save();
        }
        elseif ($request->status == 'CERRADA')
        {
            $order->status = $request->status;
            $order->table->status = 'LIBRE';
            $order->table->save();
        }
        else
        {
            $order->status = $request->status;
            $order->table->status = 'OCUPADA';
            $order->table->save();
        }
        $order->save();
        return redirect(route('detailOrder', $order->id));
    }
//Front actions

    public function store(StoreOrderRequest $request, $tableId)
    {
        $order = new Order();
        $order->table_id = $tableId;
        $table = Table::find($tableId);
        $order->restaurant_id = $table->restaurant_id;
        $order->user_id = Auth::id();
        $payment_method = PaymentMethod::find(3);
        $payment_method_id = $payment_method->id;
        $order->payment_method_id = $payment_method_id;
        $table = Table::find($tableId);
        $table->status = 'OCUPADA';
        $table->save();
        $order->save();
        return redirect(route('attendTable', $tableId));
    }

    public function show($id)
    {
        $order = Order::find($id);
        $products = Product::all();
        return view('order.show', ['order'=>$order, 'products'=>$products]);
    } 

    public function addProduct(Request $request, $id)
    {
        $order = Order::find($id);
        $productId = $request->get('product_id');
        $quanty = $request->get('quanty');
        $order->products()->attach($productId, ['quanty'=>$quanty]);
        $product = Product::find($productId);
        $product->stock = $product->stock - $quanty;
        $product->save();
        return redirect(route('showOrder', $id));
    }

    //relId = Relationship Id (Pivot)

    public function removeProduct(Request $request, $id, $relId)
    {
        $order = Order::find($id);
        $products = $order->products()->wherePivot('id', $relId)->detach();
        return redirect(route('showOrder', $id));
    }

//Change Status of Order

    public function cancel($id)
    {
        $order = Order::find($id);
        $table = $order->table->id;
        $order->status = 'ANULADA';
        $table->status = 'LIBRE';
        $order->save();
        $table->save();
        return redirect('/home');
    }

    public function deliver($id)
    {
        $order = Order::find($id);
        $tableId = $order->table->id;
        $order->status = 'ENTREGADA';
        $order->save();
        return redirect('/home');
    }

    public function requested($id)
    {
        $order = Order::find($id);
        $order->status = 'ENVIADA';
        $tableId = $order->table->id;
        $table = Table::find($tableId);
        $table->status = 'OCUPADA';
        $order->save();
        return redirect('/home');
    }

    public function prepared($id)
    {
        $order = Order::find($id);
        $order->status = 'PREPARADA';
        $order->save();
        return redirect('/cocina');
    }

    public function close($id)
    {
        $order = Order::find($id);
        $order->status = 'CERRADA';
        $order->table->status = 'LIBRE';
        $order->table->save();
        $order->save();
        return redirect('/home');
    }

    public function chargeOrder(Request $request, $id)
    {
        $order = Order::find($id);
        $order->charged = true;
        $payment_method_id = $request->get('payment_method');
        $order->payment_method_id = $payment_method_id;
        $order->save();
        return redirect('/cocina');
    }
}
