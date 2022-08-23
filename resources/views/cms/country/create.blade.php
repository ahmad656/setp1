@extends('cms.parent')

@section('title' , 'Create Country')

@section('main_title' , 'Add Country')

@section('sub_title' , 'Create Country')
@section('styles')
@endsection
@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Create Countries's Data</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form>
      <div class="card-body">
        <div class="form-group">
          <label for="country">Country Name</label>
          {{--  --}}
          <input type="text" class="form-control" id="country" name="country" {{--<-column name --}} placeholder="Enter Country">
        </div>
        <div class="form-group">
          <label for="code">Code of Country</label>
          <input type="text" class="form-control" id="code" name="code" placeholder="Enter Code Name">
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button id="btnC" onclick="performStore()" type="button" class="btn btn-primary">Store</button>
        <a href="{{route ('countries.index')}}" type="submit" class="btn btn-success">back</a>
      </div>
    </form>
  </div>
@endsection
@section('scripts')
<script>
  function performStore(){
    let formData = new FormData;
    formData.append('country', document.getElementById('country').value);
    formData.append('code', document.getElementById('code').value);
    store('/cms/admin/countries', formData);
  }
</script>

{{--  سكربت تفريغ الحقول بعد التخزين--}}
<script>
  const btn = document.getElementById('btnC');

btn.addEventListener('click', function handleClick(event) {
  // 👇️ if you are submitting a form
  event.preventDefault();

  const inputs = document.querySelectorAll('#country, #code');

  inputs.forEach(input => {
    input.value = '';
  });
});
</script>
@endsection
