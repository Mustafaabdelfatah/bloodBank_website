<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use App\Models\City;
use App\Models\Post;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{



    public function cities(Request $request)
    {
        $cities = City::where(function($query) use($request) {



            if($request->has('governorate_id')){

                $query->where('governorate_id',$request->governorate_id);
            }

        })->get();
        return apiResponse(1,'success',$cities);
    }
    public function governorates()
    {
        $governorates = Governorate::all();
        return apiResponse(1,'success',$governorates);

    }

    public function posts()
    {
        $posts = Post::all();
        return apiResponse(1,'success',$posts);

    }

    public function category()
    {
        dd(Auth::check());

        $category = Category::all();
        return apiResponse(1,'success', $category);
    }

    public function setting(Request $request)
    {
        $setting = Setting::find(1);

        return apiResponse(1,'success', $setting);
    }

    public function profile(Request $request)
    {
        $validator = validator()->make($request->all(),[

            'email'                         => 'required|unique:clients,'.auth()->user()->id,
            'password'                      => 'required|confirmed',

        ]);
        $client = auth()->user();      // return user اللى عامل login
        $client->update($request->all());
        $client->password = bcrypt(request('password'));

        return apiResponse(1,'success',$client);


    }

    public function contact(Request $request) {
        $validator =Validator()->make($request->all(),[
            'name'=>'required',
            'phone'=>'required|max:11|min:11',
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ]);

        if ($validator->fails()) {
            return apiResponse(0, 'validation errors : ' . $validator->errors()->first(), $validator->errors());
        }


        $contant=Contact::create($request->all());

        return apiResponse(1,'success',$contant);

    }

    public function donationRequestCreate(Request $request)
    {
        $rules = [
            'patient_name'=> 'required',
            'patient_phone'=> 'required|digits:11',
            'hospital_name'=> 'required',
            'patient_age'=> 'required:digits:50',
            'bags_num'=> 'required|digits:2',
            'hospital_address'=> 'required',
            'details'=> 'required',
            'latitude'=> 'required',
            'longitude'=> 'required',
            'blood_type_id'=>'required',
            'city_id'=>'required|exists:cities,id',

        ];

        $validator = validator()->make($request->all(), $rules);
        if ($validator->fails()) {
            return apiResponse(0, $validator->errors()->first(), $validator->errors());
        }

        $donationRequest = $request->user()->donationRequests()->create($request->all());

         //dd($donationRequest);


         $clientsIds = $donationRequest->city->governorate->clients()
         ->whereHas('bloodType', function ($q) use ($request,$donationRequest) {
                         $q->where('blood_types.id', $donationRequest->blood_type_id);
                     })->pluck('clients.id')->toArray();

        $send = "";

        if (count($clientsIds)) {
            // create a notification on database
            $notification = $donationRequest->notifications()->create([
                'title' => 'يوجد حالة تبرع قريبة منك',
                'content' =>  $donationRequest->bloodType->name . 'محتاج متبرع لفصيلة ',

            ]);
           //dd($notification);
            // attach clients to this notofication
            $notification->clients()->attach($clientsIds);



            $tokens = Token::whereIn('client_id',$clientsIds)->where('token','!=',null)->pluck('token')->toArray();

            if (count($tokens))
            {
                $title = $notification->title;
                $body = $notification->content;
                $data = [
                    'donation_request_id' => $donationRequest->id
                ];
                $send = notifyByFirebase($title, $body, $tokens, $data);
                info("firebase result: " . $send);
             }

        }

        return apiResponse(1, 'تم الاضافة بنجاح',$donationRequest);

    }

    public function notifications(Request $request)
    {
        $items = $request->user()->Notifications()->latest()->paginate(20);
        return apiResponse(1, 'Loaded...', $items);
    }


    public function postFavourite(Request $request)
    {
        $rules = [
            'post_id' => 'required|exists:posts,id',
        ];
        $validator = validator()->make($request->all(), $rules);
        if ($validator->fails()) {
            return apiResponse(0, $validator->errors()->first(), $validator->errors());
        }
        //$toggle = $request->user()->postFavourites()->toSql();
        //"select * from `posts` inner join `client_post` on `posts`.`id` = `client_post`.`post_id` where `client_post`.`client_id` = ?"
        //dd($toggle);
        $toggle = $request->user()->postFavourites()->toggle($request->post_id);
        return apiResponse(1, 'Success', $toggle);
    }

    public function myFavourites(Request $request)
    {
        $posts = $request->user()->postFavourites()->with('category')->latest()->paginate(20);

        return apiResponse(1, 'Loaded...', $posts);
    }


}
