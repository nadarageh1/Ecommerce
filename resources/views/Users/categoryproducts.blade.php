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
      <p class= navbar-brand style="margin-left:500px; word-spacing:30px; font-size:30px"> products 
      </p>
    </div>
      <ul class="nav navbar-nav navbar-right">
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
 
  @foreach ($products_category->chunk(4) as $productChunk) 
<table>
  <div class="row" >
    @foreach($productChunk as $product)
     {{ Form::open(['url'=>'Ecommerce/addtocart/'.$product->id]) }}
  <div class="col-sm-6 col-sm-3" >
    <div style="margin-left:50px">
       {{ Html::image($product->product_pic, 'a picture', array('height'=>'200px','width'=>'200px')) }}
      <div>
        {!!$product->description!!} 
     </div>
      <div>{{ $product->price }}
      </div>
        <div  class="pull-right"> 
        {{Form::submit('Add to cart',['class' =>'btn btn-success ','onclick'=>"alert('check your shopping cart')"]) }}</div>
      </div>
  </div>
  @endforeach
</div>
</table>
@endforeach 
{{ Form::close() }}
{{ $products_category->render() }}




