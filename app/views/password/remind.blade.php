<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Morowali Sarjana App</title>

    <!-- Bootstrap Core CSS -->
    {{ HTML::style('css/bootstrap.min.css') }}
    <!-- Custom CSS -->
<!--    {{ HTML::style('css/sb-admin.css') }}-->
    {{ HTML::style('css/style.css') }}

    <!-- Custom Fonts -->
    {{ HTML::style('font-awesome/css/font-awesome.min.css') }}
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background: #ccc;">

    <div id="wrapper">


        <div id="page-wrapper">

            <div class="container-fluid">
        
                <div class="row">
                    @if(Session::has('status'))
                      <div class="alert alert-info">
                          {{ Session::get('status') }}
                      </div>
                    @elseif(Session::get('error'))
                        <div class="alert alert-danger">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    
                    <div class="row" style="margin-top: 120px;">
                        <div class="col-md-7 col-md-offset-1">
                            <h1>Forgot your password?</h1>
                            <br>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus ipsa ducimus, at doloremque id, accusamus perferendis atque, reiciendis, quae molestias saepe natus. Laboriosam ad ea non quos pariatur consequuntur illo.</p>
                        </div>
                        <div class="col-md-3" style="background: #fff; padding: 20px 20px;">
                            {{ Form::open(['route' => 'account.postRemind']) }}
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter your e-mail here']) }}
                                </div>
                                <input type="submit" class="btn btn-primary" value="Remind me!">
                                <hr>
                                <a href="{{ route('account.login') }}">Back to login page</a>
                            {{ Form::close() }}

                        </div>
                    </div>                  
                    
                </div>
           
            </div>

        </div>

    </div>

</body>