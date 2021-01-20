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
              <h3>Hello {{ Auth::user()->name }},</h3>  
            </div>
            <div class='col-md-9  text-right'>
                <div class='btn-group'>               
                    <a href="/" class="btn btn-primary">Home</a>
                    <a href="/logout" class="btn btn-primary">Logout</a>
                </div>
            </div>

        </div>
        <div class="row">
            <div class='col-md-3'></div>
            <div class="col-md-6">
                <div class="card well">
                    <div class="card-header text-center"><h2>Dashboard</h2></div>
                    <br><br>
                    <div class="card-body">                                                   
                        <h4>You are logged in!</h4>  
                    </div>
                    <div class='text-right'>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    ADD
                    </button>
                    </div>
                </div>
            </div>
        </div class='row well'>
            <div class='col-md-4'></div>
            <div class="col-md-4">
                         
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><h3>TITLE & DESCRIPTION</h3></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ url('home') }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 text-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" value="{{ old('title') }}" type="text" name='title' class="form-control">
                                <span style='color : red'>@error('title'){{$message}}@enderror</span><br>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 text-right">Description</label>

                            <div class="col-md-6">
                                <input id="description" value="{{ old('description') }}" type="text" name='description' class="form-control">
                                <span style='color : red'>@error('description'){{$message}}@enderror</span><br>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date1" class="col-md-4 text-right">Date</label>

                            <div class="col-md-6">
                                <input id="date"  value="{{ old('date') }}" type="text" name='date' class="form-control">
                                <span style='color : red'>@error('date'){{$message}}@enderror</span><br>
                            </div>
                        </div>

                        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add</button>
                       </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 well">
                <table class="table" id="datatable">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                   <tbody>
                   @foreach($info as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value['title']}}</td>
                        <td>{{$value->description}}</td>
                        <td>{{$value->date}}</td>
                        <td>
                            <a href="" class="btn btn-sm btn-info edit" data-toggle="modal" data-target="#updateModal">Update</a>
                            
                        </td>
                        <td><a href='#' class="btn btn-sm btn-danger delete">Delete</a></td>
                    </tr>
                    @endforeach
                   </tbody>
                </table>
            </div>
        </div>
        <!-- Update Model -->
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><h3>Update TITLE & DESCRIPTION</h3></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form action="/home/update/" method="POST" id="editform">
                @csrf

                <div class="form-group row">
                    <label for="title1" class="col-md-4 text-right">Title</label>

                    <div class="col-md-6">
                        <input id="title1"  type="text" name='title1' class="form-control">
                        <span style='color : red'>@error('title1'){{$message}}@enderror</span><br>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="description1" class="col-md-4 text-right">Description</label>

                    <div class="col-md-6">
                        <input id="description1" type="text" name='description1' class="form-control">
                        <span style='color : red'>@error('description'){{$message}}@enderror</span><br>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="date1" class="col-md-4 text-right">Date</label>

                    <div class="col-md-6">
                        <input id="date1" type="text" name='date1' class="form-control">
                        <span style='color : red'>@error('date1'){{$message}}@enderror</span><br>
                    </div>
                </div>

                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#date").datepicker({ dateFormat: 'yy-mm-dd'});
            var table = $('#datatable').DataTable(); 
            table.on('click','.edit',function()
            {
                $tr=$(this).closest('tr');
                if($($tr).hasClass('child')){
                    $tr=$tr.prev('.parent');
                }
                var data=table.row($tr).data();
                console.log(data[0]);
                $('#title1').val(data[1]);
                $('#description1').val(data[2]);
                $('#date1').val(data[3]);

                $('#editform').attr('action','/home/update/'+data[0]);
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
                $(this).attr('href','/home/delete/'+data[0]);
            }
            );
            
        });
    </script>
</body>
</html>