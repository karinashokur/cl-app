<?php
namespace App\Http\Controllers;
use App\Domain;
use Illuminate\Http\Request;
class DomainController extends Controller
{
    public function index()
    {
      $domains = Domain::all();
      return response()->json($domains, 200);
    }
    public function store(Request $request)
    {
      Domain::create($request->all());
      return response()->json('Domain was successfuly stored.', 200);
    }
    public function show(Domain $domain)
    {
        return response()->json($domain, 200);
    }
    public function edit(Domain $domain)
    {
        return response()->json($domain, 200);
    }
    public function update(Request $request, Domain $domain)
    {
      $domain->update($request->all());
      return response()->json('Domain was successfuly updated.', 200);
    }
    public function destroy(Domain $domain)
    {
      $domain->delete();
      return response()->json('Domain was successfuly deleted', 200);
    }
}
