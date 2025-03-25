<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\TestResponse;

class TestController extends Controller
{
    //Примери работы с Request и Responses по документации

    public function create(Request $request)
    {
        /**Rules validation
         * $request->validate([
         * 'title' => 'required|max:255',
         * 'body' => 'required',
         * 'type' => 'in:post,page',
         * ]);*/

        if ($request->isMethod('post')) {
            // Валидация данных
            $validated = $request->validate([
                'username' => 'required|max:255',
                'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'created_at' => 'required',
                //'created_at' => 'required|date format:d-m-Y H:i:s',
                //'upload' => 'safe',
                //'type' => 'in:post,page',
            ]);
            // Обработка файлов ДО редиректа
            if ($request->hasFile('upload')) {
                $image = $request->file('upload');
                $image->store('public/uploads'); // Сохраняем файл
            }
            // Сохраняем данные в сессию для следующего запроса
            $request->session()->flash('formData', $validated);

            // Редирект без передачи данных в URL
            return redirect()->route('test-responses');
        }

        return view('create');
    }

    public function testResponses(Request $request)
    {
        // Получаем данные из сессии
        $data = $request->session()->get('formData');

        // Передаем данные в представление
        return view('test-responses', ['input' => $data]);

    }

    public function test(){
        $records = [1,2,3,4,5,6,7,8,9,10];
        return view('test', ['records' => $records]);
    }


    public function practice()
    {
        //PDO - это абстракция для доступа к базам данных в PHP.
        /* $pdo = DB::connection()->getPdo();
         $stmt = $pdo->prepare('SELECT * FROM users');
         $stmt->execute();
         $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);*/

        $users = DB::table('users')->get();
        $user = DB::table('users')->find(1);
       // $users = DB::table('users')->where('name', 'John')->firstOrFail();
       // $titles = DB::table('users')->pluck('name');


        return view('practice', ['data' => $users]); //['users' => $users, 'titles' => $titles]

    }


}
