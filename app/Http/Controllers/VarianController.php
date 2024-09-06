<?php

namespace App\Http\Controllers;

use App\Http\Requests\VarianRequest;
use App\Services\VarianService;

class VarianController extends Controller
{
    protected $varianService;

    public function __construct(VarianService $varianService)
    {
        $this->varianService = $varianService;
    }
    
    public function index()
    {
        $varians = $this->varianService->getAllVarianPaginated(10);
        return view('varians.index', compact('varians'));
    }

    public function create()
    {
        return view('varians.create');
    }

    public function store(VarianRequest $request)
    {
        $validatedData = $request->validated();

        $this->varianService->createVarian($validatedData);

        return redirect()->route('varians.index')->with('success', 'Varian added successfully!');
    }

    public function edit($id)
    {
        $varian = $this->varianService->findVarian($id);
        return view('varians.edit', compact('varian'));
    }

    public function update(VarianRequest $request, $id)
    {
        $validatedData = $request->validated();

        $this->varianService->updateVarian($id, $validatedData);

        return redirect()->route('varians.index')->with('success', 'Varian updated successfully!');
    }

    public function destroy($id)
    {
        $this->varianService->deleteVarian($id);
        return redirect()->route('varians.index')->with('success', 'Varian deleted successfully!');
    }
}
