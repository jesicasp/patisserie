<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChefsRequest;
use App\Services\ChefsService;


class ChefsController extends Controller
{
    protected $chefService;

    public function __construct(ChefsService $chefsService)
    {
        $this->chefService = $chefsService;
    }
    
    public function index()
    {
        $chefs = $this->chefService->getAllChefPaginated(10);
        return view('chefs.index', compact('chefs'));
    }

    public function create()
    {
        return view('chefs.create');
    }

    public function store(ChefsRequest $request)
    {
        $validatedData = $request->validated();

        $this->chefService->createChef($validatedData);

        return redirect()->route('chefs.index')->with('success', 'Chef added successfully!');
    }

    public function edit($id)
    {
        $chef = $this->chefService->findChef($id);
        return view('chefs.edit', compact('chef'));
    }

    public function update(ChefsRequest $request, $id)
    {
        $validatedData = $request->validated();

        $this->chefService->updateChef($id, $validatedData);

        return redirect()->route('chefs.index')->with('success', 'Chef updated successfully!');
    }

    public function destroy($id)
    {
        $this->chefService->deleteChef($id);
        return redirect()->route('chefs.index')->with('success', 'Chef deleted successfully!');
    }
}
