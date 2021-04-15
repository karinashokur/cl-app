<?php
namespace App\Http\Controllers;
use App\Risk;
use Illuminate\Http\Request;
class RiskController extends Controller
{
    public function index()
    {
      $risks = Risk::all();
      return view('risk.index', compact('risks'));
    }
    public function store(RiskRequest $request)
    {
      Risk::create($request->all());
      response()->json('Risk was successfuly stored.', 200);
    }
    public function show(Risk $risk)
    {
        return view('risk.index', compact('risk'));
    }
    public function edit(Risk $risk)
    {
        return view('risk.index', compact('risk'));
    }
    public function update(Request $request, Risk $risk)
    {
      $request->update($request->all());
      return response()->json('Risk was successfuly updated.', 200);
    }
    public function destroy(Risk $risk)
    {
      $risk->delete();
      return response()->json('Risk was successfuly deleted.', 200);
    }
}
