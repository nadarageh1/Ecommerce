@extends('layouts.master')

@section('header')
    @parent
@endsection

@section('content')
<style type="text/css">
body{
  background-color: B7EBE5;
}
ul
{
    list-style-type: none;
}
</style>
<center>
<h1 style="font-size:30px">
  add category
</h1>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<ul>
  {{ Form::open(['url'=>'category/addcategory/']) }}
  <li>
 category_name {{ Form::text('name' ) }} <br><br>
</li>

<li>
{{Form::submit('save',  array('class' =>'btn btn-success ')) }}

</li>
</ul>
{{ Form::close() }}
@endsection


@section('footer')
    @parent
@endsection
