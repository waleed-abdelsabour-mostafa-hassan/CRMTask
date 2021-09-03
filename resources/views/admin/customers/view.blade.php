@extends('admin.layout')
@section('title')
      {{$customer->name}}
@endsection
@section('content')
    <!-- Content -->
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <!-- breadcrumbs -->
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('customers') }}">customers</a>
                    </li>
                    <li class="active">
                       Show_customer
                    </li>
                </ol>
                <!-- end breadcrumbs -->
                <h1 class="page-header">{{$customer->name}}</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-sm-8">
                <div>
                    <h2 class="alert alert-info">Data</h2>
                    <table class="table table-striped table-bordered text-center">
                        <tr>
                            <th> customer_id</th>
                            <td>{{$customer->id}}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$customer->name}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$customer->address}}</td>
                        </tr>
                        <tr>
                            <th>customer_OwnerName</th>
                            <td>{{$customer->owner->name}}</td>
                        </tr>
                        <tr>
                            <th>customer_AssignedName</th>
                            <td>{{$customer->assigned->name}}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td><span class="badge badge-info">{{$customer->status()}}</span></td>
                        </tr>
                        
                    </table>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
    <!-- /#wrapper -->
    <!-- /Content -->
@endsection
