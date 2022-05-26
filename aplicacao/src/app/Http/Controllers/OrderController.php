<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function report()
    {
        $orders = Order::all();

        $orderData = [];

        foreach ($orders as $order) {

            $rental_value = 0;
            $purchase_value = 0;

            foreach ($order->items as $order_item) {
                
                $rental = $order_item->rental ?? null;
                $purchase = $order_item->purchase ?? null;

                if ($rental) {
                    $_rental_value = $order_item->game->day_rental_value;
                    $rental_value += ($_rental_value * $rental->days_of_rent);
                }

                if ($purchase) {
                    $_purchase_value = $order_item->game->value;
                    if ($purchase->discount) $_purchase_value = ($_purchase_value * ($purchase->discount/100)); 
                    $purchase_value += $_purchase_value;
                }
            }

            $orderData[] = [
                'order_id' => $order->id,
                'items_quantity' => $order->items()->count(),
                'rental_value' => $rental_value,
                'purchase_value' => $purchase_value,
            ];
        }

        return $orderData;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::query();

        $customer_id_filter = request()->get('customer_id');

        if ($customer_id_filter) $orders = $orders->where('customer_id', $customer_id_filter);

        return $orders->with(['customer'])->get(); 
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
        return Order::create($request->get('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return $order->load(['items.game', 'items.purchase', 'items.rental']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        return $order->update($request->get('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        return $order->delete();
    }
}
