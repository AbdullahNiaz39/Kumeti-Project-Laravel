<?php

namespace App\Http\Controllers;

use App\helpers\Helper;
use Illuminate\Http\Request;
use App\Models\Return_Kumeti;

class ReturnKumetiController extends Controller
{
    public function index()
    {
          $result['data']=Return_Kumeti::all();
        return view('return_kumeti',$result);
    }

    public function manage_return_kumeti($id = '', Request $request)
    {
        if ($id > 0) {
            $arr = return_kumeti::where(['id' => $id])->get();
            $result['id'] = $arr[0]->id;
            $result['return_number'] = $arr['0']->return_number;
            $result['kumeti_code'] = $arr['0']->kumeti_code;
            $result['member_name'] = $arr['0']->member_name;
            $result['mobile'] = $arr['0']->mobile;
            $result['email'] = $arr['0']->email;
            $result['phone'] = $arr['0']->phone;
            $result['cnic'] = $arr['0']->cnic;
            $result['city'] = $arr['0']->city;
            $result['area'] = $arr['0']->area;
            $result['kumeti_membership'] = $arr['0']->kumeti_membership;
            $result['monthly_installments'] = $arr['0']->monthly_installments;
            $result['total_collected_kumeties'] = $arr['0']->total_collected_kumeties;
            $result['total_amount'] = $arr['0']->total_amount;
            $result['return_amount'] = $arr['0']->return_amount;
        } else {
            $result['id'] = 0;
            $result['return_number'] = Helper::ReturnNumIDGenerator(new Return_Kumeti(),'return_number',5,'RN');;
            $result['kumeti_code'] = '';
            $result['member_name'] = '';
            $result['mobile'] ='';
            $result['email'] = '';
            $result['phone'] = '';
            $result['cnic'] = '';
            $result['city'] = '';
            $result['area'] = '';
            $result['kumeti_membership'] = '';
            $result['monthly_installments'] = '';
            $result['total_collected_kumeties'] = '';
            $result['total_amount'] ='';
            $result['return_amount'] ='';
        }
        return view('manage_return_kumeti', $result);
    }

    public function manage_return_kumeti_process(Request $request)
    {

        if ($request->post('id') > 0) {

            $model = Return_Kumeti::find($request->post('id'));
            $message = "Return kumeti Updated.";
        } else {
            $model = new Return_Kumeti();
            $message = "Return kumeti Added.";
        }

        $request->validate([
           // 'membership_code' => 'required',
            'cnic' => 'required|numeric',
            // 'total_collected_kumeties' => 'required',
            'email' => 'required',
            //'member_name' => 'required',
            //'phone' => 'required|numeric|min:10',
            //'mobile' => 'required|numeric|regex:/(03)[0-9]{9}/',
            //'return_number' => 'required',
            //'total_amount' => 'required',
            // 'return_amount' => 'required',
            //'address' => 'required',
        ]);
        $model->kumeti_code = $request->post('kumeti_code');
        $model->kumeti_membership = $request->post('kumeti_membership');
        $model->cnic = $request->post('cnic');
        $model->total_collected_kumeties = $request->post('total_collected_kumeties');
        $model->member_name = $request->post('member_name');
        $model->email = $request->post('email');
        $model->return_number = $request->post('return_number');
        $model->phone = $request->post('phone');
        $model->mobile = $request->post('mobile');
        $model->area = $request->post('area');
        $model->total_amount = $request->post('total_amount');
        $model->return_amount = $request->post('return_amount');
        $model->save();
        $request->session()->flash('msg', $message);
        return redirect('return_kumeti');
    }

    public function delete(Request $request, $id)
    {
        $model = Return_Kumeti::find($id);
        $model->delete();
        $request->session()->flash('del', 'Return Kumeti  Deleted.');
        return redirect('return_kumeti');
    }

}
