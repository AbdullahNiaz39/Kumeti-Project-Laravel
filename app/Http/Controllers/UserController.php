<?php

namespace App\Http\Controllers;

use App\Models\Members_list;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function users()
    {
        $result['data'] = User::all();
        return view('users', $result);
    }
    public function manage_users(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = User::where(['id' => $id])->get();
            $result['name'] = $arr['0']->name;

            $result['id'] = $arr[0]->id;
            $result['password'] = $arr['0']->password;
            $result['email'] = $arr['0']->email;
            $result['mobile'] = $arr['0']->mobile;
            $result['phone'] = $arr['0']->phone;
            $result['address'] = $arr['0']->address;

        } else {
            $result['name'] = '';
            $result['password'] = '';
            $result['email'] = '';
            $result['mobile'] = '';
            $result['phone'] = '';
            $result['address'] = '';
            $result['id'] = 0;

        }
        $result['members_list'] = Members_list::all();
        return view('manage_users', $result);
    }
    public function manage_users_process(Request $request)
    {

        if ($request->post('id') > 0) {

            $model = User::find($request->post('id'));
            $message = "User Detail is Updated.";
            $email = 'required';
        } else {

            $model = new User();
            $message = "New User Added.";
            $email = 'required|unique:users,email';
        }
        $request->validate([
            'name' => 'required',
            'email' => $email,
            'password' => 'required|min:4',
            //'phone' => 'numeric|min:10',
            //'mobile' => 'numeric|regex:/(03)[0-9]{9}/',

        ]);
        $model->name = $request->post('name');
        $model->password = $request->post('password');
        $model->phone = $request->post('phone');
        $model->email = $request->post('email');
        $model->address = $request->post('address');

        $model->mobile = $request->post('mobile');
        $model->save();
        $request->session()->flash('msg', $message);
        return redirect('users');
    }
    public function delete(Request $request, $id)
    {
        $model = User::find($id);
        $model->delete();
        $request->session()->flash('del', 'User  Deleted.');
        return redirect('users');
    }
}
