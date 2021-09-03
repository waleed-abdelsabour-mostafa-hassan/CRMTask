@extends('admin.layout')
@section('title')
customers
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
                    customers
                    </li>
                </ol>
                <!-- end breadcrumbs -->
                <h1 class="page-header">customers
                    <a href="{{route('customers.create')}}" class="btn btn-success pull-left" role="button">
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
                    ownerCustomers_added
                        <div class="pull-left">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    {{ count($ownCustomers) }}  customer
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            @if ($ownCustomers->count() == 0)
                                <div class="alert alert-info">
                                    <h2 class="text-center">No_OwnCustomers_added Until Now</h2>
                                </div>
                            @else
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>customer_id</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>customer_AssignedName</th>
                                            <th style="width: 150px">Choises</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ownCustomers as $customer)
                                            <tr class="odd gradeX">
                                                <td>{{$customer->id}}</td>
                                                <td>{{$customer->name}}</td>
                                                <td>{{$customer->address}}</td>
                                                <td><span class="badge badge-info">{{$customer->status()}}</span></td>
                                                <td>{{$customer->assigned->name}}</td>
                                               
                                                <td class="actions">
                                                    <a href="{{route('customers.view',$customer->id)}}"
                                                    class="btn btn-info btn-sm" role="button"> Show
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <a href="{{route('customers.edit',$customer->id)}}"
                                                        class="btn btn-warning btn-sm" role="button"> Update
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                    <a href="#" class="btn btn-danger btn-sm" role="button"
                                                    data-delete="{{route('customers.delete',$customer->id)}}"> Delete
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


        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    assignCustomers_added
                        <div class="pull-left">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    {{ count($assignCustomers) }}  customer
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            @if ($assignCustomers->count() == 0)
                                <div class="alert alert-info">
                                    <h2 class="text-center">No_assignCustomers_added Until Now</h2>
                                </div>
                            @else
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>customer_id</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>customer_AssignedName</th>
                                            <th style="width: 150px">Choises</th>
                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($assignCustomers as $customer)
                                            <tr class="odd gradeX">
                                                <td>{{$customer->id}}</td>
                                                <td>{{$customer->name}}</td>
                                                <td>{{$customer->address}}</td>
                                                <td><span class="badge badge-info">{{$customer->status()}}</span></td>
                                                <td>{{$customer->owner->name}}</td>
                                               
                                                <td class="actions">
                                                    <a href="{{route('customers.view',$customer->id)}}"
                                                        class="btn btn-info btn-sm" role="button"> Show
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    
                                                        <a href="{{route('customers.call',$customer->id)}}"
                                                            class="btn btn-success btn-sm" role="button"> Call
                                                        </a>
                                                    
                                                        <a href="{{route('customers.visit',$customer->id)}}"
                                                            class="btn btn-danger btn-sm" role="button"> FollowUp
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
@section('js')
    <script>
        $("[data-fresh]").on('click',function(e){
            e.preventDefault();
            var url=$(this).data('fresh');
            var codo=$(this).closest('td').children('input');
            /***/
            $.ajax({
                type: "GET",
                url: url,
                success: function(data) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: {{ __('pages.main.update_code_message') }},
                        showConfirmButton: false,
                        timer: 1500
                    })
                    codo.val(data.code);
                }
            })
        });
    </script>
@endsection
