<?php

namespace App\Http\Controllers;

use App\Http\Requests\CakeVarianRequest;
use App\Services\CakeVarianService;
use App\Models\Cakes;
use App\Models\Varian;


class CakeVarianController extends Controller
{
    protected $cakeVarianService;

    public function __construct(CakeVarianService $cakeVarianService)
    {
        $this->cakeVarianService = $cakeVarianService;
    }

    public function index()
    {
        $cakevarians = $this->cakeVarianService->getAllCakeVarianPaginated(10);
        return view('cake-varian.index', compact('cakevarians'));
    }

    public function create()
    {
        $cakes = Cakes::all();
        $varians = Varian::all();
        return view('cake-varian.create', compact('cakes', 'varians'));
    }

    public function store(CakeVarianRequest $request)
    {
        $validatedData = $request->validated();

        $exists = $this->cakeVarianService->exists($validatedData['cake_id'], $validatedData['varian_id'], 0);

        if ($exists) {
            return redirect()->back()->withErrors(['varian_id' => 'This Cake Varian combination already exists']);
        }

        $this->cakeVarianService->createCakeVarian($validatedData);

        return redirect()->route('cake-varian.index')->with('success', 'Cake Varian added successfully!');
    }


    public function edit($id)
    {
        $cakevarians = $this->cakeVarianService->findCakeVarian($id);
        $cakes = Cakes::all();
        $varians = Varian::all();

        return view('cake-varian.edit', compact('cakevarians', 'cakes', 'varians'));
    }

    public function update(CakeVarianRequest $request, $id)
    {
        $validatedData = $request->validated();

        $exists = $this->cakeVarianService->exists($validatedData['cake_id'], $validatedData['varian_id'], $id);

        if ($exists) {
            return redirect()->back()->withErrors(['varian_id' => 'This Cake Varian combination already exists']);
        }

        $this->cakeVarianService->updateCakeVarian($id, $validatedData);

        return redirect()->route('cake-varian.index')->with('success', 'Cake Varian updated successfully!');
    }

    public function destroy($id)
    {
        $this->cakeVarianService->deleteCakeVarian($id);
        return redirect()->route('cake-varian.index')->with('success', 'Cake Varian deleted successfully!');
    }
}
