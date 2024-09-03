<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Http\Request as Req;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function profile()
    {
        $data = User::with(['reviews' => function ($query) {
            $query->select('id', 'star', 'review_description');
        }])
            ->select('id', 'name', 'email', 'photo')->find(Auth::id());

        $data->load(['reviews.destination' => function ($query) {
            $query->select('id', 'name', 'photo');
        }]);

        return Helper::APIResponse('success show proifle', 200, null, $data);
    }

    public function update(Req $req)
    {
        $validation = Validator::make($req->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($validation->fails()) {
            return Helper::APIResponse('error validation', 422, $validation->errors(), null);
        }

        $data = User::select('name', 'photo', 'email')->find(Auth::id());
        $data->name = $req->name;
        $data->email = $req->email;

        if ($req->hasFile('photo')) {
            $photo = $req->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->storeAs('public/image/' . $photoName);
        }

        $data->update();

        return Helper::APIResponse('success update profile', 200, null, $data);
    }

    public function changePassword(Req $req)
    {
        $validateMsg = [
            'new_password.regex' => 'The :attribute must contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character'
        ];
        $validation = Validator::make($req->all(), [
            'current_password' => 'required',
            'new_password' => [
                'required',
                'confirmed',
                'min:8',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*#?&]/'
            ],
            'new_password_confirmation' => 'required|same:new_password'
        ], $validateMsg);

        $user = User::find(Auth::id());

        if ($validation->fails()) {
            return Helper::APIResponse('error validation', 422, $validation->errors(), null);
        }

        if (!Hash::check($req->current_password, $user->password)) {
            throw ValidationException::withMessages([
                'current_password' => ['Current password is incorrect']
            ]);
        }

        $user->password = Hash::make($req->new_password);
        $user->save();

        return Helper::APIResponse('success', 200, null, 'Password changed successfully');
    }
}
