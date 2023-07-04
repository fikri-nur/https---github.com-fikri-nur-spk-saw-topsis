<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Http\Requests\StoreAlternativeRequest;
use App\Http\Requests\UpdateAlternativeRequest;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatives = Alternative::paginate(10);

        return view('alternatif.index', compact('alternatives'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alternatif.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlternativeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        Alternative::create($request->all());

        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function show(Alternative $alternative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternative = Alternative::find($id);
        return view('alternatif.edit', compact('alternative'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlternativeRequest  $request
     * @param  \App\Models\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alternative = Alternative::findOrFail($id);

        $request->validate([
            'code' => 'required',
            'name' => 'required',
        ]);

        $alternative->update($request->all());

        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil diupdate.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alternative  $alternative
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alternative = Alternative::findOrFail($id);

        $alternative->delete();

        return redirect()->route('alternatif.index')->with('success', 'Alternatif berhasil dihapus.');

    }
}
