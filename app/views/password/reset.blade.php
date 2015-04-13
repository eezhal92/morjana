@if(Session::get('error'))
  {{ Session::get('error') }}
@endif
   

<form action="{{ route('account.postReset') }}" method="POST">
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email">
    <input type="password" name="password">
    <input type="password" name="password_confirmation">
    <input type="submit" value="Reset Password">
</form>