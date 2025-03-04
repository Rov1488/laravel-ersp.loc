<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Testing\TestResponse;

class TestController extends Controller
{
    //Примери работы с Request и Responses по документации

    public function create(Request $request)
    {
        if ($request->isMethod('post') && !empty($request->post())) {
            $input = $request->post();
            return view('test-responses', compact('input'));
        }
        //$data = $request->fullUrlWithoutQuery(['type']);
        return view('create');
    }

    public function testResponse(Request $request, $data = null)
    {
        $result = $request->post();
        return view('test-responses', ['input' => $result]);
    }
}
