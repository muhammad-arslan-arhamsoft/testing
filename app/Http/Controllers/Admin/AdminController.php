<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    //

    //To show login page

    public function index()
    {
        return view('admin.auth.login');
    }

    //Admin Login
    public function profile(Request $request)
    {
        
        return view('admin.auth.profile');
    }
    // update admin profile
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:100',
            'email' => 'required|email',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png,gif'
        ]);

        if ($validator->fails()) {
            Session::flash('flash_danger', $validator->errors());
            return redirect()->back()->withInput();
        }
        $user = Auth::guard('admin')->user();
        if ($request->file('profile_image')) {
            $image = $request->file('profile_image');
            $destinationPath = public_path('uploads/admin-users/');
            $filename = rand(1, 999) . time() . 'user' . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $filename);
            $inputData['image'] = $filename;
            if ($user->image) {
                @unlink('uploads/users/' . $user->userImage);
            }
        }
        $inputData['name'] = $request->username;
        if ($request->oldPassword) {
            $validator = Validator::make($request->all(), [
                'oldPassword' => 'required',
                'password' => 'required|confirmed',
            ]);
            if ($validator->fails()) {
                Session::flash('flash_danger', $validator->errors());
                return redirect()->back()->withInput();
            }
            if (Hash::check($request->oldPassword, $user->password)) {
                $inputData['password'] = Hash::make($request->password);
                $user->update($inputData);
                Session::flash('flash_success', 'Profile has been updated successfully!');
                return redirect('admin/profile');
            } else {
                $flash_message = 'Old password not matched';
                Session::flash('flash_danger',  $flash_message);
                return redirect()->back()->withInput();
            }
        } else {
            $user->update($inputData);
            Session::flash('flash_success', 'Profile has been updated successfully!');
            return redirect('admin/profile');
        }
    }
    public function login(Request $request)
    {
        // Validate the form data
        $validator = Validator::make($request->all(), [
            'email'   => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            $validator->getMessageBag()->add('error', 'true');
            return response()->json($validator->errors());
            return redirect()->back()->withErrors($validator->errors());
        }
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect((route('admin.dashboard')));
       
        } else {
            return redirect()->back()->withErrors(['error' => 'These credentials do not match our records.']);
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flash('flash_success', 'Admin logout Successfully');
        return redirect(route('admin.login'));
    }
}
