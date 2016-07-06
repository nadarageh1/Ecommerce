@extends('layouts.master')

@section('header')
    @parent
@endsection

@section('content')
       <style type="text/css">
                body{
                    background-color: D3DCF5;
                }
                li
                {
                    list-style-type: none;

                }
                table{
                    width: 700px;
                    height: 100px;
                    border: 4px solid gray;
                    color:green;
                    text-align: center;
                    table-layout: fixed;
                }

            </style>
            <center>
                <h1 style="font-size:30px">
                    page products  in {{ $category->name }}
                </h1>
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
                </table>
                @endforeach
                {{ $products->render() }}
@endsection


@section('footer')
    @parent
@endsection
     