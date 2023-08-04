@extends('layout.app-layout')

@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h1>Departments</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Oculux</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Departments</li>
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
                            <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#e_departments">Departments</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#e_add">Add</a></li>                
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
                            <div class="tab-pane" id="e_add">
                                <form method="POST">
                                    @csrf
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="form-group">                                    
                                                    <input type="text" class="form-control" placeholder="Departments Name" name="departements_name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">                                    
                                                    <input type="text" class="form-control" placeholder="Departments Head" name="departements_head" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">                                    
                                                    <input type="number" class="form-control" placeholder="No of Employee" name="number_of_employee" required>
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
                            <div class="tab-pane show active" id="e_departments">
                                <div class="table-responsive">
                                    <table class="table table-hover js-basic-example dataTable table-custom spacing5 mb-0">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Department Name</th>
                                                <th>Department Head</th>
                                                <th>Total Employee</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $key => $item)
                                                <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td><div class="font-15">{{$item->departements_name}}</div></td>
                                                    <td>{{$item->departements_head}}</td>
                                                    <td>{{$item->number_of_employee}}</td>
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