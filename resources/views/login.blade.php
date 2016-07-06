 @include('link_boot')
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
      	<div style="float:right">
     {{ Html::linkAction('UserController@getSignup', 'register','', array('class' => 'btn btn-info')) }} 
     </div>
      </a>
    </div>
  </div>
</nav>
<style type="text/css">
body{
	background-color: #EBEEF4;
}
</style>
<center>
<h1 style="font-size:30px">
	To login
</h1>
{{ Form::open(['url'=>'login/users']) }}
{{ Form::email('email', '', array('class' => 'field','placeholder'=>'Email')) }}<br><br>
{{ Form::password('password',  array('class' => 'field','placeholder'=>'password')) }}<br><br>
{{Form::submit('login',  array('class' =>'btn btn-primary ')) }}
{{ Form::close() }}
</center>





