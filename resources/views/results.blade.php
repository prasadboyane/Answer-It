@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Results for {{ $search_val }}:</div>
		</div>
		<script type="text/javascript">alert('hello');</script>
			@foreach($result1 as $result)
				<div class="panel panel-default">
					<div class="panel-body">
						<label>{{ $result->name }}&nbsp;&nbsp;&nbsp;&nbsp;{{ $result->username }}</label>
  					<a href="{{ url('visitor/'.$result->username) }}" >Visit</a>
					</div>
				</div>
			@endforeach
			@foreach($result2 as $result)
				<div class="panel panel-default">
					<div class="panel-body">
						<label class="col-md-5">{{ $result->username }}</label>
						<a href="{{url('visitor/'.$result->username )}}" >Visit</a>
  					
					</div>
				</div>
			@endforeach
	</div>
</div>
</div>
@endsection