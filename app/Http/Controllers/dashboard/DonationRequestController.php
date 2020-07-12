<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\DonRequest;
use App\Models\BloodType;
use App\Models\City;
use App\Models\Client;
use App\Models\DonationRequest;
use Illuminate\Http\Request;

class DonationRequestController extends Controller
{

    public function index()
    {
        $records = DonationRequest::paginate(20);
        return view('dashboard.donations.index', compact('records'));
    }


    public function create()
    {
        $bloodtypes = BloodType::pluck('name', 'id')->toArray();
        $cities = City::pluck('name', 'id')->toArray();
        $clients = Client::pluck('name', 'id')->toArray();
        return view('dashboard.donations.create', compact('bloodtypes', 'cities','clients'));
    }


    public function store(Request $request)
    {
        $rules = $this->getRules();
        $message=$this->getMessage();
        $this->validate($request, $rules, $message);
        $record = DonationRequest::create($request->all());
        session()->flash('success' , __('site.added_successfully'));
        return redirect()->route('dashboard.donations.index');

    }

    public function edit($id)
    {
        $bloodtypes = BloodType::pluck('name', 'id')->toArray();
        $cities = City::pluck('name', 'id')->toArray();
        $clients = Client::pluck('name', 'id')->toArray();
        $model = DonationRequest::findOrFail($id);
        return view('dashboard.donations.edit', compact('model', 'bloodtypes', 'cities','clients'));
    }


    public function update(Request $request, $id)
    {
        $record = DonationRequest::findOrFail($id);
        $record->update($request->all());
        session()->flash('success' , __('site.updated_successfully'));
        return redirect(route('dashboard.donations.index'));
    }


    public function destroy($id)
    {
        $record = DonationRequest::find($id);

        $record->delete();

        session()->flash('success' , __('site.deleted_successfully'));

        return redirect()->route('dashboard.donations.index');
    }

    protected function getRules()
    {
        return [
            'patient_name'=>'required',
            'patient_phone'=>'required',
            'patient_age'=>'required',
            'bags_num'=>'required',
            'hospital_name'=>'required',
            'hospital_address'=>'required',
            'details'=>'required',
            'blood_type_id'=>'required',
            'city_id'=>'required',
            'client_id'=>'required',
        ];
    }
    protected function getMessage()
    {

        return [
            'patient_name.required' => 'Name is required ',
            'patient_phone.required' => ' phone is required ',
            'patient_age.required' => 'age is required',
            'bags_num.required' => '  bags is required ',
            'hospital_name.required' => ' Hospital Name is required',
            'hospital_address.required' => ' Hospital Address is required',
            'details.required' => ' Details is required',
            'blood_type_id.required' => ' Blood Type is required',
            'city_id.required' => ' City is required',
            'client_id.required' => ' Client Name is required',

        ];
    }


}
