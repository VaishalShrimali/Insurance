@extends('layout/admin')

@section('title','Product List')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Product List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header text-right">
              <a href="{{ url('admin/product/create') }}" class="btn btn-primary">Add Product</a>
            </div>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>SR No</th>
                    <th>Product Name</th>
                    <th>Company</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  @foreach($product as $val)
                  <tr>
                    <td>{{ $i }}</td>
                    <td>{{$val['product_name']}}</td>
                    <td>{{$val['company_name']}}</td>
                    <td>{{$val['category']}}</td>
                    <td>{{$val['sub_cat']}}</td>   
                    <td>
                      <a href="{{ url('admin/product/edit/'.$val['product_id']) }}" class="btn btn-sm btn-warning">Edit</a>
                      <a href="{{ url('admin/product/delete/'.$val['product_id']) }}" onclick="return confirm('Are you sure you want to delete this user?')" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                  </tr>
                  <?php $i++ ?>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>


@endsection