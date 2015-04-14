@if(Session::has('status'))
  {{ Session::get('status') }}
@elseif(Session::get('error'))
  {{ Session::get('error') }}
@endif
   
{{ Form::open(['route' => 'account.postRemind']) }}
    {{ Form::text('email', null, ['placeholder' => 'Enter your e-mail here']) }}
    <input type="submit" value="remind me!">
{{ Form::close() }}