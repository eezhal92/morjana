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
                
                <div class="row" style="margin-top: 120px;">
                    <div class="col-md-7 col-md-offset-1">
                        <h1>Welcome to Morowali Sarjana</h1>
                        <br>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus ipsa ducimus, at doloremque id, accusamus perferendis atque, reiciendis, quae molestias saepe natus. Laboriosam ad ea non quos pariatur consequuntur illo.</p>
                    </div>
                    <div class="col-md-3" style="background: #fff; padding: 20px 20px;">
                        {{ Form::open(['route' => 'account.authenticate']) }}
                            <div class="form-group">
                                <label for="">Email</label>
                                {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Your email goes here']) }}
                            </div>
                            <div class="form-group">
                               <label for="">Password</label>
                                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Your password goes here']) }}
                            </div>
                            <div class="form-group">
                                                                
                                {{ Form::checkbox('remember') }} <small>Remember me</small>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Log In">
                            <hr>
                            <a href="{{ route('account.getRemind') }}">I forgot my password</a>
                        {{ Form::close() }}
                    
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    {{ HTML::script('js/jquery.js') }}

    <!-- Bootstrap Core JavaScript -->
    {{ HTML::script('js/bootstrap.min.js') }}
    

</body>

</html>

   

   