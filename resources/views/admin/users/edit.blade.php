@extends('layout/admin')

@section('title','Edit Customer')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Customer</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">General Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card">
                        <div class="card-header text-right">
                            <a href="{{ url('admin/users') }}" class="btn btn-primary">Customers List</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('user.update') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-12 row">
                                    <input type="hidden" name="upd_id" value="{{$users[0]['id']}}">
                                    <div class="form-group col-md-6">
                                        <label for="name">First Name <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('f_name') is-invalid @enderror" name="f_name" value="{{old('f_name',$users[0]['first_name'])}}" id="f_name" placeholder="Enter First Name">
                                        @error('f_name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Last Name <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('l_name') is-invalid @enderror" name="l_name" value="{{old('l_name',$users[0]['last_name'])}}" id="l_name" placeholder="Enter Last Name">
                                        @error('l_name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- <div class="form-group col-md-6">
                                        <label for="email">Email address <span style="color:red;">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email',$users[0]['email'])}}" id="email" placeholder="Enter email">
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div> -->

                                    <div class="form-group col-md-6">
                                        <label for="name">Phone Number <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone',$users[0]['phone'])}}" id="phone" placeholder="Enter Phone Number">
                                        @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <!-- <div class="form-group col-md-6">
                                        <label for="name">Date of Birth <span style="color:red;">*</span></label>
                                        <input type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{old('dob',$users[0]['dob'])}}" id="phone" placeholder="DoB">
                                        @error('dob')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div> -->

                                    <div class="form-group col-md-6">
                                        <label for="name">Address <span style="color:red;">*</span></label>
                                        <textarea name="address" id="address" cols="30" rows="1" class="form-control @error('address') is-invalid @enderror" placeholder="Enter Address">{{$users[0]['address']}}</textarea>
                                        @error('address')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password">Company <span style="color:red;">*</span></label>
                                        <select name="company" id="company" class="form-control @error('company') is-invalid @enderror" onchange="getcategors()">

                                            <option value="">Select Company</option>
                                           
                                            @foreach($company as $val)
                                            <option <?php if($users[0]['company'] == $val['company_id']) { echo 'selected'; } ?> value="{{$val['company_id']}}">{{$val['company_name']}}</option>
                                            @endforeach
                                        </select>
                                        @error('company')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <!-- <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                        @error('password')
                                         <p class="text-danger">{{ $message }}</p>
                                        @enderror -->
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Category <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{old('category',$users[0]['category'])}}" id="category" placeholder="Enter category ">
                                        @error('category')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Sub-Category <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('sub_cat') is-invalid @enderror" name="sub_cat" value="{{old('sub_cat',$users[0]['sub_cat'])}}" id="sub_cat" placeholder="Enter sub_cat ">
                                        @error('sub_cat')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                   
                                    <div class="form-group col-md-6">
                                        <label for="name">Special Remark</label>
                                        <textarea name="remark" id="remark" cols="30" rows="1" class="form-control @error('remark') is-invalid @enderror" placeholder="Enter Remark">  {{$users[0]['remark']}} </textarea>
                                        @error('remark')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 row">
                                    
                                </div>

                                <div class="col-md-12 row">

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<script>
    function getsub_cat(){
        let id = $('#category').val();
        $.ajax({
            url : "{{url('/sub_cat')}}",
            method : 'GET',
            data : {
                id : id
            },
            success:function(data){
                // console.log(data)
                $('#sub_cat').html(data);
            }
        });
    }

    function getcategors(){
        let id = $('#company').val();
        // alert(id);
        $.ajax({
            url : "{{url('/getcategory')}}",
            method : 'GET',
            data : {
                id : id
            },
            dataType: "json",
            success:function(data){
                console.log(data);
                $('#category').val(data.category);
                $('#sub_cat').val(data.sub_category);
            }
        });
    }
</script>

@endsection