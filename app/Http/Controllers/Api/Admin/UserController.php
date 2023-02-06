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



    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'id_card'=>'required',
            'name'=>'required',
            'password'=>'required',
            'addres'=>'required',
            'born_date'=>'required',
            'gender'=>'required',
        ]);
    }

}
