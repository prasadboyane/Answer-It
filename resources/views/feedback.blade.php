@extends('app')

@section('content')
<link href="{{ asset('/css/feedback.css') }}" rel="stylesheet">
<div class="container">  
  <form id="contact" action="done_feedback" method="post">
    <h3><b>Feedback Form</b></h3>
    <h4>Suggestions are always welcome !</h4>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <fieldset>
      <input placeholder="Your name" name="name" type="text" tabindex="1" required autofocus >
    </fieldset>
    <fieldset>
      <input placeholder="Your Email Address" name="email" type="email" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Your Phone Number (optional)" name ="phone" type="tel" tabindex="3" >
    </fieldset>
    <fieldset>
      <input placeholder="Your Web Site (optional)" name="website" type="text" tabindex="4" >
    </fieldset>
    <fieldset>
      <textarea placeholder="Type your message here...." name="msg" tabindex="5" required></textarea>
    </fieldset>
    <fieldset>
      <input type="submit" name="submit" type="submit" id="contact-submit" >
    </fieldset>
    <p class="copyright">Thank you </p>
  </form>
</div>
@endsection