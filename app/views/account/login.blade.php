{{ Form::open(['route' => 'account.authenticate']) }}
    {{ Form::text('email', null, ['placeholder' => 'Your email goes here']) }}
    {{ Form::password('password', null, ['placeholder' => 'Your password goes here']) }}
    {{ Form::checkbox('remember') }}
    <input type="submit" value="log me in">
{{ Form::close() }}