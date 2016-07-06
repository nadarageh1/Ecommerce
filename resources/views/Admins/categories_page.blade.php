@extends('layouts.master')

@section('header')
    @parent
@endsection

@section('content')
@parent
    <style type="text/css">
                body{
                    background-color: DAEBDD;
                }
                li
                {
                    list-style-type: none;
                }
                table{
                   
                    width: 800px;
                    height: 100px;
                    border: 4px solid gray;
                    color:blue;
                    table-layout: fixed;
                     text-align: center;
                     float: right;
                }

            </style>
           
                <table  >
                    <td>
                        category name
                    </td>
                    <td>
                    <li> actions </li>
                    <li>  {{ Html::linkAction('CategoryController@getAddcategory', 'Add category','', array('class' => 'btn btn-success')) }} 
                    </li>
                    </td>
                </table>
                @foreach( $categories as $category )

                <table >
                    <td> 
                        {{ $category->name }}
                    </td>
                    <td>
                        {{ Html::linkAction('CategoryController@getCategoryid', 'products', array('id' => $category->id ), array('class' => 'btn btn-default')) }}
                        {{ Html::linkAction('CategoryController@getUpdatecategory', 'update', array('id' => $category->id ), array('class' => 'btn btn-info')) }}
                        {{ Html::linkAction('CategoryController@getDeletecategory', 'Delete', array('id' => $category->id ), array('class' => 'btn btn-danger')) }}
                    </td>
                </table>
                @endforeach
                <li style="float:right;position:absolute;bottom:100px;" >
                    {{ $categories->render() }}
                </li>
                
@endsection


@section('footer')
    @parent
@endsection
          