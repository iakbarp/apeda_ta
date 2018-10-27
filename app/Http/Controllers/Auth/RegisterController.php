<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Events\Auth\UserActivationEmail;
use Illuminate\Http\Request;
use App\Mail\VerifyEmail;
use App\verifyUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\contact;
use Illuminate\Support\Str;
//use Mail;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        Session::flash('status');
//        Session::flash('verif');
        $user = User::create([
            'name' => $data['name'],
            'nik' => $data['nik'],
            'tempat_lahir' => $data['tempat_lahir'],
            'tgl_lahir' => $data['tgl_lahir'],
            'city_id' => $data['city_id'],
            'role_id' => $data['role_id'],
            'job_id' => $data['job_id'],
            'posisition_id' => $data['posisition_id'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'remember_token' => Str::random(45),
            'verifyToken' => Str::random(45),
        ]);
        $thisUser=User::findOrFail($user->id);
        $this->sendEmail($thisUser);


//        $verify=verifyUser::create([
//            'user_id'=>$user->id,
//            'token'=>str_random(45)
//        ]);
//        Mail::to($user->email)->send(new verifyEmail($user));
////        Mail::send(new verifyMail($user), $user, function ($message) use ($user) {
////            $message->from(env('MAIL_HOST'), 'Sanggar ABK');
////            $message->to($user->email);
////            $message->subject('Aktivasi Akun Sanggar ABK');
////        });
//        return $user;
//    }
//    public function verification($token)
//    {
//        $verify=verifyUser::where('token',$token)->first();
//        if (isset($verify)){
//            $user=$verify->user;
//            if (Hash::check(false,$user->code_status)){
//                $verify->user->code_status=bcrypt(true);
//                $verify->save();
//                $status="your email is verified, you can login right now...";
//            }
//            else{
//                $status="your email is already verified, you can login right now...";
//            }
//        }
//        else{
//            return redirect()->route('login')->with('warning','sorry, your email cannot identified..');
//        }
//        return redirect()->route('login')->with('success',$status);
    }

    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function verifyEmailFirst()
    {
        return view('email.verifyEmailFirst');
    }

    public function sendEmailDone($email,$verifyToken)
    {
        $user = User::where(['email'=>$email,'verifyToken'=>$verifyToken])->first();
        if($user){
            user::where(['email'=>$email,'verifyToken'=>$verifyToken])->update(['status'=>'1','verifyToken'=>NULL]);
            return redirect()->route('login');
        }else
            return 'user not found';
    }

    protected function registered(Request $request, $user)
    {
        //sending mail
        event(new UserActivationEmail($user));
        $this->guard()->logout();
        return redirect()->route('login')->with('Success','Register berhasil. Mohon cek email anda untuk melakukan proses aktivasi.');
    }
}