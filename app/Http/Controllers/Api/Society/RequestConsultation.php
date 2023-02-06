<?php

namespace App\Http\Controllers\Api\Society;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\SocietyResource;
use App\Models\User;

class RequestConsultation extends Controller
{
    //
    public function index(){
        $users = User::when(request()->q, function ($users) {
            $users = $users->where('name', 'like', '%' . request()->q . '%', 'name');
        })->latest()->paginate(5);

        return new SocietyResource(true, 'Welcome to Request Consultation', $users);
    }

        public function update(Request $request, User $user){
        $validator = Validator::make($request->all(), [
            'disease_history' => 'required',
            'current_symptoms' => 'required',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 401);
        }

        if($user){
            $user->update([
                'disease_history' => $request->disease_history,
                'current_symptoms' => $request->current_symptoms,
            ]);
        }
        $user->update([
            'disease_history' => $request->disease_history,
            'current_symptoms' => $request->current_symptoms,
        ]);

        if($user){
            return new SocietyResource(true, 'Request Consultation sent successful', $user);
        }
        return new SocietyResource('invalid');
    }
}
