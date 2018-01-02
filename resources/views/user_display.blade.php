@extends('app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
			@foreach($user_display as $u_display)
				<div class="panel-heading">Home: {{$u_display->username}}</div>
				<div>{{ session('message') }}</div>
				<div>
				<!--@if (isset($_COOKIE["userlogin_$u_display->username"]))
 					{{($_COOKIE["userlogin_$u_display->username"])}}
 				@else

 				@endif -->
				</div>
				@if (Auth::guest())

				@else
				<div class="panel panel-default">
					<div class="panel-body">
					 	<form method="post" action="post_question" onsubmit="alert('Question submitted successfully. Question will appear after approval.');">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<label>Question :</label>
						<input type="text" class="form-control" name="question" id="question" placeholder="Enter question here"><br>
						<input type="hidden" name="username" id="username" value="{{$u_display->username}}"><br>
						<input type="submit" name="submit" value="Post Question" >
					</form>
					</div>
				</div>
				@endif
				
		</div>
			@foreach($questions as $question)
				<div class="panel panel-default" >
					<div class="panel-body" id="{{$question->q_id}}" >
					<form>
						{{ $question->question }}<br>
						<input type="hidden" name="q_id" value="{{ $question->q_id }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="button" name="yes"  id="yes" value="Yes" onclick="votestore('yes',{{$question->q_id}})"/> 
  						<input type="button" name="no" id="no" value="No" onclick="votestore('no',{{$question->q_id}})"/>
  						<input type="button" name="other" id="other" value="Yes, I think" onclick="votestore('other',{{$question->q_id}})"/>
  					</form>
  				<!--	<label>Yes:{{$question->yes}}</label>
  					<label>No:{{$question->no}}</label>
  					<label>Maybe:{{$question->other}}</label> -->
					</div>
				</div>
			@endforeach
			<div class="panel panel-default">
					<div class="panel-body">
					@if (isset($_COOKIE["userlogin_$u_display->username"]))
 					<form method="post" action="done_voting" onsubmit="alert('Sorry you have already given answers for this user!!')">
 					@else
 					<form method="post" action="done_voting" onsubmit="alert('Answers submitted successfully!')">
 					@endif
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="votes" id="votes" value="def" >
					<input type="hidden" name="qstns" id="qstns" value="def">
					<input type="hidden" name="v_user" value="{{ $u_display->username }}">
					<input type="button" name="temp_s"  id="submit_tmp" value="Send Feedback" onclick="f_submit()"/> 
					<input type="submit" name="submit1" id="submit1" style="display:none;" /> 
					</form>
					</div>
			</div>
			@endforeach
	</div>
</div>
</div>
@endsection
