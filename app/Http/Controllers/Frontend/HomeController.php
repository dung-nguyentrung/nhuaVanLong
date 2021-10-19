<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index() {
        return view('frontend.home');
    }

    public function about() {
        $setting = Setting::first();
        $testimonials = Testimonial::with('media')->limit(3)->get();
        return view('frontend.about-us', compact('setting', 'testimonials'));
    }

    public function language($language) {
        if ($language) {
            Session::put('language',$language);
        }
        
        return back();
    }
}
