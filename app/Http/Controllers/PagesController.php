<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Registration;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('outside.index',compact('courses'));
    }

    public function search(Request $request)
    {
        $courses = Course::where('name', 'like', '%' . $request->search . '%')
        ->orwhere('content', 'like', '%' . $request->search . '%')->get();
        return view('outside.index',compact('courses'));
    }

    public function course($slug)
    {
        $course = Course::where('slug',$slug)->first();
        return view('outside.course',compact('course'));
    }

    public function register($slug)
    {
        $course = Course::where('slug',$slug)->first();
        return view('outside.register',compact('course'));
    }

    public function SubmitRegister(Request $request,$slug)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'gender' => 'required'
        ]);

        $course = Course::where('slug',$slug)->select('id')->first();
        $user = User::where('email',$request->email)->first();
        if ($user == null) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'gender' => $request->gender,
            ]);
        }

        $register = Registration::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);

        return redirect()->route('website.pay',$register->id);
    }

    public function pay($id)
    {
        $register = Registration::find($id);
        return view('outside.pay',compact('register'));
    }

    public function thanks($id)
    {
        Registration::find($id)->update([
            'status' => 1
        ]);

        return redirect()->route('website.index');
    }

    public function contact()
    {
        return view('outside.contact');
    }




}
