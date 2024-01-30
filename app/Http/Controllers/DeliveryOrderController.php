<?php

namespace App\Http\Controllers;

use App\Models\DeliveryOrder;
use App\Models\Product;
use Illuminate\Http\Request;

class DeliveryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'asc')->get();
        return view('pages.deliveryOrder.index', compact('products'));
    }

    public function data()
    {
        $deliveryOrders = DeliveryOrder::with('details.product')->orderBy('created_at', 'desc')->get();
        return response()->json($deliveryOrders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::orderBy('created_at', 'asc')->get();
        return view('pages.deliveryOrder.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $deliveryOrder = DeliveryOrder::create([
            'number' => $request->number,
            'po_number' => $request->po_number,
            'date' => date('Y-m-d', strtotime($request->date)),
            'delivery_with' => $request->delivery_with,
            'police_number' => $request->police_number,
            'driver_name' => $request->driver_name,
        ]);

        $products = $request->input('produk');

        foreach ($products as $productData) {
            $product_id = $productData['product_id'];
            $quantity = $productData['quantity'];
            $packing_quantity = $productData['packing_quantity'];
            $description = $productData['description'];

            $deliveryOrder->details()->create([
                'delivery_order_id' => $deliveryOrder->id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'packing_quantity' => $packing_quantity,
                'description' => $description,
            ]);
        }

        return redirect()->route('delivery-order.index')->with('success', 'Surat jalan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $deliveryOrder = DeliveryOrder::with('details.product')->findOrFail($id);
        return response()->json($deliveryOrder);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $deliveryOrder = DeliveryOrder::with('details.product')->findOrFail($id);
        $products = Product::orderBy('created_at', 'asc')->get();
        return view('pages.deliveryOrder.edit', compact('deliveryOrder', 'products'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $deliveryOrder = DeliveryOrder::findOrFail($id);
        $deliveryOrder->update([
            'number' => $request->number,
            'po_number' => $request->po_number,
            'date' => date('Y-m-d', strtotime($request->date)),
            'delivery_with' => $request->delivery_with,
            'police_number' => $request->police_number,
            'driver_name' => $request->driver_name,
        ]);

        $products = $request->input('produk');

        foreach ($products as $productData) {
            $product_id = $productData['product_id'];
            $quantity = $productData['quantity'];
            $packing_quantity = $productData['packing_quantity'];
            $description = $productData['description'];

            $deliveryOrder->details()->update([
                'delivery_order_id' => $deliveryOrder->id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'packing_quantity' => $packing_quantity,
                'description' => $description,
            ]);
        }

        return redirect()->route('delivery-order.index')->with('success', 'Surat jalan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $deliveryOrder = DeliveryOrder::findOrFail($id);
        $deliveryOrder->delete();

        return redirect()->route('delivery-order.index')->with('success', 'Surat jalan berhasil dihapus');
    }
}
