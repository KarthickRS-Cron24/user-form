<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>HomePage</title>
    

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap.min.css">
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class='row well'>
            <div class="col-md-3">
              <h3>Hello Admin {{ Auth::user()->name }},</h3>  
            </div>
            <div class='col-md-9  text-right'>
                <div class='btn-group'>               
                    <a href="/" class="btn btn-primary">Home</a>
                    <a href="{{route('admin/logout')}}" class="btn btn-primary">Logout</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class='col-md-3'></div>
            <div class="col-md-6">
                <div class="card well">
                    <div class="card-header text-center"><h2>Admin Dashboard</h2></div>
                    <br><br>
                    <div class="card-body">                                                   
                        <h4>You are logged in!</h4>  
                    </div>
                    <div class='text-right'>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">
                    ADD
                    </button>
                    </div>
                </div>
            </div>
        </div>
        <div class='row' >
            <div class='col-md-1'></div>
            <div class='col-md-10 well'>
                <table class='table' id="datatable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>password</th>
                        <th>Date of Birth</th>
                        <th>Mobile No</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    @foreach($user_details as $user)
                    <tr>
                        
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->password}}</td>
                        <td>{{$user->dob}}</td>
                        <td>{{$user->phone}}</td>
                        <td><button class="btn btn-sm btn-info edit" data-toggle="modal" data-target="#updateModal">Edit</button> </td>
                        <td><a href="" class="btn btn-sm btn-danger delete">delete</a> </td>
                    </tr>
                    @endforeach
                    </tbody>
                    
                </table>
            </div>
        </div>
        <!-- Add Model -->
        <div>
            <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><h3>Add User Login Information</h3></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ url('admin/home') }}" method="POST" >
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 text-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" value="{{ old('name') }}" type="text" name='name' class="form-control">
                                    <span style='color : red'>@error('name'){{$message}}@enderror</span><br>
                                </div>
                            </div>
                            
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
                                <label for="confirmPassword" class="col-md-4 text-right">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="confirmPassword" value="{{ old('confirmPassword') }}" type="text" name='confirmPassword' class="form-control">
                                    <span style='color : red'>@error('confirmPassword'){{$message}}@enderror</span><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dob" class="col-md-4 text-right">Date Of Birth</label>

                                <div class="col-md-6">
                                    <input id="dob" type="text" value="{{ old('dob') }}" name='dob' class="form-control">
                                    <span style='color : red'>@error('dob'){{$message}}@enderror</span><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone" class="col-md-4 text-right">Mobile No</label>

                                <div class="col-md-6">
                                    <input id="phone" type="text" value="{{ old('phone') }}" name='phone' class="form-control">
                                    <span style='color : red'>@error('phone'){{$message}}@enderror</span><br>
                                </div>
                            </div>   
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">ADD</button>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Model -->
        <div>
            <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><h3>Update User Login Information</h3></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <form action="admin/update/" method="POST" id="editform">
                            @csrf

                            <div class="form-group row">
                                <label for="name1" class="col-md-4 text-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name1" type="text" name='name1' class="form-control">
                                    <span style='color : red'>@error('name1'){{$message}}@enderror</span><br>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="email1" class="col-md-4 text-right">Email</label>

                                <div class="col-md-6">
                                    <input id="email1" type="text" name='email1' class="form-control">
                                    <span style='color : red'>@error('email1'){{$message}}@enderror</span><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password1" class="col-md-4 text-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password1" type="text" name='password1' class="form-control">
                                    <span style='color : red'>@error('password1'){{$message}}@enderror</span><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="confirmPassword1" class="col-md-4 text-right">Confirm Password</label>

                                <div class="col-md-6">
                                    <input id="confirmPassword1" type="text" name='confirmPassword1' class="form-control">
                                    <span style='color : red'>@error('confirmPassword1'){{$message}}@enderror</span><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="dob1" class="col-md-4 text-right">Date Of Birth</label>

                                <div class="col-md-6">
                                    <input id="dob1" type="text" name='dob1' class="form-control">
                                    <span style='color : red'>@error('dob1'){{$message}}@enderror</span><br>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="phone1" class="col-md-4 text-right">Mobile No</label>

                                <div class="col-md-6">
                                    <input id="phone1" type="text" name='phone1' class="form-control">
                                    <span style='color : red'>@error('phone1'){{$message}}@enderror</span><br>
                                </div>
                            </div>   
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Update</button>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
           
            var table = $('#datatable').DataTable(); 
            table.on('click','.edit',function()
            {
                $tr=$(this).closest('tr');
                if($($tr).hasClass('child')){
                    $tr=$tr.prev('.parent');
                }
                var data=table.row($tr).data();
                console.log(data);
                $('#name1').val(data[1]);
                $('#email1').val(data[2]);
                $('#password1').val(data[3]);
                $('#confirmPassword1').val(data[3]);
                $('#dob1').val(data[4]);
                $('#phone1').val(data[5]);

                $('#editform').attr('action','/admin/update/'+data[0]);
                $('#updateModal').model('show');
            });
            table.on('click','.delete',function()
            {
                $tr=$(this).closest('tr');
                if($($tr).hasClass('child')){
                    $tr=$tr.prev('.parent');
                }
                var data=table.row($tr).data();
                console.log(data[0]);
                $(this).attr('href','/admin/delete/'+data[0]);
            }
            );
            
        });
    </script>
</body>
</html>