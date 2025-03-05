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
                $image->store('public'); // Сохраняем файл
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
}
