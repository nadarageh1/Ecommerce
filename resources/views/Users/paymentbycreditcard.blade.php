@include('link_boot')
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <p class=navbar-brand style="margin-left:500px" > payment by credit card </p>
    </div>
      <ul class="nav navbar-nav navbar-right">
        <li >
          <div class="navbar-brand">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
          </div>
     
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<style type="text/css">
body{
	background-color:#EBEEF4;
}
table{
  table-layout: fixed;
}
</style>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 <center>
 	{{ Form::open(['url'=>'Ecommerce/paymentbycreditcard']) }}
<table style="font-size:30px">
<tr>
  <td>
  Enter your credit card number 
  </td>
  <td>
  	{{ Form::text('number') }} 
  </td>
</tr>
<tr>
  <td>
  Enter your email
  </td>
  <td>
{{ Form::text('email')}}
  </td>
</tr>
<tr>
  <td>
    {{Form::submit('save',  array('class' =>'btn btn-primary')) }}
  </td>
</tr>
</table>

{{ Form::close() }}
</center>