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
            @foreach($product as $product_spch)
            <center>
                <h1 style="font-size:30px">
                   product exist
                </h1>
                <table>
                    <td>
                        name
                    </td>
                    <td>
                        product_picture
                    </td>
                    <td>
                   actions
                    </li>
                    </td>
                </table>
                <table>
                    <td>
                        {{ $product_spch->title }}
                    </td>
                    <td>
                        {{ Html::image($product_spch->product_pic, 'a picture', array('width'=>'200','height'=>'150')) }} 
                    </td>
                    <td>
                        {{ Html::linkAction('ProductController@getUpdateproduct', 'update', array('id' => $product_spch->id), array('class' => 'btn btn-info')) }}
                        {{ Html::linkAction('ProductController@getDeleteproduct', 'Delete', array('id' => $product_spch->id ), array('class' => 'btn btn-danger')) }}
                    </td>
                </table>
            @endforeach
@endsection


@section('footer')
    @parent
@endsection
          

              
             
             