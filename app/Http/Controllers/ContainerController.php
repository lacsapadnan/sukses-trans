<?php

namespace App\Http\Controllers;

use App\Models\Container;
use Illuminate\Http\Request;

class ContainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.container.index');
    }

    public function data()
    {
        $containers = Container::orderBy('created_at', 'desc')->get();
        return response()->json($containers);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // format date
        $data['register_date'] = date('Y-m-d', strtotime($data['register_date']));
        $data['out_date'] = date('Y-m-d', strtotime($data['out_date']));
        Container::create($data);

        return redirect()->back()->with('success', 'Container berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $container = Container::findOrFail($id);
        return view('pages.container.edit', compact('container'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();
        // format date
        $data['register_date'] = date('Y-m-d', strtotime($data['register_date']));
        $data['out_date'] = date('Y-m-d', strtotime($data['out_date']));
        $container = Container::findOrFail($id);
        $container->update($data);

        return redirect()->route('container.index')->with('success', 'Container berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $container = Container::findOrFail($id);
        $container->delete();

        return redirect()->route('container.index')->with('success', 'Container berhasil dihapus.');
    }
}
