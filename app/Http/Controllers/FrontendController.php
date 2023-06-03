<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Consultant;
use App\Models\Subscribe;
use Illuminate\Http\Request;
use App\Models\ContactFormSubmit;
use App\Models\ContactProperty;
use App\Models\NewArrival;
use App\Models\Property;
use App\Models\Service;
use Plusemon\Notify\Facades\Notify;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        return view('index');
    }

    public function contactmessage(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'phone' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        ContactFormSubmit::create($request->all());
        Notify::success('Your Message Submited', 'Success');
        return back();
    }


}
