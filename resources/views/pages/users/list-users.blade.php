@extends('layout.app-layout')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Users</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Oculux</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                            </ol>
                        </nav>
                    </div>            
                    <div class="col-md-6 col-sm-12 text-right hidden-xs">
                        <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create Campaign</a>
                     
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Users">Users</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#addUser">Add User</a></li>        
                        </ul>
                        @if ($errors->any())
                            <div class="alert alert-danger mt-3">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(session()->has('success'))
                        <div class="alert alert-success alert-dismissible mt-3" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <i class="fa fa-check-circle"></i> {{Session::get('success')}}
                        </div>
                        @endif
                        @if(session()->has('danger'))
                        <div class="alert alert-danger alert-dismissible mt-3" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            <i class="fa fa-times-circle"></i> {{Session::get('danger')}}
                        </div>
                        @endif
                        
                        <div class="tab-content mt-0">
                            <div class="tab-pane show active" id="Users">
                                <div class="table-responsive">
                                    <table class="table table-hover table-custom spacing8">
                                        <thead>
                                            <tr>
                                                <th class="w60">Name</th>
                                                <th></th>
                                                <th></th>
                                                <th>Created Date</th>
                                                <th>Role</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td class="width45">
                                                        <div class="avtar-pic w35 bg-pink" data-toggle="tooltip" data-placement="top" title="Avatar Name"><span>{{mb_substr($item->name, 0, 1)}}</span></div>
                                                    </td>
                                                    <td>
                                                        <h6 class="mb-0">{{$item->name}}</h6>
                                                        <span>{{$item->email}}</span>
                                                    </td>
                                                    <td><span class="badge badge-danger">{{$item->role}}</span></td>
                                                    <td>{{date('d M, Y', strtotime($item->created_at))}}</td>
                                                    <td>{{$item->role}}</td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>                
                                </div>
                            </div>
                            <div class="tab-pane" id="addUser">
                                <form method="POST">
                                    @csrf
                                    <div class="body mt-2">
                                        <div class="row clearfix">
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="firstName" placeholder="First Name *" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
                                                </div>
                                            </div>
                
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="email" placeholder="Email ID *" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="password" placeholder="Password" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="phone" placeholder="Mobile No" required>
                                                </div>
                                            </div>                            
                
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="employee_id" placeholder="Employee ID *" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <div class="form-group">                                   
                                                    <input type="text" class="form-control" name="username" placeholder="Username *" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-4 col-sm-12">
                                                <div class="form-group">
                                                    <select class="form-control show-tick" name="role" required>
                                                        <option value="">Select Role Type</option>
                                                        <option value="Super Admin">Super Admin</option>
                                                        <option value="Admin">Admin</option>
                                                        <option value="HR Admin">HR Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                
                                            <div class="col-12">
                                                <h6>Module Permission</h6>
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Read</th>
                                                                <th>Write</th>
                                                                <th>Delete</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Super Admin</td>
                                                                <td>
                                                                    <label class="fancy-checkbox">
                                                                        <input class="checkbox-tick" type="checkbox" name="checkbox" checked>
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <label class="fancy-checkbox">
                                                                        <input class="checkbox-tick" type="checkbox" name="checkbox" checked>
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <label class="fancy-checkbox">
                                                                        <input class="checkbox-tick" type="checkbox" name="checkbox" checked>
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Admin</td>
                                                                <td>
                                                                    <label class="fancy-checkbox">
                                                                        <input class="checkbox-tick" type="checkbox" name="checkbox" checked>
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <label class="fancy-checkbox">
                                                                        <input class="checkbox-tick" type="checkbox" name="checkbox" checked>
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <label class="fancy-checkbox">
                                                                        <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Employee</td>
                                                                <td>
                                                                    <label class="fancy-checkbox">
                                                                        <input class="checkbox-tick" type="checkbox" name="checkbox" checked>
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <label class="fancy-checkbox">
                                                                        <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <label class="fancy-checkbox">
                                                                        <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>HR Admin</td>
                                                                <td>
                                                                    <label class="fancy-checkbox">
                                                                        <input class="checkbox-tick" type="checkbox" name="checkbox" checked>
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <label class="fancy-checkbox">
                                                                        <input class="checkbox-tick" type="checkbox" name="checkbox" checked>
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                                <td>
                                                                    <label class="fancy-checkbox">
                                                                        <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                                        <span></span>
                                                                    </label>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <button type="submit" class="btn btn-primary">Add</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection