@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-4 mt-3">
        <div class="col-sm-6">
          <h1>Category List</h1>
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
          <a href="{{route('category.create')}}" class="btn btn-primary ml-auto">Create Category</a> 
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          
          <table class="table table-striped">
            <thead>
              <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Post Counnt</th>
                <th style="width: 40px;">Actiont</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($categores as $catitem)
                <tr>
                  <td>{{$catitem->id}}</td>
                  <td>{{$catitem->name}}</td>
                  <td>{{$catitem->slug}}</td>
                  <td>{{$catitem->id}}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="{{route('category.edit', [$catitem->id])}}" type="button" class="btn btn-sm btn-primary py-2"><i class="fas fa-edit"></i></a>
                      <form action="{{route('category.destroy', [$catitem->id])}}" class="btn btn-sm btn-danger" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger p-0"><i class="fas fa-trash"></i></button>
                      </form>
                      {{-- <a href="{{route('category.show', [$catitem->id])}}" class="btn btn-sm btn-success py-2"><i class="fas fa-eye"></i></a> --}}
                    </div>
                  </td>
                </tr> 
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div><!-- /.container-fluid -->
  </div>

@endsection