<?php

namespace App\Http\Controllers\Frontend;

use App\Events\NewClientContacted;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;

class ContactController extends Controller
{
    public function index() {
        $setting = Setting::first();
        return view('frontend.contact-us', compact('setting'));
    }

    public function store(ContactRequest $request) {
        $contact = Contact::create($request->validated());
        
        if ($request->input('email', true)) {
            event(new NewClientContacted($contact));
        }
        
        Toastr::success('Chúng tôi đã nhận được yêu cầu từ quý khách', 'Xin cảm ơn');
        return back();
    }
}
