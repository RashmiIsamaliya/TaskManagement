<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;
use App\Jobs\SendEmail;
use App\Jobs\StoreUsers;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    function index() {
        return view('home');
    }

    function uploadFile(Request $request) {
        $validator = Validator::make(
            [
                'file'      => $request->file,
                'extension' => strtolower($request->file->getClientOriginalExtension()),
            ],
            [
                'file'          => 'required',
                'extension'      => 'required|in:xlsx,xls',
            ]
          );
          if ($validator->fails()) {
            return Redirect::back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput();

        } else {
            $path = $request->file('file')->store('temp');
            $file = $request->file('file');
            $fileName = time().$file->getClientOriginalName();
            $res = $file->move(public_path('uploads'), $fileName);
            dispatch(new StoreUsers($res->getRealPath()));
            dispatch(new SendEmail());
            return redirect()->back()->with('message', 'File Upload Successfully!');
        }
    }
}
