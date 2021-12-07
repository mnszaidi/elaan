<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Course;
use App\Models\User;
use Auth;

class FrontController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::where('category_status','1')
                        ->where('category_menu','1')
                        ->select('category_name')
                        ->orderBy('category_name', 'asc')
                        ->get();

        $featured_courses = Course::with('category','tag','currency')
                        ->where('course_status','1')
                        ->where('course_shown','1')
                        ->orderBy('created_at', 'asc')
                        ->take(6)
                        ->get();

        $courses = Course::with('category','tag','currency')
                        ->where('course_status','1')
                        ->where('course_shown','1')
                        ->orderBy('created_at', 'asc')
                        ->take(6)
                        ->get();

        return view('welcome',compact('categories','courses','featured_courses'));
    }

    


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        $categories = Category::where('category_status','1')
                        ->where('category_menu','1')
                        ->select('category_name')
                        ->orderBy('category_name', 'asc')
                        ->get();

        $course = Course::find($id)->load('category','tag', 'currency','users');
        $user = Auth::user();
        $exists = $course->users->contains($user->id);
        
        return view('detail',compact('exists','course','categories'));
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function subscribe(Request $request, $id)
    {
        $categories = Category::where('category_status','1')
                        ->where('category_menu','1')
                        ->select('category_name')
                        ->orderBy('category_name', 'asc')
                        ->get();
                        
        $course = Course::find($id)->load('category','tag', 'currency','users');
        $user = Auth::user();

        $exists = $course->users->contains($user->id);

        if(!$exists){

            $subscribed = $user->courses()->attach($course->id);
            return back()->with('gmsg','You have subscribed to Course Successfuly, Take Exam Now or Visit Your Dashboard to Take Exam later.');
        }else{

            return view('detail',compact('exists', 'course', 'categories'));
        }

    }
}
