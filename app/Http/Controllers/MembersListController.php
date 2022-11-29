<?php

namespace App\Http\Controllers;

use App\helpers\Helper;
use App\Models\City;
use App\Models\Garuanter;
use App\Models\Members_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Psy\debug;

class MembersListController extends Controller
{
    public function index()
    {
        $result['data'] = Members_list::all();
        return view('members_list', $result);
    }

    public function manage_members_list($id='',Request $request)
    {

        if ($id > 0) {
            $arr = Members_list::where(['id' => $id])->get();
            $result['id'] = $arr[0]->id;
            $result['member_code'] = $arr[0]->member_code;
            $result['name'] = $arr['0']->name;
            $result['father_name'] = $arr['0']->father_name;
            $result['email'] = $arr['0']->email;
            $result['mobile'] = $arr['0']->mobile;
            $result['phone'] = $arr['0']->phone;
            $result['cnic'] = $arr['0']->cnic;
            $result['city'] = $arr['0']->city;
            $result['area'] = $arr['0']->area;
            $result["member_gruntee"] = Garuanter::where(['member_id' => $id])->get();

        } else {

            $result['member_code'] = Helper::IDGenerator(new Members_list(),'member_code',5,'MCD');
            $result['name'] = '';
            $result['father_name'] = '';
            $result['email'] = '';
            $result['mobile'] = '';
            $result['phone'] = '';
            $result['cnic'] = '';
            $result['id'] = 0;
            $result['city'] = '';
            $result['area'] = '';

            $result['member_gruntee'][0]['id'] = 0;
            $result['member_gruntee'][0]['gname'] = '';
            $result['member_gruntee'][0]['gaddress'] = '';
            $result['member_gruntee'][0]['gcnic'] = '';
            $result['member_gruntee'][0]['gphone'] = '';


        }
        $result['city_list'] = City::all();
        return view('manage_members_list', $result);
    }

    public function manage_members_list_process(Request $request)
    {
        $member=$request->post('member_code');

        //$member_num=Helper::IDGenerator(new Members_list(),'member_code',5,'MCD',$member);

        if ($request->post('id') > 0) {

            $model = Members_list::find($request->post('id'));
            $message = "Member List is Updated.";
            $email = 'required|email';
            $model->member_code =$request->post('member_code');
        } else {

            $model = new Members_list();
            $model->member_code = $request->post('member_code');
            $message = "New Member List Added.";
            $email = 'required|email|unique:users,email';
            $mem= 'required|unique:members_list,member_code';
        }

        $request->validate([
            'name' => 'required',
            'email' => $email,
            'member_code' => 'required|unique:members_list,member_code,'. $request->post('id'),
            //'father_name' => 'required',
            // 'phone' => 'required|numeric|min:10',
            // 'mobile' => 'required|numeric|regex:/(03)[0-9]{9}/',
            //'cnic[0]' => 'required|numeric|digits:12',

        ]);

        $midArr = $request->post('mmd');

        $model->name = $request->post('name');
        $model->father_name = $request->post('father_name');
        $model->phone = $request->post('phone');
        $model->email = $request->post('email');
        $model->cnic = $request->post('cnic');
        $model->city = $request->post('city');
        $model->mobile = $request->post('mobile');
        $model->area = $request->post('area');
        $model->save();
        $mid = $model->id;

        $nameArr = $request->post('gname');
        $cnicArr = $request->post('gcnic');
        $addressArr = $request->post('gaddress');
        $phoneArr = $request->post('gphone');

        foreach ($midArr as $key=> $val) {
            $member_gruntee = [];
            $member_gruntee['member_id'] = $mid;
            $member_gruntee['gcnic'] = (int) $cnicArr[$key];
            $member_gruntee['gphone'] = (int) $phoneArr[$key];
            $member_gruntee['gaddress'] = $addressArr[$key];
            $member_gruntee['gname'] = $nameArr[$key];

            if ($midArr[$key] > 0) {
                DB::table('garuanters')->where(['id' => $midArr[$key]])->update($member_gruntee);
              } else {
                  DB::table('garuanters')->insert($member_gruntee);
                       }
        }
        $request->session()->flash('msg', $message);
        return redirect('members_list');
    }
    public function delete(Request $request, $id)
    {
        $model = Members_list::find($id);
        $model->delete();
        $request->session()->flash('del', 'Member_list  Deleted.');
        return redirect('members_list');
    }

    public function graunter_list_delete($id, $mid)
    {
        $model = Garuanter::find($id);
        $model->delete();
        return redirect('manage_members_list/' . $mid);

    }
}
