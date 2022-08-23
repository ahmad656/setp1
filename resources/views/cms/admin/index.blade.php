@extends('cms.parent')

@section('title' , 'Index Admin')

@section('main_title' , 'Admin')

@section('sub_title' , 'Admin Data')
@section('styles')
@endsection
@section('content')

<div class="card">
  <div class="card-header">
    {{-- <h3 class="card-title">Data of Admin</h3> --}}
    <a href="{{route ('admins.create')}}" type="submit" class="btn btn-success">Create New Admin</a>
    
    <div class="card-tools">
      <div class="input-group input-group-sm" style="width: 150px;">
        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

        <div class="input-group-append">
          <button type="submit" class="btn btn-default">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>ID</th>
          <th>First Name</th>
          <th>Last Nmae</th>
          <th>Email</th>
          <th>Gender</th>
          <th>status</th>
          <th>mobile</th>
          <th>image</th>
          <th>Gender</th>
          <th>settings</th>

        </tr>
      </thead>
      <tbody>
        @foreach($admins as $admin)
          <tr>
            <td>{{$admin->id}}</td>
            <td>{{$admin->user ? $admin->user->firstname : 'Not Found'}}</td>
            <td>{{$admin->user ? $admin->user->lastname : 'Not Found'}}</td>
            <td>{{$admin->email}}</td>
            <td>{{$admin->user ? $admin->user->gender : 'Not Found'}}</td>
            <td>{{$admin->user ? $admin->user->status : 'Not Found'}}</td>
            <td>{{$admin->user ? $admin->user->mobile : 'Not Found'}}</td>
            <td>{{$admin->user ? $admin->user->image : 'Not Found'}}</td>
            <td><div class="btn-group">
              <a href="{{route ('admins.edit', $admin->id)}}" type="button" class="btn btn-primary">Edit</a>
              <a href="#" onclick="performDestroy({{$admin->id}},this)" type="button" class="btn btn-danger">Delete</a>
              <button type="button" class="btn btn-info">Show</button>
            
            </div></td>
          </tr>    
      
        @endforeach

      </tbody>
    </table>
  </div>
  {{-- {{ $admins->links() }} --}}
  <!-- /.card-body -->
</div>
@endsection
@section('scripts')
<script>
  function performDestroy(id , referance){
    let url='/cms/admin/admins/'+id;
    confirmDestroy(url, referance)
  }
</script>
@endsection


