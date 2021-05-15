<?php
namespace App\Http\Controllers;
use App\Domain;
use Illuminate\Http\Request;
class DomainController extends Controller
{
    public function index()
    {
    }
    public function create()
    {
    }
    public function store(Request $request)
    {
    }
    public function show(Domain $domain)
    {
    }
    public function edit(Domain $domain)
    {
    }
    public function update(Request $request, Domain $domain)
    {
    }
    public function destroy(Domain $domain)
    {
      $domain->delete();
      return response()->json('Project was successfuly deleted', 200);
    }
}
