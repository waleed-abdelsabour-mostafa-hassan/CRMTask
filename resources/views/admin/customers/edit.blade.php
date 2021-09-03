@extends('admin.layout')
@section('title')
    Edit_customer
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
                            Edit_customer
                    </li>
                </ol>
                <!-- end breadcrumbs -->
                <h1 class="page-header"> Edit_customer : {{$customer->name}}</h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-xs-8">
                <form action="{{route('customers.update',$customer->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label class="col-xs-4 labelo"> Name :</label>
                        <input class="form-control col-xs-8 input-lg createpro"
                            name="name" placeholder=" الأسم بالكامل ..." value="{{$customer->name}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <h4 class="text-danger text-center col-xs-8 col-xs-offset-4">{{ $message }}</h4>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="col-xs-4 labelo"> Address :</label>
                        <input class="form-control col-xs-8 input-lg createpro"  name="address" placeholder=" العنوان ..." value="{{$customer->address}}" />
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <h4 class="text-danger text-center col-xs-8 col-xs-offset-4">{{ $message }}</h4>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label class="col-xs-4 labelo"> customer_AssignedName  :</label>
                        <select class="form-control col-xs-8 input-lg createpro selecton"
                                name="assigned_id" required>
                            <option value="">Choose_Admin</option>
                            @foreach(App\User::where([['type','admin'],['id','!=',Auth::user()->id]])->get() as $user)
                                <option value="{{ $user->id }}" {{($customer->assigned_id== $user->id)? 'selected':''}}>
                                    {{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="col-xs-6 btn btn-info btn-lg sumpo"> Save  <i class="fa fa-save"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
    <!-- /#wrapper -->
    <!-- /Content -->
@endsection

