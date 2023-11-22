<?php

namespace App\Http\Controllers;

use App\Http\Resources\MedicineResource;
use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return MedicineResource::collection(
            Medicine::all()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:50|unique:medicines',
        ]);

        $medicine = Medicine::create($attributes);

        return MedicineResource::make($medicine);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Medicine $medicine)
    {
        $attributes = $request->validate([
            'name' => 'required|string|max:50|unique:medicines,name,' . $medicine->id,
        ]);

        $medicine->update($attributes);

        return MedicineResource::make($medicine);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        return response()->noContent();
    }
}
