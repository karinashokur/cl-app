<?php
namespace App\Http\Controllers;
use App\Tariff;
use Illuminate\Http\Request;
class TariffController extends Controller
{
    public function index()
    {
        $tariffs = Tariff::all();
        return response()->json($tariffs, 200);
    }
    public function store(Request $request)
    {
        $tariff = Tariff::create($request->all());
        return response()->json($tariff, 200);
    }
    public function show(Tariff $tariff)
    {
        return response()->json($tariff, 200);
    }
    public function edit(Tariff $tariff)
    {
        return response()->json($tariff, 200);
    }
    public function update(Request $request, Tariff $tariff)
    {
        $tariff->update($request->all());
        return response()->json($tariff, 200);
    }
    public function destroy(Tariff $tariff)
    {
        $tariff->delete();
        return response()->json(null, 204);
    }
}
