<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
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
        return response()->json([
            ['id' => 1, 'name' => 'Иван', 'email' => 'ivan@example.com'],
            ['id' => 2, 'name' => 'Мария', 'email' => 'maria@example.com'],
        ]);
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
     *             @OA\Property(property="id", type="integer", example=3),
     *             @OA\Property(property="name", type="string", example="Анна"),
     *             @OA\Property(property="email", type="string", example="anna@example.com")
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
        // Здесь должна быть логика создания пользователя
        return response()->json([
            'id' => 3,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ], 201);
    }
}
