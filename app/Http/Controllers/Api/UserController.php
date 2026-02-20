<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\SwaggerController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends SwaggerController
{
    /**
     * @OA\Get(
     *     path="/api/users",
     *     summary="Получить список пользователей",
     *     tags={"Users"},
     *     @OA\Response(
     *         response=200,
     *         description="Список пользователей",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="name", type="string", example="Иван"),
     *                 @OA\Property(property="email", type="string", example="ivan@example.com")
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $users = User::select('id', 'name', 'email')->paginate(3);
        return response()->json($users);
    }

    /**
     * @OA\Post(
     *     path="/api/users",
     *     summary="Создать нового пользователя",
     *     tags={"Users"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Анна"),
     *             @OA\Property(property="email", type="string", example="anna@example.com"),
     *             @OA\Property(property="password", type="string", example="secret123")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Пользователь успешно создан",
     *         @OA\JsonContent(
     *             @OA\Property(property="error", type="string", example="0"),
     *             @OA\Property(property="message", type="string", example="Пользователь успешно создан")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Ошибка валидации"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return response()->json([
            "error" => "0",
            "message" => "Пользователь успешно создан",
        ], 201);
    }
}
