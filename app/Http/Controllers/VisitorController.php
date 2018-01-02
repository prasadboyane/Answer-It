<?php namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Questions;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class VisitorController extends Controller {

	public function post_question()
	{
		$question = new Questions;
		$question ->question=Input::get("question");
		$question ->username=Input::get("username");
		$question ->save();
		$questions = DB::table('questions')->where('username', $question->username)->where('published','1')->orderBy('created_at', 'desc')->get();
		$user_display = DB::table('users')->where('username',$question->username)->get();
		return view('user_display',compact('questions','user_display'));
	}



	public function done_vote(Request $request)
	{
	$qstn = Input::get('qstns');
	$votes = Input::get('votes');   
    $myArray =explode(',', $qstn);
    $myArray1 =explode(',', $votes);
	$username = $request->v_user;
	$cookie_name="userlogin_".$username;
	$cookie_value=$username;
	setcookie( $cookie_name,$cookie_value, time() + (6000), '/' ) ; 
		if(!isset($_COOKIE[$cookie_name])) {
			    for($i = 0;$i<sizeof($myArray1);$i++)
	{
    
        if($myArray1[$i]=='yes'){
			DB::table('questions')->where('q_id', '=', $myArray[$i])->increment('yes');
		}
		if($myArray1[$i]=='no'){
			DB::table('questions')->where('q_id', '=', $myArray[$i])->increment('no');
		}
		if($myArray1[$i]=='other'){
			DB::table('questions')->where('q_id', '=', $myArray[$i])->increment('other');
		}
	} //end for loop
		$questions = DB::table('questions')->where('username', $username)->where('published','1')->orderBy('created_at', 'desc')->get();
		//$user_display = DB::table('users')->where('username',$username)->get();
		//return view('user_display',compact('questions','user_display'));
		//return redirect('/');
		$user_display = DB::table('users')->where('username',$username)->get();
		return view('user_display',compact('questions','user_display'));

		}  //end if - cookie not set
		else {

    			echo "Cookie '" . $cookie_name . "' is set!<br>";
    			echo "Value is: " . $_COOKIE[$cookie_name];
    			return Redirect::to("/visitor/$username")->with('message', 'Already voted!');
		}

	}

}
