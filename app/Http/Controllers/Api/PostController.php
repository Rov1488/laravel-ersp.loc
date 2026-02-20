<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\SwaggerController;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends SwaggerController
{
    /**
     * @OA\Get(
     *     path="/api/posts",
     *     summary="Получить список постов",
     *     tags={"Posts"},
     *     @OA\Response(
     *         response=200,
     *         description="Список постов",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="title", type="string", example="Первый пост"),
     *                 @OA\Property(property="content", type="string", example="Содержание первого поста")
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $posts = Post::select('id', 'title', 'content')->paginate(3);
        return response()->json($posts);
    } 
    
    
    /**
     * @OA\Get(
     *     path="/api/posts/{post_id}/{title}",
     *     summary="Получить пост по ID и названию",
     *     tags={"Posts"},
     *     @OA\Parameter(
     *         name="post_id",
     *         in="path",
     *         description="ID поста",
     *         required=true,
     *         @OA\Schema(type="integer", example=1)
     *     ),
     *     @OA\Parameter(
     *         name="title",
     *         in="path",
     *         description="Название поста",
     *         required=true,
     *         @OA\Schema(type="string", example="Первый пост")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Пост найден",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="title", type="string", example="Первый пост"),
     *             @OA\Property(property="content", type="string", example="Содержание первого поста")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Пост не найден"
     *     )
     * )
     */
    public function show($post_id, $title)
    {
        $post = Post::where('id', $post_id)->where('title', $title)->first();
        if ($post) {
            return response()->json($post);
        } else {
            return response()->json(['message' => 'Пост не найден'], 404);
        }
    }

}   











































