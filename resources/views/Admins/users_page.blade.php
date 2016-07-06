@extends('layouts.master')
@section('header')
    @parent
@endsection

@section('content')
       @parent
    <style type="text/css">
                body{
                    background-color: E8E2E2;
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
                #profile_pic {
    border: 2px solid #a1a1a1; 
    width: 200px;
    border-radius: 25px;
}
            </style>
                <table >
                    <td>
                        name
                    </td>
                    <td>
                    <li> actions </li>
                    <li>{{ Html::linkAction('UserController@getAddusers', 'Add user','', array('class' => 'btn btn-primary')) }} </li>
                    </td>
                </table>

                @foreach($users as $user)
                <table>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ Html::linkAction('UserController@getUpdateusers', 'update', array('id' => $user->id ), array('class' => 'btn btn-info')) }}
                        {{ Html::linkAction('UserController@getDeleteusers', 'Delete', array('id' => $user->id ), array('class' => 'btn btn-danger')) }}

                    </td>
                </table>

                @endforeach
                <li style="float:right;position:absolute;bottom:100px;" >
                    {{ $users->render() }}
                </li>
                
@endsection
@section('footer')
    @parent
@endsection
        