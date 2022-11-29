<?php

namespace App\Http\Controllers;

use App\Models\Kumeti_member_registration;
use App\Models\Recovery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RecoveryController extends Controller
{

    public function index()
    {
        $result['data'] = Recovery::leftJoin('kumeti_member_registrations', 'kumeti_member_registrations.id', '=', 'recoveries.kumeti_code')
        ->select('recoveries.*', 'kumeti_member_registrations.kumeti_code as kcd', )->get();


        return view('recovery', $result);
    }
    public function getkumeti_code(Request $request)
    {

        $id = $request->post('id');

        $result = DB::table('kumeti_member_registrations')->leftjoin('members_list', 'members_list.id', '=', 'kumeti_member_registrations.member_id')->where('kumeti_member_registrations.id', $id)->get();

        // $html = '<option value=" ">Select Member Name</option>';
        // foreach ($result as $list) {
        //     $html .= '<option value="' . $list->id . '" selected>' . $list->name . '</option>';
        // }
        // dd($result);
        return response()->json([$result]);
    }

    public function manage_recovery($id = '', Request $request)
    {

        if ($id > 0) {
            $arr = Recovery::where(['id' => $id])->get();
            $result['id'] = $arr[0]->id;
            $result['recovery_no'] = $arr['0']->recovery_no;
            $result['kumeti_code'] = $arr['0']->kumeti_code;
            $result['member_name'] = $arr['0']->member_name;
            $result['mobile'] = $arr['0']->mobile;
            $result['phone'] = $arr['0']->phone;
            $result['cnic'] = $arr['0']->cnic;
            $result['date'] = $arr['0']->date;

        } else {
            $result['id'] = '';
            $result['recovery_no'] = '';
            $result['kumeti_code'] = '';
            $result['member_name'] = '';
            $result['mobile'] = '';
            $result['phone'] = '';
            $result['cnic'] = '';
            $result['date'] = '';

        }
        $result['kumeti_member'] = Kumeti_member_registration::all();
                return view('manage_recovery', $result);
    }

    public function manage_recovery_process(Request $request)
    {
        if ($request->post('id') > 0) {

            $model = Recovery::find($request->post('id'));
            $message = "Update Recovery.";
        } else {

            $model = new Recovery();
            $message = "New Recovery Added.";

        }
        $message = "New Recovery Added.";

        $request->validate([
            'kumeti_code' => 'required',
            'cnic' => 'required|numeric',
            'recovery_no' => 'required',
        ]);

        $model->recovery_no = $request->post('recovery_no');
        $model->kumeti_code = $request->post('kumeti_code');;
        $model->member_name = $request->post('member_name');
        $model->mobile = $request->post('mobile');
        $model->phone = $request->post('phone');
        $model->cnic = $request->post('cnic');
        $model->date = $request->post('date');
        $model->save();
        $request->session()->flash('msg', $message);
        return redirect('recovery');
    }

    public function delete(Request $request, $id)
    {
        $model = recovery::find($id);
        $model->delete();
        $request->session()->flash('del', 'Recovery Data  Deleted.');
        return redirect('recovery');
    }

}
