<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    public function changePassword()
    {
        return view('auth.passwords.change');
    }

    public function updatePassword(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'old_password' => 'required',
                'new_password' => 'required|confirmed',
                'new_password_confirmation' => 'required',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator);
            }

            if (!Hash::check($request->old_password, Auth::user()->password)) {
                return back()->with("error", "Old Password Doesn't match!");
            }

            User::whereId(Auth::user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);

            return back()->with("status", "Password changed successfully!");
        } catch (Exception $e) {
            return redirect()->back()->withErrors('An error occurred');
        }
    }



    public function storeImage(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'image' => 'required|file|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator);
            }
            $oldImage = User::findOrFail(Auth::user()->id)->image;

            if($oldImage){

                $imagePath = public_path('images/' . $oldImage);

                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            
            $imageName = time() . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $imageName);

            User::whereId(Auth::user()->id)->update(['image' => $imageName]);

            return back()->with('success', 'You have successfully upload image.');
        } catch (Exception $e) {
            return redirect()->back()->withErrors('An error occurred');
        }
    }

    public function destroyImage()
    {

        $oldImage = User::findOrFail(Auth::user()->id)->image;

        $imagePath = public_path('images/' . $oldImage);

        if (file_exists($imagePath)) {
            unlink($imagePath);
            User::whereId(Auth::user()->id)->update([
                "image" => null
            ]);
        }
        return redirect()->back()->with('success','image deleted successfully');
    }

    public function showProfile()
    {
        return view('profile.profile');
    }

    public function updateProfile(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|',
                'email' => 'required|email|',
                'phone' => 'required|string|regex:/^[0-9]{9,}$/',
            ]);

            if ($validator->fails()) {
                return back()
                    ->withErrors($validator);
            }

            $data = ([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            User::whereId(Auth::user()->id)->update($data);
            return redirect()->back()->with('success', 'Successfully updated');
        } catch (Exception $e) {
            return redirect()->back()->withErrors('An error occurred');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        User::whereId(Auth::user()->id)->delete();
        return redirect()->back();
    }
}
