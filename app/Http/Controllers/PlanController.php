<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{

    public function index()
    {

	    return view('member.levels.index')->with(['plans' => Plan::get(), 'user' =>  Auth::user()]);

    }

    public function create()
    {
        // load the create form (app/views/plan/create.blade.php)
        return view('plan.create');
    }

    public function store(Request $request)
    {
        Plan::create($request->all());
	    return redirect()->route('plan.index');
    }


    public function show(Plan $plan)
    {
	    return view('member.levels.show')->with(['plan' => $plan]);

    }

    public function update(Request $request, $id)
    {
        $plans = Plan::findOrFail($id);
        $plans->fill($request->all());
        $plans->save();
        return view('plan.index');

    }

    public function destroy($id)
    {
        Plan::destroy($id);
		return view('plan.index');
    }
}
