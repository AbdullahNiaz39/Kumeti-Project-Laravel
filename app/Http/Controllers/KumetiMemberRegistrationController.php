<?php

namespace App\Http\Controllers;

use App\helpers\Helper;
use App\Models\Kumeti_defination;
use App\Models\Kumeti_member_registration;
use App\Models\Members_list;
use Illuminate\Http\Request;

class KumetiMemberRegistrationController extends Controller
{

    public function index()
    {
        $result['data'] = Kumeti_member_registration::leftJoin('members_list', 'members_list.id', '=', 'kumeti_member_registrations.member_name')->leftJoin('kumeti_definations', 'kumeti_definations.id', '=', 'kumeti_member_registrations.kumeti_membership')
            ->select('kumeti_member_registrations.*', 'members_list.name', 'kumeti_definations.title',)->get();

        return view('kumeti_member_registration', $result);
    }

    public function manage_kumeti_member_registration($id = '', Request $request)
    {
        if ($id > 0) {
            $arr = Kumeti_member_registration::where(['id' => $id])->get();
            $result['id'] = $arr[0]->id;
            $result['member_id'] = $arr[0]->member_id;
            $result['member_code'] = $arr['0']->member_code;
            $result['kumeti_code'] = $arr['0']->kumeti_code;
            $result['member_name'] = $arr['0']->member_name;
            $result['mobile'] = $arr['0']->mobile;
            $result['kumeti_membership'] = $arr['0']->kumeti_membership;
            $result['monthly_installments'] = $arr['0']->monthly_installments;
            $result['total_kumeti'] = $arr['0']->total_kumeti;
            $result['period'] = $arr['0']->period;
            $result['members'] = $arr['0']->members;
            $result['start_date'] = $arr['0']->start_date;
            $result['end_date'] = $arr['0']->end_date;
        } else {
            $result['id'] = 0;
            $result['member_code'] = '';
            $result['kumeti_code'] = Helper::KIDGenerator(new Kumeti_member_registration(), 'kumeti_code', 5, 'KCD');
            $result['member_name'] = '';
            $result['member_id'] = '';
            $result['mobile'] = '';
            $result['kumeti_membership'] = '';
            $result['monthly_installments'] = '';
            $result['total_kumeti'] = '';
            $result['period'] = '';
            $result['members'] = '';
            $result['start_date'] = '';
            $result['end_date'] = '';
        }
        $result['kumeti_definations'] = Kumeti_defination::all();
        $result['members_list'] = Members_list::all();
        return view('manage_kumeti_member_registration', $result);
    }

    ////
    public function getkumeti(Request $request)
    {
        $id = $request->post('id');
        $result = Kumeti_defination::find($id);
        //  $html = '<input type="text" name="total_kumeti" id="total_kumeti" value="">';
        // $result = Kumeti_defination::find($id);
        // // return view('kumeti_member_registration', $result);
        return response()->json($result);
    }
    public function member_detail(Request $request)
    {
        $member_code = $request->post('member_code');
        $result = Members_list::where(['member_code' => $member_code])->get();
        return response()->json($result);
    }
    //

    public function manage_kumeti_member_registration_process(Request $request)
    {

        if ($request->post('id') > 0) {
            $model = Kumeti_member_registration::find($request->post('id'));
            $message = "New Kumeti Member Registration List Updated.";
            //$email = 'required|email';
            // $model->member_code =$request->post('member_code');
        } else {

            $model = new Kumeti_member_registration();
            //$model->member_code = $request->post('member_code');
            $message = "New Kumeti Member Registration List Added.";
            //$email = 'required|email|unique:users,email';
            // $mem= 'required|unique:members_list,member_code';
        }
        //$email = 'required|email|unique:users,email';
        $request->validate([
            'kumeti_code' => 'required|unique:kumeti_member_registrations,kumeti_code,' . $request->post('id'),
            //          'kumeti_code' => 'required|unique:kumeti_member_registrations,kumeti_code',
            //            'member_code' => 'required|unique:kumeti_member_registrations,member_code',
            // 'member_name' => 'required',
            //'kumeti_membership' => 'required',
            // 'mobile' => 'required|numeric|regex:/(03)[0-9]{9}/',
            //'monthly_installment' => 'required|numeric',
            //'total_kumeti' => 'required',
            //'period' => 'required|numeric',
            // 'members' => 'required|numeric',
            //'start_date' => 'required',
            // 'end_date' => 'required',

        ]);
        $model->kumeti_code = $request->post('kumeti_code');
        $model->member_id = $request->post('member_id');
        $model->member_code = $request->post('member_code');
        $model->member_name = $request->post('member_name');
        $model->kumeti_membership = $request->post('kumeti_membership');
        $model->monthly_installments = $request->post('monthly_installments');
        $model->total_kumeti = $request->post('total_kumeti');
        $model->mobile = $request->post('mobile');
        $model->period = $request->post('period');
        $model->members = $request->post('members');
        $model->start_date = $request->post('start_date');
        $effectiveDate = date('Y-m-d', strtotime("+" . $request->post('period') . " months", strtotime($request->post("start_date"))));
        $model->end_date = $effectiveDate;

        $model->save();

        $request->session()->flash('msg', $message);
        return redirect('kumeti_member_registration');
    }

    public function delete(Request $request, $id)
    {
        $model = Kumeti_member_registration::find($id);
        $model->delete();
        $request->session()->flash('del', 'Kumeti Member Registration  Deleted.');
        return redirect('kumeti_member_registration');
    }
}
