@extends('layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-4 mt-3">
        <div class="col-sm-6">
          <h1>Tag List</h1>
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
          <h3 class="card-title">Create Tag</h3>
          <a href="{{route('tag.create')}}" class="btn btn-primary ml-auto">Create Tag</a> 
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
              @if ($tags->count() > 0)
                @foreach ($tags as $tagitem)
                <tr>
                  <td>{{$tagitem->id}}</td>
                  <td>{{$tagitem->name}}</td>
                  <td>{{$tagitem->slug}}</td>
                  <td>{{$tagitem->id}}</td>
                  <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <a href="{{route('tag.edit', [$tagitem->id])}}" type="button" class="btn btn-sm btn-primary py-2"><i class="fas fa-edit"></i></a>
                      <form action="{{route('tag.destroy', [$tagitem->id])}}" class="btn btn-sm btn-danger" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger p-0"><i class="fas fa-trash"></i></button>
                      </form>
                      {{-- <a href="{{route('tag.show', [$tagitem->id])}}" class="btn btn-sm btn-success py-2"><i class="fas fa-eye"></i></a> --}}
                    </div>
                  </td>
                </tr> 
              @endforeach
              @else
                <tr>
                  <td colspan="5"><h5 class="text-center mb-0 py-2">No more found</h5></td>
                </tr>
              @endif
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
    </div><!-- /.container-fluid -->
  </div>

@endsection