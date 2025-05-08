<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use avadim\FastExcelWriter\Excel;
class ExportController extends Controller
{

    public function excelExport()
    {
        $excel = Excel::create('Posts');
        $sheet = $excel->sheet();
        $posts = Post::all()->toArray();
        //dd($post);
        return view('export-file.export', compact('posts'));
    }
}
