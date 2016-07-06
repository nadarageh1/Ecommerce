@extends('layouts.master')

@section('header')
    @parent
@endsection

@section('content')
    <style type="text/css">
                body{
                    background-color: DAF1F1;
                }
                ul
                {
                    list-style-type: none;
                }
            </style>

            <center>
                <h1 style="font-size:30px">
                    update product
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
                    {{ Form::open(['url'=>'product/updateproduct/'.$id, 'files'=>'true']) }}
                    <li>
                        product_title {{ Form::text('title',$product->title ) }} <br>
                    </li>
                    <li>
                        @if($product->description!="")
                        product_description{{ Form::textarea('description',$product->description) }}<br>
                        @else
                       product_description{{ Form::textarea('description','Invalid Description') }}<br>
                       @endif
                    </li>
                    <script >
                        CKEDITOR.replace('description');
                        CKEDITOR.on('instanceLoaded', function (e) {
                            e.editor.resize(400, 250)
                        });
                    </script>

                    <li>
                        product_price      {{ Form::text('price',$product->price,['size'=>'10×10']) }} <br>
                    </li>
                    <li>
                        category_name {{ Form::select('category', $category)}} <br>
                    </li>
                    <li>
                        {{  Form::file('image') }}  
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
        

