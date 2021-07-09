<?php
namespace App\Http\Controllers;
use App\Risk;
use Illuminate\Http\Request;
class RiskController extends Controller
{
    public function index()
    {
      $risks = Risk::all();
      return response()->json($risks, 200);
    }
    public function store(Request $request)
    {
      $risk = Risk::create($request->all());
      response()->json($risk, 200);
    }
    public function show(Risk $risk)
    {
        return response()->json($risk, 200);
    }
    public function edit(Risk $risk)
    {
        return response()->json($risk, 200);
    }
    public function update(Request $request, Risk $risk)
    {
      $risk->update($request->all());
      return response()->json($risk, 200);
    }
    public function destroy(Risk $risk)
    {
      $risk->delete();
      return response()->json(null, 204);
    }
}
