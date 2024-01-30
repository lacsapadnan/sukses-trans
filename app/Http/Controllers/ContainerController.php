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
        try {
            $container = Container::findOrFail($id);

            // Check if 'register_date' and 'out_date' are present in the request
            if ($request->has('register_date')) {
                $container->register_date = date('Y-m-d', strtotime($request->input('register_date')));
            }

            if ($request->has('out_date')) {
                $container->out_date = date('Y-m-d', strtotime($request->input('out_date')));
            }

            // Additional checks or modifications for other fields if needed

            $container->update();

            return redirect()->route('container.index')->with('success', 'Container berhasil diubah.');
        } catch (\Exception $e) {
            // Handle the exception, log it, or return an error response
            return redirect()->route('container.index')->with('error', 'Gagal mengubah container: ' . $e->getMessage());
        }
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

    public function uploadFile(Request $request)
    {
        $container = Container::find($request->id);

        if ($request->file('file')) {
            $image = $request->file('file');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('surat-jalan/');
            $image->move($destinationPath, $name);
            $container->file = $name;
            $container->update();
        }


        return redirect()->back()->with('success', 'Surat jalan berhasil diupload.');
    }
}
