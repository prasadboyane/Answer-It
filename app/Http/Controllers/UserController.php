<?php namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Questions;
use App\User;
use App\Feedbacks;

class UserController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| User Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/
	public function __construct()
    {
	//$questions = DB::table('questions')->where('username', Auth::User()->username)->get();
	//return view('home',compact('questions'));
	}

	public function post_question()
	{
		$users =DB::table('users')->where('username', Input::get("username"))->get();
		if (count($users)) {
   			$question = new Questions;
			$question ->question=Input::get("question");
			$question ->username=Input::get("username");
			$question ->save();
			$questions = DB::table('questions')->where('username', Auth::user()->username)->orderBy('created_at', 'desc')->get();
			$user_display = DB::table('users')->where('username',$question->username)->get();
			return view('home',compact('questions'));
		}
		return("Please enter correct username");
	}

	public function done_vote(Request $request)
	{
	$qstn = Input::get('qstns');
	$votes = Input::get('votes');   
    $myArray =explode(',', $qstn);
    $myArray1 =explode(',', $votes);

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
		$questions = DB::table('questions')->where('username', Auth::User()->username)->where('published','1')->orderBy('created_at', 'desc')->get();
		return view('home',compact('questions'));
	}
	
	public function search_friend(request $request)
	{

		$search_val=$request->search;
		$results=new User;
		$result1=$results->where('username', $search_val)->get();
		#$result1=DB::select('select name,username from users where username = ?', [ $search_val ]);
		if (($result1->count())==0){
			$result2=DB::select('select name,username from users where username like "'.$search_val.'%"');
			return view('results',compact('result1','result2','search_val'));
		}
		$result2=DB::select('select name,username from users where 1=2');
		return view('results',compact('result1','result2','search_val'))->with('message', $search_val);
	}
	public function visitor($username){
		$user_display = DB::table('users')->where('username', $username)->get();
		$questions = DB::table('questions')->where('username',$username)->where('published','1')->orderBy('created_at', 'desc')->get();
		return view('user_display',compact('questions','user_display'));
	}
	public function feedback(){
		return view('feedback');
	}
	public function intro(){
	return view('Intro');
	}
	public function doneFeedback(){
		$feedback = new Feedbacks;
		$feedback ->name=Input::get("name");
		$feedback ->email=Input::get("email");
		$feedback ->phone=Input::get("phone");
		$feedback ->website=Input::get("website");
		$feedback ->msg=Input::get("msg");
		$feedback ->save();
		return redirect('/');
	}
	public function approval(){
	$value_to_insert = Input::get('publish') == 'publish' ? 1 : 0;
	$q_id = Input::get('app_id');
	if ($value_to_insert ==0){
	DB::table('questions')->where('q_id', '=', $q_id)->delete();
	}
	if ($value_to_insert ==1){
	DB::table('questions')->where('q_id', '=', $q_id)->update(['published' => 1]);
	}

		$questions = DB::table('questions')->where('username', Auth::User()->username)->orderBy('created_at', 'desc')->get();
		return view('home',compact('questions'));
	}

}