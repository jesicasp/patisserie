<?php

namespace App\Http\Controllers;

use App\Http\Requests\CakesRequest;
use App\Services\CakesService;

class CakesController extends Controller
{
    protected $cakesService;

    public function __construct(CakesService $cakesService)
    {
        $this->cakesService = $cakesService;
    }
    
    public function index()
    {
        $cakes = $this->cakesService->getAllCakesPaginated(10);
        return view('cakes.index', compact('cakes'));
    }

    public function create()
    {
        return view('cakes.create');
    }

    public function store(CakesRequest $request)
    {
        $validatedData = $request->validated();

        $this->cakesService->createCake($validatedData, $request->file('image'));

        return redirect()->route('cakes.index')->with('success', 'Cake added successfully!');
    }

    public function edit($id)
    {
        $cake = $this->cakesService->findCake($id);
        return view('cakes.edit', compact('cake'));
    }

    public function update(CakesRequest $request, $id)
    {
        $validatedData = $request->validated();

        $this->cakesService->updateCake($id, $validatedData, $request->file('image'));

        return redirect()->route('cakes.index')->with('success', 'Cake updated successfully!');
    }

    public function destroy($id)
    {
        $this->cakesService->deleteCake($id);
        return redirect()->route('cakes.index')->with('success', 'Cake deleted successfully!');
    }
}
