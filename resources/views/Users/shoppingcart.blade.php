@include('link_boot')
<nav class="navbar navbar-default">
  <div class="container-fluid">
  
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div style="margin-left:500px;font-size:30px">
         <i class="fa fa-shopping-cart" aria-hidden="true">  Shopping cart</i>
      </div>
    </div>
      <ul class="nav navbar-nav navbar-right">
           </ul>
    </div><!-- /.navbar-collapse-->
  </div><!-- /.container-fluid-->
</nav>
<style type="text/css">
body{
	background-color:#EBEEF4;
}
</style>
<body > 
  <center>
    @foreach($products as $product)

  <table border="1">
    <tr>
      <th>  id   </th>
      <th> name   </th>
      <th> quantity</th>
      <th>  price  </th>
      <th>  image  </th>
    </tr>

<tr>
  <td>
    {{ $product->id }}
</td>
<td>
   {{ $product->name }}
</td>
<td>
  {{ $product->qty}}
</td>
<td>
  {{ $product->price}}
 </td>
  <td>
   {{ Html::image($product->options->image, 'a picture', array('height'=>'200px','width'=>'200px')) }}
  </td>
  <tr>

  </table>
@endforeach 
  
   <div > 
 {{ Html::linkAction('EcommerceController@getRemovecart','remove all the cart','',array('class' => 'btn btn-danger')) }}  
     {{ Html::linkAction('EcommerceController@getSubmitShopping', 'submit the cart','', array('class' => 'btn btn-primary')) }} 
  </div>
</center>

</body>

@foreach($products as $product)
{{ $product->options->size }}
@endforeach