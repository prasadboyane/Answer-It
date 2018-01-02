@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">My Home</div>
				<div class="panel-body">
					<form method="post" action="post_question" onsubmit="alert('Question submitted successfully. Question will appear after approval.');">
						<input  type="hidden" name="_token" value="{{ csrf_token() }}">
						<label>Question :</label>
						<input class="form-control" type="text" name="question" id="question" placeholder="Enter question here" required><br>
						<label >Friend:</label>
						<input class="form-control" type="text" name="username" id="username" placeholder="Friend's username here" required><br>
						<input type="submit" name="submit" value="Post Question" >
					</form>
				</div>
		</div>
			@foreach($questions as $question)
				<div class="panel panel-default">
					<div class="panel-body" id="{{$question->q_id}}">
					<form method="post" action="approval">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<input type="hidden" name="app_id" value="{{ $question->q_id }}">
					@if ( $question->published === 0 )
						<button class="icons_green" name="publish"  id="publish" value="publish">Publish</button>
					@endif
					<button class="icons_red" name="delete" id="delete" value="delete">Delete</button>
					</form>
					
					<form>
						{{ $question->question }}<br>
						<input type="hidden" name="q_id" value="{{ $question->q_id }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
  					</form>
  					<label>Yes:{{$question->yes}}</label>
  					<label>No:{{$question->no}}</label>
  					<label>Maybe:{{$question->other}}</label>
					</div>
				</div>
			@endforeach

	</div>
</div>
</div>
@endsection

@section('footer')
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-left">
				<li><a>Prasad Boyane Production</a>	</li>
				</ul>

			</div>
		</div>
	</nav>
@endsection


