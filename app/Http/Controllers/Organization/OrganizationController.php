<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class OrganizationController extends Controller
{
    //

    //
    public function profile(Request $request)
    {

        return view('organization.auth.profile');
    }
    //To show login page
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
        $user = Auth::guard('organization')->user();
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
                return redirect('organization/profile');
            } else {
                $flash_message = 'Old password not matched';
                Session::flash('flash_danger',  $flash_message);
                return redirect()->back()->withInput();
            }
        } else {
            $user->update($inputData);
            Session::flash('flash_success', 'Profile has been updated successfully!');
            return redirect('organization/profile');
        }
    }
    public function index()
    {
        return view('organization.auth.login');
    }

    // to register organization form
    public function register()
    {
        return view('organization.auth.register');
    }
    // register organization
    public function registerOrganization(Request $request)
    {
        $messages =
            [
                'email.required' => "The :attribute field is required",
                'email.email' => "The :attribute :input format should be example@example.com/.in/.edu/.org....",
                'email.unique' => "We’re sorry. This :attribute: :input already exists. Please try a different email address to register, or <a href='/login'>login</a> to your existing account",
            ];

        $rules = [

            'name'  => 'required|string',
            'email' => 'required|email|unique:organizations',
            'password' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->messages())->withInput();
        }
        $input = $request->all();
        $input['password'] = Hash::make($request->password);
        $organization = new Organization();
        $organization->fill($input);
        $organization->save();
        $message = 'Thank you for registering your account. You can now log in with your credentials to access your account';
        return redirect(route('organization.login'))->with('flash_success', $message);
    }
    //Organization Login

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
        if (Auth::guard('organization')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1], $request->remember)) {
            return redirect((route('organization.dashboard')));
        } else {
            return redirect()->back()->withErrors(['error' => 'These credentials do not match our records.']);
        }
    }
    public function logout(Request $request)
    {
        Auth::guard('organization')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::flash('flash_success', 'organization logout Successfully');
        return redirect(route('organization.login'));
    }
}
