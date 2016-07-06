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
  add product
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
  {{ Form::open(['url'=>'product/addproduct', 'files'=>true ]) }}
   

  <li>
 product_title      {{ Form::text('title' ) }} <br>
</li>
 <li>
 product_description{{ Form::textarea('description') }}<br>
</li>
       <script >
             CKEDITOR.replace( 'description' );
             CKEDITOR.on('instanceLoaded', function(e) {e.editor.resize(400, 250)} );
        </script>

 <li>
 product_price      {{ Form::text('price',null,['size'=>'10×10']) }} <br>
</li>
 <li>
 category_name  {{ Form::select('category', $category )}} <br>
</li>

<li>
  {{  Form::file('image') }} <br>
</li>

<li>
{{Form::submit('save',  array('class' =>'btn btn-primary')) }}
</li>
</ul>
{{ Form::close() }}
@endsection


@section('footer')
    @parent
@endsection






