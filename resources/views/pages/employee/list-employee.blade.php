@extends('layout.app-layout')

@section('css')
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('assets/vendor/dropify/css/dropify.min.css')}}">
    <style>
        .dataTables_length{display: none;}
    </style>
@endsection

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Employee</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Oculux</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Employee</li>
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
                        <ul class="nav nav-tabs2">
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#e_add">Add</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#e_list">All Employee</a></li>
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
                        <div class="tab-content">
                            <div class="tab-pane show active" id="e_add">
                                <form method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-md-4 col-sm-6">
                                                <div class="form-group">                                   
                                                    <input type="text" class="form-control" placeholder="Employee ID" name="employee_id">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Name" name="name">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Email ID" name="email">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="form-group">
                                                    <input type="number" class="form-control" placeholder="Phone Number" name="phone">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="form-group">
                                                <input type="text" data-provide="datepicker" data-date-autoclose="true" class="form-control" placeholder="Start date *" name="start_date">
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-sm-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Role" name="role">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group mt-3 mb-5">
                                                    <input type="file" class="dropify" name="image" accept=".jpg, .jpeg, .png">
                                                    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Facebook" name="facebook">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">                                   
                                                    <input type="text" class="form-control" placeholder="Twitter" name="twitter">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Linkedin" name="linkedin">
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="instagram" name="instagram">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary">ADD</button>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="e_list">
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Employee ID</th>
                                                <th>Phone</th>
                                                <th>Join Date</th>
                                                <th>Role</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td class="w60">
                                                        <label class="fancy-checkbox">
                                                            <input class="checkbox-tick" type="checkbox" name="checkbox">
                                                            <span></span>
                                                        </label>
                                                        <img src="{{URL::asset('images/'.$item->image)}}" data-toggle="tooltip" data-placement="top" title="Avatar" alt="Avatar" class="w35 h35 rounded">
                                                    </td>
                                                    <td>
                                                        <div class="font-15">{{$item->name}}</div>
                                                        <span class="text-muted">{{$item->email}}</span>
                                                    </td>
                                                    <td><span>{{$item->employee_id}}</span></td>
                                                    <td><span>{{$item->phone}}</span></td>
                                                    <td>{{date('d M, Y', strtotime($item->created_at))}}</td>
                                                    <td>{{$item->role}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="{{URL::asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{URL::asset('assets/vendor/dropify/js/dropify.min.js')}}"></script>

<script src="{{URL::asset('assets/js/pages/ui/dialogs.js')}}"></script>
<script src="{{URL::asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{URL::asset('assets/js/pages/forms/dropify.js')}}"></script>
<script>
    $('.dataTable').dataTable({searching: false});
</script>
@endsection