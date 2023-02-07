<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Resources\UserResoure;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index(){
        $users = User::when(request()->q, function ($users) {
            $users = $users->where('name', 'like', '%' . request()->q . '%');
        })->latest()->paginate(5);

        return new UserResoure(true, 'List data user', $users);
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_card' => 'required',
            'name' => 'required',
            'password' => 'required',
            'address' => 'required',
            'born_date' => 'required',
            'gender' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create user
        $user = User::create([
            'id_card'=>$request->id_card,
            'name'=>$request->name,
            'password'=>bcrypt($request->password),
            'address'=>$request->address,
            'born_date'=>$request->born_date,
            'gender'=>$request->gender,
        ]);

        if($user) {
            //return success with Api Resource
            return new UserResoure(true, 'Data User Berhasil Disimpan!', $user);
        }

        //return failed with Api Resource
        return new UserResoure(false, 'Data User Gagal Disimpan!', null);
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'disease_history' => 'required',
            'current_symptoms' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if($validator) {

            //update user without password
            $user->update([
                'disease_history' => $request->disease_history,
                'current_symptoms' => $request->current_symptoms,
            ]);
        } else {

            //update user with new password
            $user->update([
                'id_card'=>$request->id_card,
                'name'=>$request->name,
                'password'=>bcrypt($request->password),
                'address'=>$request->address,
                'born_date'=>$request->born_date,
                'gender'=>$request->gender,
            ]);

        }

        if($user) {
            //return success with Api Resource
            return new UserResoure(true, 'Data User Berhasil Diupdate!', $user);
        }

        //return failed with Api Resource
        return new UserResoure(false, 'Data User Gagal Diupdate!', null);
    }


}


