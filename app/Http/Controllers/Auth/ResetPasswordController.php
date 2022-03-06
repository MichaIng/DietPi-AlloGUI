<?php
namespace App\Http\Controllers\Auth;

use Redirect;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use DB;
use Mail;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
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

    public function reset(Request $request)
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $password = implode($pass); //turn the array into a string

        $user = DB::table('users')->where('email', $request->email)->first();
        if(!empty($user)) {
            DB::table('users')->where('id', $user->id)->update(['password' => bcrypt($password)]);
            // $to = $request->email;

            $to = 'revtest745@gmail.com';
            $subject =  "Updated Password";
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .=  'Content-type: text/html; charset=iso 8859-1'."\r\n";
            $headers .= 'From: DietPi <no-reply@dietpi.com>' . "\r\n";
            $message = "<div style='width:100%'><h3>Updated Password</h3><div><h4>Hello,</h4><p>Please check your new password:<br>Password:".$password."<br><br>Thanks & Regards<br></p></div></div>";
            $result = mail($to, $subject, $message, $headers);
            if(mail($to, $subject, $message, $headers)) {   
                return Redirect('/password/reset')->with(['custom_message' => 'Password successfully sent to your email id']);
            } elseif(!mail($to, $subject, $message, $headers)) {
                echo '<pre>';var_dump(error_get_last());die;
            }
            
                return Redirect('/password/reset')->with(['custom_message' => 'Password successfully sent to your email id']);
            
        } else {
            return Redirect('/password/reset')->with(['failure_message' => 'No such user exists']);
        }
       
        
        // $content = [

        //     'title'=> 'New Password', 

        //     'body'=> 'Your new password is : '.' '.$password

        //     ];


        // $receiverAddress = $request->email;

        // Mail::to($receiverAddress)->send(new newPassword($content));

        
    }
}
