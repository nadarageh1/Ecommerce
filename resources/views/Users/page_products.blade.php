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
       @foreach ($categories as $category) 
  <a href="#" style="font-size:30px; word-spacing: 30px;margin-left:50px" class="navbar-brand">
{{ Html::linkAction('EcommerceController@getCategoryProducts',$category->name,$category->id,['class'=>'navbar-brand',
'margin-left'=>'50px','word-spacing'=>'30px','font-size'=>'30px']) }}
   @endforeach
    </div>
      <ul class="nav navbar-nav navbar-right">
        <li >
          <div class="navbar-brand">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
         {{ Html::linkAction('EcommerceController@getShoppingcart', 'Shopping cart','', '') }} 
          </div>
     
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<style type="text/css">
body{
	background-color:  #DCDCDC;
}
table{
  table-layout: fixed;
}
</style>
<body>
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
  @foreach ($products->chunk(4) as $productChunk) 
<table>
  <div class="row" >
    @foreach($productChunk as $product)
 {{ Form::open(['method'=>'GET'])}}
  <div class="col-sm-6 col-sm-3" >
    <div style="margin-left:50px">
   <div> {{ Html::image($product->product_pic, 'a picture', array('height'=>'200px',
    'width'=>'200px')) }} </div>
    <div>
        {!!$product->description!!} 
     </div>
      <div>{{ $product->price }}
      </div>
        <div  class="pull-right"> 
 {{ Html::linkAction('EcommerceController@getAddtocart', 'Add to cart',$product->id, 
 array('class' => 'btn btn-success','onclick'=>"alert('check your shopping cart')")) }}  
      </div>
      </div>
  </div>
  @endforeach
</div>
</table>
@endforeach 
  {{ Form::close() }} 
 
{{ $products->render() }}

</body>






