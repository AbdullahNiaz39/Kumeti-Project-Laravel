<?php

namespace App\Http\Controllers;

use App\Models\Kumeti_defination;
use Illuminate\Http\Request;

class KumetiDefinationController extends Controller
{
    public function index()
    {
        $result['data'] = Kumeti_defination::all();
        return view('kumeti_defination', $result);
    }
    public function manage_kumeti_defination(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Kumeti_defination::where(['id' => $id])->get();
            $result['id'] = $arr[0]->id;
            $result['title'] = $arr['0']->title;
            $result['type'] = $arr['0']->type;
            $result['monthly_installments'] = $arr['0']->monthly_installments;
            $result['total_kumeti'] = $arr['0']->total_kumeti;
            $result['period'] = $arr[0]->period;
            $result['members'] = $arr[0]->members;

        } else {
            $result['title'] = '';
            $result['monthly_installments'] = '';
            $result['total_kumeti'] = '';
            $result['period'] = '';
            $result['type'] = '';
            $result['members'] = '';
            $result['id'] = 0;

        }
        return view('manage_kumeti_defination', $result);
    }

    public function manage_kumeti_defination_process(Request $request)
    {

        if ($request->post('id') > 0) {
            $model = Kumeti_defination::find($request->post('id'));
            $message = "Kumeti defination Detail is Updated.";
        } else {

            $model = new Kumeti_defination();
            $message = "New Kumeti_defination Added.";

        }
        $request->validate([
            'title' => 'required',
            'monthly_installments' => 'required|numeric',
            'total_kumeti' => 'required|numeric',
            'period' => 'required',
            'members' => 'required',
        ]);
        $model->title = $request->post('title');
        $model->monthly_installments = $request->post('monthly_installments');
        $model->total_kumeti = $request->post('total_kumeti');
        $model->period = $request->post('period');
        $model->type = $request->post('type');
        $model->members = $request->post('members');
        $model->save();
        $request->session()->flash('msg', $message);
        return redirect('kumeti_defination');
    }
    public function delete(Request $request, $id)
    {
        $model = Kumeti_defination::find($id);
        $model->delete();
        $request->session()->flash('del', 'Kumeti Defination  Deleted.');
        return redirect('kumeti_defination');
    }
}
