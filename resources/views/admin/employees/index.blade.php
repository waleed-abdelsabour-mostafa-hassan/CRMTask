@extends('admin.layout')
@section('title')
    Employees
@endsection
@section('content')
    <!-- Content -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- breadcrumbs -->
                <ol class="breadcrumb" style="background-color: #fff">
                    <li>
                        <a href="{{ url('home') }}">Home</a>
                    </li>
                    <li class="active">
                        الموظفين
                    </li>
                </ol>
                <!-- end breadcrumbs -->
                <h1 class="page-header">Employees
                    <a href="{{route('employees.create')}}" class="btn btn-success pull-left" role="button">
                    AddNew <i class="fa fa-plus"></i>
                    </a>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                            Employees
                        <div class="pull-left">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    {{ count($users) }}  Employee
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            @if ($users->count() == 0)
                                <div class="alert alert-info">
                                    <h2 class="text-center">No_Employees_added Until Now</h2>
                                </div>
                            @else
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>OwnerName</th>
                                            <th> customer_AssignedName</th>
                                            <th style="width: 150px">Choises</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                            <tr class="odd gradeX">
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->ownerCustomers->count()}}</td>
                                                <td>{{$user->assignedCustomers->count()}}</td>
                                                <td class="actions">
                                                    <a href="{{route('employees.edit',$user->id)}}"
                                                        class="btn btn-warning btn-sm" role="button"> Update
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm" role="button"
                                                        data-delete="{{route('employees.delete',$user->id)}}"> Delete
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
    <!-- /#wrapper -->
    <!-- /Content -->
@endsection
