@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-4 mt-3">
        <div class="col-sm-6">
          <h1>Create a Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('website')}}">Home</a></li>
            <li class="breadcrumb-item active">Starter Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
      <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between align-items-center">
          <h3 class="card-title">Create Category</h3>
          <a href="{{route('category.index')}}" class="btn btn-primary ml-auto">Go back to Category list</a> 
        </div>
        <form action="{{route('category.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <div class="card-body">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                            <div class="alert alert-danger fade show" role="alert">
                                {{$error}}
                                <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endforeach
                        @endif
                        <div class="form-group">
                          <label for="catname">Category Name</label>
                          <input type="text" name="catname" class="form-control" id="catname" placeholder="Category Name">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputPassword1">Description</label>
                          <textarea name="catdes" class="form-control" id="" cols="30" rows="10" placeholder="Description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
          </form>
      </div>
    </div><!-- /.container-fluid -->
  </div>

@endsection