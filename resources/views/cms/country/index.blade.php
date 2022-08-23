@extends('cms.parent')

@section('title' , 'Index Country')

@section('main_title' , 'Country')

@section('sub_title' , 'Country Data')
@section('styles')
@endsection
@section('content')

<div class="card">
  <div class="card-header">
    {{-- <h3 class="card-title">Data of Country</h3> --}}
    <a href="{{route ('countries.create')}}" type="submit" class="btn btn-success">Create New Country</a>
    
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
          <th>Country</th>
          <th>code</th>
          <th>Create Date</th>
          <th>Settings</th>
        </tr>
      </thead>
      <tbody>
        @foreach($countries as $country)
          <tr>
            <td>{{$country->id}}</td>
            <td>{{$country->country}}</td>
            <td>{{$country->code}}</td>
            <td>{{$country->created_at}}</td>
            <td><div class="btn-group">
              <a href="{{route ('countries.edit', $country->id)}}" type="button" class="btn btn-primary">Edit</a>
              <a  onclick="performDestroy({{$country->id}},this)" type="button" class="btn btn-danger">Delete</a>
              <button type="button" class="btn btn-info">Show</button>
            
            </div></td>
          </tr>    
      
        @endforeach

      </tbody>
    </table>
  </div>
  {{ $countries->links() }}
  <!-- /.card-body -->
</div>
@endsection
@section('scripts')
<script>
  function performDestroy(id , referance){
    let url='/cms/admin/countries/'+id;
    confirmDestroy(url, referance)
  }
</script>
@endsection


