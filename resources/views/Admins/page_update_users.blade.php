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
}
</style>
<center>
<h1 style="font-size:30px">
  update user
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
  {{ Form::open(['url'=>'login/updateusers/'.$id]) }}
  <li>
 user_name {{ Form::text('name',$info_user->name ) }} <br><br>
</li>

 <li>
 Email     {{ Form::email('email',$info_user->email ) }} <br><br>
</li>


<li>
 new_password {{ Form::text('password') }} <br><br>
</li>
<li>
  @if($info_user->role == 1)
          {{ Form::select('kind', ['Admin'=>'Admin', 'User'=>'User']) }} <br><br>
      @else  
         {{ Form::select('kind', ['User'=>'User','Admin'=>'Admin']) }} <br><br>  
         @endif
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


