@extends('layouts.master')

@section('header')
    @parent
@endsection

@section('content')
<style type="text/css">
body{
  background-color: DAEBDD;
}
ul
{
    list-style-type: none;
}
</style>
<center>
<h1 style="font-size:30px">
  update category
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
  {{ Form::open(['url'=>'category/updatecategory/'.$id]) }}
  <li>
 category_name {{ Form::text('name',$category->name ) }} <br><br>
</li>

<li>
{{Form::submit('update',  array('class' =>'btn btn-success ')) }}

</li>
</ul>
{{ Form::close() }}
@endsection


@section('footer')
    @parent
@endsection

