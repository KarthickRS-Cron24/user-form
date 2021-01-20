<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>LoginPage</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class='row well'>
        <div class='col-md-12 text-right'>
            <div class='btn-group'>               
                <a href="/" class="btn btn-primary">Home</a>
                
            </div>
        </div>
        </div>
    </div>
    <div class="container">
        <div class='row justify-content-center'>
            <div class='col-md-2'></div>
            <div class="col-md-8">
                <div class="card well">
                    <div class="card-header text-center"><h2>Admin Login Here!!!!</h2></div>
                    <br><br>
                    <div class="card-body">
                        <form method="POST" action="/admin">
                            @csrf

                                                       
                            <div class="form-group row">
                                <label for="email" class="col-md-4 text-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email" value="{{ old('email') }}" type="text" name='email' class="form-control">
                                    <span style='color : red'>@error('email'){{$message}}@enderror</span><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 text-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" value="{{ old('password') }}" type="text" name='password' class="form-control">
                                    <span style='color : red'>@error('password'){{$message}}@enderror</span><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class='col-md-4'></div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>