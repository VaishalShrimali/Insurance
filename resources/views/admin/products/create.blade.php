@extends('layout/admin')

@section('title','Create Product')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Product</h1>
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
                            <a href="{{ url('admin/product') }}" class="btn btn-primary">Product List</a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{ route('product.insert') }}" method="post" autocomplete="off">
                            @csrf
                            <div class="card-body">
                                <div class="col-md-12 row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Product Name <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('p_name') is-invalid @enderror" name="p_name" value="{{old('p_name')}}" id="p_name" placeholder="Enter Product Name">
                                        @error('p_name')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    

                                    <div class="form-group col-md-6">
                                        <label for="password">Company <span style="color:red;">*</span></label>
                                        <select name="company" id="company" class="form-control @error('company') is-invalid @enderror" onchange="getcategors()">

                                            <option value="">Select Company</option>
                                           
                                            @foreach($company as $val)
                                            <option value="{{$val['company_id']}}">{{$val['company_name']}}</option>
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
                                        <input type="text" class="form-control @error('category') is-invalid @enderror" name="category" value="{{old('category')}}" id="category" placeholder="Enter category ">
                                        @error('category')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="name">Sub-Category <span style="color:red;">*</span></label>
                                        <input type="text" class="form-control @error('sub_cat') is-invalid @enderror" name="sub_cat" value="{{old('sub_cat')}}" id="sub_cat" placeholder="Enter sub_cat ">
                                        @error('sub_cat')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                   
                                    <div class="form-group col-md-6">
                                        <label for="name">Special Remark</label>
                                        <textarea name="remark" id="remark" cols="30" rows="1" class="form-control @error('remark') is-invalid @enderror" placeholder="Enter Remark"></textarea>
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
                $('#category').val(data.category);
                $('#sub_cat').val(data.sub_category);
            }
        });
    }
</script>

@endsection