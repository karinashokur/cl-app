<?php
namespace App\Http\Controllers;
use App\Tariff;
use Illuminate\Http\Request;
class TariffController extends Controller
{
    public function index()
    {
      $tasks = Tariff::all();
      return view('tariff.index', compact('tariffs'));
    }
    public function store(Request $request)
    {
      Tariff::create($request->all());
      response()->json('Task was successfuly stored.')->header('Content-type', 'text/plain');
    }
    public function show(Tariff $tariff)
    {
    }
    public function edit(Tariff $tariff)
    {
    }
    public function update(Request $request, Tariff $tariff)
    {
      Tariff::create($request->all());
      response()->json('Tariff was successfuly stored.')->header('Content-type', 'text/plain');
    }
    public function destroy(Tariff $tariff)
    {
        $tariff->delete();
        return response()->json('Tariff was successfuly deleted.')
    }
}
