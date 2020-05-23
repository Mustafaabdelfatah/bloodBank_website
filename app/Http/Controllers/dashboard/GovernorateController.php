<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\GovernorateRequest;
use Illuminate\Http\Request;
use App\Models\Governorate;
class GovernorateController extends Controller
{

    public function index()
    {
        $records = Governorate::paginate(20);
        return view('dashboard.governorate.index',compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.governorate.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GovernorateRequest $request)
    {



        $this->validate($request,$rules,$messages);

        Governorate::create($request->all());

        session()->flash('success' , __('site.added_successfully'));

        return redirect()->route('dashboard.governorates.index');
    }

    public function show($id)
    {

    }


    public function edit($id)
    {
        $model = Governorate::findOrFail($id);
        return view('dashboard.governorate.edit',compact('model'));
    }


    public function update(Request $request, $id)
    {
        $record = Governorate::findOrFail($id);

        $record->update($request->all());

        session()->flash('success' , __('site.updated_successfully'));

        return redirect()->route('dashboard.governorates.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record = Governorate::findOrFail($id);
        $record->delete();
        session()->flash('success' , __('site.deleted_successfully'));
        return redirect()->route('dashboard.governorates.index');
    }
}
