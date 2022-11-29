<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $result['data'] = City::all();
        return view('city', $result);
    }
    public function manage_city(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = City::where(['id' => $id])->get();
            $result['name'] = $arr['0']->name;
            $result['id'] = $arr['0']->id;

        } else {
            $result['name'] = '';
            $result['id'] = 0;

        }
        $result['city'] = City::all();
        return view('manage_city', $result);
    }
    public function manage_city_process(Request $request)
    {

        if ($request->post('id') > 0) {

            $model = City::find($request->post('id'));
            $message = "City is Updated.";

        } else {
            $model = new City();
            $message = "New City Added.";
        }
        $request->validate([
            'name' => 'required',
        ]);
        $model->name = $request->post('name');

        $model->save();
        $request->session()->flash('msg', $message);
        return redirect('city');
    }
    public function delete(Request $request, $id)
    {
        $model = City::find($id);
        $model->delete();
        $request->session()->flash('del', 'City  Deleted.');
        return redirect('city');
    }
}
