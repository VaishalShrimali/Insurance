@extends('layout/admin')

@section('title','Create Company')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Company</h1>
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
                            <a href="{{ url('admin/companies/insert') }}" class="btn btn-primary">Company List</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('company.insert') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-12 row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Company Name <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('c_name') is-invalid @enderror" name="c_name" value="{{old('c_name')}}" id="c_name" placeholder="Enter First Name">
                                        @error('c_name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                   

                                    <div class="form-group col-md-6">
                                        <label for="email">Email address <span style="color:red;">*</span></label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}" id="email" placeholder="Enter email">
                                        @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Phone Number <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{old('phone')}}" id="phone" placeholder="Enter Phone Number">
                                        @error('phone')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="password">Category <span style="color:red;">*</span></label>
                                        <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" onchange="getsub_cat()">
                                            <option value="">Select Category</option>
                                            @foreach($category as $val)
                                            <option value="{{$val['category_id']}}">{{$val['category_ name']}}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <!-- <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                        @error('password')
                                         <p class="text-danger">{{ $message }}</p>
                                        @enderror -->
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="password">Sub-Category <span style="color:red;">*</span></label>
                                        <select name="sub_cat" id="sub_cat" class="form-control @error('sub_cat') is-invalid @enderror">

                                           
                                        </select>
                                        @error('sub_cat')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <!-- <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                                        @error('password')
                                         <p class="text-danger">{{ $message }}</p>
                                        @enderror -->
                                    </div>

                                    
                                </div>
                                <div class="col-md-12 row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Special Remark</label>
                                        <textarea name="remark" id="remark" cols="30" rows="4" class="form-control @error('remark') is-invalid @enderror" placeholder="Enter Remark"></textarea>
                                        @error('remark')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 row">

                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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

</script>

@endsection