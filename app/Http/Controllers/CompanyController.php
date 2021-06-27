<?php
namespace App\Http\Controllers;
use App\Company;
use Illuminate\Http\Request;
class CompanyController extends Controller
{
    public function index()
    {
      $companies = Company::all();
      return response()->json($companies, 200);
    }
    public function store(Request $request)
    {
      Company::create($request->all());
      return response()->json('Company was successfuly stored.', 200);
    }
    public function show(Company $company)
    {
        return response()->json($company, 200);
    }
    public function edit(Company $company)
    {
        return response()->json($company, 200);
    }
    public function update(Request $request, Company $company)
    {
      $company->update($request->all());
      return response()->json('Company was successfuly updated.', 200);
    }
    public function destroy(Company $company)
    {
      $company->delete();
      return response()->json('Company was successfuly deleted', 200);
    }
}
