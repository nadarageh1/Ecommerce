@extends('layouts.master')

@section('header')
    @parent
@endsection

@section('content')
<style type="text/css">
body{
  background-color: E8E2E2;
}
ul
{
    list-style-type: none;
    table-layout: fixed;
}
  
</style>
<center>
<h1 style="font-size:30px">
  Add users
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
  {{ Form::open(['url'=>'login/addusers']) }}
  <li>
 user_name {{ Form::text('name' ) }} <br><br>
</li>

 <li>
 Email     {{ Form::email('email' ) }} <br><br>
</li>

<li>
 password {{ Form::password('password') }} <br><br>
      
</li>
<li>
 repeate-password {{ Form::password('password') }} <br><br>
      
</li>


<li>
          {{ Form::select('kind', ['Admin'=>'Admin', 'User'=>'User']) }} <br><br>
</li>

<li>
{{Form::submit('Add',  array('class' =>'btn btn-primary ')) }}

</li>
</ul>
{{ Form::close() }}
@endsection


@section('footer')
    @parent
@endsection


