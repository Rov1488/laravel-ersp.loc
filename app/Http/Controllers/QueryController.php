<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function index()
    {
        //PDO - это абстракция для доступа к базам данных в PHP.
       /* $pdo = DB::connection()->getPdo();
        $stmt = $pdo->prepare('SELECT * FROM users');
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);*/

        //$users = DB::table('users')->get();
        $users = DB::table('users')->where('name', 'John')->firstOrFail();
        $titles = DB::table('users')->pluck('name');


        return $users;

    }
}
