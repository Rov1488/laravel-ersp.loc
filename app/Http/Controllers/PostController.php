<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostCollection;
use App\Models\Post;
use Illuminate\Http\Request as Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\note;
use Illuminate\Support\Facades\Validator;
use function MongoDB\BSON\toJSON;
use App\Events\OrderShipmentStatusUpdated;

class PostController extends Controller
{
    public function index()
    {
        // session_start();
        // $_SESSION['username']= 'Ivan Ivanov';
        // $session_id = session_id();
        // dd($_SESSION);
       $applicant = new PostCollection(Post::paginate(10));
        //return $applicant; //->toJson(JSON_PRETTY_PRINT)
        return view('posts.index', ['applicant' => $applicant]);
    }

    public function show(Request $request, int $post_id, string $title)
    {
        dd($request);
        $post_id += 10;
        //return view('posts.post', ['post_id' => $post_id]);
        return view('posts.show')->with('post_id', $post_id)->with('title', $title);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post') && !empty($request->post())) {
            //dd(\request()->post());
            $result = 'success';
            //return $request->json($request->post());
            return view('posts.create', ['result' => $result]);
        }elseif(empty($request->post())) {
            $result = 'error';
            return view('posts.create', ['result' => $result]);
        }
        return view('posts.create');

    }

    public function store(Request $request)
    {

        /*
         * Условно добавляемые правила
        * Пропуск проверки, если поля имеют определенные значения
        * Иногда вы можете захотеть не проверять заданное поле, если другое поле имеет заданное значение.
        * Вы можете сделать это с помощью exclude_ifправила проверки.
        * В этом примере поля appointment_dateи doctor_name не будут проверяться,
        * если has_appointmentполе имеет значение false:
         * */
        $validator = Validator::make($request->all(), [
            'has_appointment' => 'required|boolean',
            'appointment_date' => 'exclude_if:has_appointment,false|required|date',
            'doctor_name' => 'exclude_if:has_appointment,false|required|string',
        ]);

    }


}
