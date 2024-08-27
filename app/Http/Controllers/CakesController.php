<?php

namespace App\Http\Controllers;

use App\Http\Requests\CakesRequest;
use App\Models\Cakes;
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

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $validatedData['image'] = $imagePath;
    }

    $this->cakesService->createCake($validatedData);

    return redirect()->route('cakes.index')->with('success', 'Cake added successfully!');
}


    public function edit($id)
    {
        $cake = $this->cakesService->findCake($id);
        return view('cakes.edit', compact('cake'));
    }

    public function update(CakesRequest $request, $id)
    {
        $cake = Cakes::findOrFail($id);
        $validatedData = $request->validated();

        if ($request->hasFile('image')) {
            if ($cake->image) {
                $oldImagePath = storage_path('app/public/' . $cake->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
                $validatedData['image'] = $request->file('image')->store('images', 'public');
            } else {
            $validatedData['image'] = $cake->image;
        }

        $this->cakesService->updateCake($id, $validatedData);

        return redirect()->route('cakes.index')->with('success', 'Cake updated successfully!');
    }

    public function destroy($id)
    {
        $this->cakesService->deleteCake($id);
        return redirect()->route('cakes.index')->with('success', 'Cake deleted successfully!');
    }
}
