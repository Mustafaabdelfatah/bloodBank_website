<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){

        $records = Contact::all();
        return view('dashboard.contacts.index',compact('records'));

    }
    public function destroy($id){

        $record = Contact::findOrFail($id);
        $record->delete();
        session()->flash('success' , __('site.deleted_successfully'));
        return back();

    }
}
