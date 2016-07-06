@extends('layouts.master')

@section('header')
    @parent
          <div class="form-inline" style="float:left" >
       {{ Form::open(['url'=>'product/searchproducts']) }}
       {{ Form::text('title','',['placeholder'=>'Search','id'=>'exampleInputAmount','class'=>'form-control']) }}
       {{Form::submit('search',  array('class' =>'btn btn-default ')) }}
       {{ Form::close() }}
            </div>
@endsection

@section('content')
    @parent
            <style type="text/css">
                body{
                    background-color: D3DCF5;
                }
                li
                {
                    list-style-type: none;

                }
                table{
                   float: right;
                    width: 800px;
                    height: 100px;
                    border: 4px solid gray;
                    color:green;
                    text-align: center;
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
   
          
                <table>
                    <td>
                        name
                    </td>
                    <td>
                        product_picture
                    </td>
                    <td>
                    <li> actions </li>
                    <li> {{ Html::linkAction('ProductController@getAddproduct', 'Add product','', array('class' => 'btn btn-primary')) }}  
                    </li>
                    </td>
                </table>
                @foreach( $products as $product )
                <table>
                    <td>
                        {{ $product->title }}
                    </td>
                    <td>
                        {{ Html::image($product->product_pic, 'a picture', array('width'=>'200','height'=>'150')) }} 
                    </td>
                    <td>
                        {{ Html::linkAction('ProductController@getUpdateproduct', 'update', array('id' => $product->id ), array('class' => 'btn btn-info')) }}
                        {{ Html::linkAction('ProductController@getDeleteproduct', 'Delete', array('id' => $product->id ), array('class' => 'btn btn-danger')) }}
                    </td>
                    <li>
          </table>
               
                @endforeach               
                <li style="float:right;position:absolute;bottom:100px;" >
                   {{ $products->render() }}
                </li>
             
@endsection


@section('footer')
    @parent
@endsection
       