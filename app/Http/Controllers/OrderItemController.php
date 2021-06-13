<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order=Order::where('user_id',Auth::id())->where('order_status','cart')->first();
        $order_id=session('order_id',0);
        if($order_id<1)
        {
            $order = new Order;
            $order->user_id=Auth::id();
            $order->order_status='cart';
            $order->sub_total=0;
            $order->discount=0;
            $order->total_price=0;
            $order->shipping_address=' ';
            $order->save();
            // session(['order_id'=>$order->id]);
            $order_id=$order->id;
        }else{
            
        }
       
        $order_items=new OrderItem;
        $order_items->order_id=$order_id;
        $order_items->product_id=$request->input('product_id');
        $products=Product::find($order_items->product_id);
        $order_items->product_price=$products->price;
        $order_items->quantity=$request->input('quantity');
        $order_items->total=$order_items->quantity*$order_items->product_price;
        $order_items->save();
        //updating order atble with total price
        $order=Order::find($order_id);
        $order->sub_total+=$order_items->total;
        $order->total_price=$order->sub_total-$order->discount;
        $order->save();
        return redirect(route('order'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderItem $orderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = OrderItem::find($id);

        $item->order->sub_total -=$item->total;
        $item->order->total_price -=$item->total; 
        $item->order->save();
        $item->delete();
        return redirect()->route('order.index');
    }
}
