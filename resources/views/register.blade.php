 @include('link_boot')
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
      	<div style="margin-left:500px; font-size:30px">
         Register
     </div>
      </a>
    </div>
  </div>
</nav>
<style type="text/css">
body{
	background-color:#EBEEF4;
}
ul
{
    list-style-type: none;
    table-layout: fixed;
}
</style>
<center>
<h1 style="font-size:30px">
	To register
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
  {{ Form::open(['url'=>'login/signup']) }}
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
{{Form::submit('sign up',  array('class' =>'btn btn-primary ')) }}
</li>
</ul>
{{ Form::close() }}
</center>





