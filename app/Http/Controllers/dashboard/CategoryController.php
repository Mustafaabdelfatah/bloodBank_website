<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{

    public function index()
    {
        $records = Category::paginate(20);
        return view('dashboard.categories.index',compact('records'));
    }


    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $rules      = $this->getRules();
        $messages   = $this->getMessage();


        $this->validate($request,$rules,$messages);

        Category::create($request->all());

        session()->flash('success' , __('site.added_successfully'));

        return redirect()->route('dashboard.categories.index');

    }


    public function edit($id)
    {
        $model = Category::findOrFail($id);
        return view('dashboard.categories.edit',compact('model'));
    }


    public function update(Request $request, $id)
    {
        $record = Category::findOrFail($id);

        $record->update($request->all());

        session()->flash('success' , __('site.updated_successfully'));

        return redirect()->route('dashboard.categories.index');


    }


    public function destroy($id)
    {
        $record = Category::findOrFail($id);
        $record->delete();
        session()->flash('success' , __('site.deleted_successfully'));
        return redirect()->route('dashboard.categories.index');
    }
    protected function getRules()
    {
        return [
             'name'=> 'required'
        ];
    }
    protected function getMessage()
    {

        return [
            'category_name_en'              => trans('site.category_name_en'),

        ];
    }
}
