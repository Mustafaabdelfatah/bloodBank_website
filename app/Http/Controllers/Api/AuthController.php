<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Validation\Validator;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;



use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator()->make($request->all(),[
            'name'                          => 'required',
            'email'                         => 'required|unique:clients',
            'phone'                         => 'required',
            'password'                      => 'required|confirmed',
            'dob'                           => 'required',
            'city_id'                       => 'required',
            'donation_last_date'            => 'required',
            'blood_type_id'                 => 'required',

        ]);

        if($validator->fails()){
            return apiResponse(0,$validator->errors()->first(), $validator->errors());
        }
        $client = Client::create($request->all());
        $client->password = bcrypt(request('password'));
        $client->api_token = Str::random(60);
        $client->save();
        return apiResponse(1,'تم الاضافه بنجاح ', [
            'api_token'=> $client->api_token,
            'client'=> $client,
        ]);

    }

    public function login(Request $request)
    {


        $validator = Validator()->make($request->all(),[

            'phone'                         => 'required',
            'password'                      => 'required|confirmed',

        ]);

        if($validator->fails()){
            return apiResponse(0,$validator->errors()->first(), $validator->errors());
        }

        $client = Client::where('phone',$request->phone)->first();
        //$client->update(['password'=>bcrypt(123)]);
        if($client){
            if(Hash::check($request->password,$client->password)){

                return apiResponse(1,'تم تسجيل الدخول',[
                    'api_token' => $client->api_token,
                    'client' => $client
                ]);
            }else{
                return apiResponse(0,'بيانات الدخول غير صحيحة');
            }
        }

         return apiResponse(0,'no client found');

    }

    public function reset_password(Request $request){

        $validator = Validator()->make($request->all(),[
            'phone'                         => 'required',
        ]);

        if($validator->fails()){
            return apiResponse(0,$validator->errors()->first(), $validator->errors());
        }

        $user = Client::where('phone',$request->phone)->first();
        //dd($user);
        if($user){
            $code = rand(1111,9999);
            $update = $user->update(['pin_code'=>$code]);
            if($update){

                // send sms

                //smsMisr($request->phone,'your reset code is'.$code);

                //send email

                Mail::to($user->email)
                ->bcc('mustafa.salama2608@gmail.com')
                ->send(new ResetPassword($code));
                return apiResponse(1,'برجاء فحص هاتفك',[
                    'pin_code_for_test'=>$code,
                    'email'=>$user->email
                    ]);
            }else{
                return apiResponse(0,'حدث خطا حاول مره اخري');

            }
        }else{
            return apiResponse(0,'لا يوجد اي حساب مرتبط بهذا الهاتف');
        }

    }

    public function new_password(Request $request){

        $validator = Validator()->make($request->all(),[
            'pin_code'                         => 'required',
            'phone'                            => 'required',
            'password'                         => 'required|confirmed'
        ]);

        if($validator->fails()){
            return apiResponse(0,$validator->errors()->first(), $validator->errors());
        }

        $user = Client::where('pin_code',$request->pin_code)
        ->where('pin_code' , '!=' , 0)->where('phone',$request->phone)->first();

        //dd($user);
        if($user){
            $user->password = bcrypt($request->password);
            $user->pin_code = null;
            if($user->save()){
                return apiResponse(1,'تم تغيير كلمه المرور بنجاح');
            }else{

                return apiResponse(0,'حدث خطا حاول مره اخري');
            }

        }else{

            return apiResponse(0,'هذا الكود غير صالح');

        }

    }
    public function registerToken(Request $request){

        $validator = Validator()->make($request->all(),[
            'token'                                 => 'required',
            'platform'                              => 'required|in:android,ios',
        ]);
        if($validator->fails()){
            return apiResponse(0,$validator->errors()->first(), $validator->errors());
        }

        Token::where('token',$request->token)->delete();
        $request->user()->tokens()->create($request->all());
        return apiResponse(1,'success login');

    }

    public function removeToken(Request $request){
        $validation= validator()->make($request->all(),[
            'token'=>'required'
        ]);
        if ($validation->fails()){
            $data= $validation->errors();
            return apiResponse('0',$validation->errors()->first(),$data);
        }
        Token::where('token',$request->token)->delete();
        return apiResponse('1','token deleted');
    }
}
