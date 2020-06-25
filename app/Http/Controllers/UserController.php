<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;
use Validator;
use App\Mail\RegisteredUser;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;
use App\Mail\SendMail;
use App\Jobs\WelcomeEmailJob;

class UserController extends Controller
{
    use VerifiesEmails;
    public $successStatus = 200;
    /** 
     * login api 
     * @return \Illuminate\Http\Response 
     */
    public function login(Request $request) 
    {
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')]))
        {
            $user = Auth::user();
           
            if($user->email_verified_at !== NULL)
            {
                $token = $user->createToken('my_token')->plainTextToken;

                $response = [
                    'user' => $user,
                    'token' => $token
                ];
                echo response($response,201);
                
                $success['message'] = "Login successfull";
                return response()->json(['success' => $success], $this->successStatus);
            }
            else
            {
                return response()->json(['error' => 'Please Verify Email'], 401);
            }
        }
        else
        {
            return response()->json(['error' => 'Unauthorised'], 401);
        }

    }

    /** 
     * Register api 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);

        if ($validator->fails()) 
        {
            return response()->json(['error' => $validator->errors()], 401);
        }
        
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        
        $this->dispatch(new WelcomeEmailJob($user));

        $success['message'] = "Mail Sent to your email,Please Check it.";
        return response()->json(['success' => $success], $this->successStatus);
    }

    /** 
     * details api 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this->successStatus); 
    }
}
