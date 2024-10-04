<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionFormRequest;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.options.index', [
            'options' => Option::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.options.form', [
            'option' => new Option()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionFormRequest $request)
    {
        Option::create($request->validated());
        return to_route('admin.option.index')->with('success', 'L\'option a été créé avec succès');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        return view('admin.options.form', [
            'option' => Option::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OptionFormRequest $request, Option $option)
    {
        $option->update($request->validated());
        return to_route('admin.option.index')->with('success', 'L\'option a été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return to_route('admin.option.index')->with('success', 'L\'option a été supprimé avec succès');
    }
}
