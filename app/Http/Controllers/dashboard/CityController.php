<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityRequest;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Governorate;
class CityController extends Controller
{

    public function index()
    {
        $records = City::paginate(20);
        return view('dashboard.cities.index',compact('records'));
    }

    public function create()
    {
        $governorates = Governorate::pluck('name', 'id')->toArray();

        return view('dashboard.cities.create', compact('governorates'));
    }

    public function store(CityRequest $request)
    {

        $this->validate($request, $rules, $message);
        $record = City::create($request->all());
        session()->flash('success' , __('site.added_successfully'));
        return redirect()->route('dashboard.cities.index');
    }


    public function edit(City $city)
    {
        $governorates = Governorate::pluck('name', 'id')->toArray();


        return view('dashboard.cities.edit',compact('governorates','city'));
    }


    public function update(Request $request, $id)
    {
        $record = City::findOrFail($id);

        $record->update($request->all());

        session()->flash('success' , __('site.updated_successfully'));

        return redirect()->route('dashboard.cities.index');
    }


public function destroy($id)
    {
        $record = City::find($id);

        $record->delete();

        session()->flash('success' , __('site.deleted_successfully'));

        return redirect()->route('dashboard.cities.index');

    }

}
