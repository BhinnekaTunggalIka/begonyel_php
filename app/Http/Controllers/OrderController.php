<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        return view('order.index', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate(
            [
                'invoice' => 'required|min:5',
                'customer_name' => 'required|min:3',
                'total' => 'required|min:1',
                'status_order' => 'required',
            ],
            [
                'invoice' => 'Jangan lupa masukin nomor invoice nya yaa..',
                'customer_name' => 'Jangan lupa masukin nama customer nya yaa..',
                'total' => 'masukin total..',
                'status_order' => 'statusnya gimana?',
            ]
        );
        $order = Order::create([
            'invoice' => $request->invoice,
            'customer_name' => $request->customer_name,
            'total' => $request->total,
            'status_order' => $request->status_order
        ]);
        return redirect('/master-data/order')->with('status', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        // return view('order/detailorder', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('order/edit', compact('order'));
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
        // return $request;
        $request->validate(
            [
                'invoice' => 'required|min:5',
                'customer_name' => 'required|min:3',
                'total' => 'required|min:1',
                'status_order' => 'required',
            ],
            [
                'invoice' => 'Jangan lupa masukin nomor invoice nya yaa..',
                'customer_name' => 'Jangan lupa masukin nama customer nya yaa..',
                'total' => 'masukin total..',
                'status_order' => 'statusnya gimana?',
            ]
        );
        Order::where('id', $order->id)->update([
            'invoice' => $request->invoice,
            'customer_name' => $request->customer_name,
            'total' => $request->total,
            'status_order' => $request->status_order
        ]);
        return redirect('/master-data/order')->with('status', 'Data Berhasil Ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        Order::destroy($order->id);
        return redirect('/master-data/order')->with('delete', 'data berhasil dihapus');
    }
}
