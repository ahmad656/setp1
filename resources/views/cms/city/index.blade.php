@extends('cms.parent')

@section('title' , 'Index City')

@section('main_title' , 'City')

@section('sub_title' , 'City Data')
@section('styles')
@endsection
@section('content')

<div class="card">
  <div class="card-header">
    {{-- <h3 class="card-title">Data of City</h3> --}}
    <a href="{{route ('cities.create')}}" type="submit" class="btn btn-success">Create New City</a>
    
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
          <th>Street</th>
          <th>City</th>
          <th>Create Date</th>
          <th>Settings</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cities as $city)
          <tr>
            <td>{{$city->id}}</td>
            <td>{{$city->country->country}}</td>
            <td>{{$city->city}}</td>
            <td>{{$city->street}}</td>
            <td>{{$city->created_at}}</td>
            <td><div class="btn-group">
              <a href="{{route ('cities.edit', $city->id)}}" type="button" class="btn btn-primary">Edit</a>
            <form action="{{route('cities.destroy' , $city->id)}}" method="POSt">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
              <a type="button" class="btn btn-info">Show</a>
            
            </div></td>
          </tr>    
      
        @endforeach

      </tbody>
    </table>
  </div>
  {{$cities->links()}}
  <!-- /.card-body -->
</div>
@endsection
@section('scripts')
@endsection


