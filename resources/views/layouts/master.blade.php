@include('link_boot')
<html>
    @section('header')
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <h3 style="font-size:30px;margin-left:500px">
                    Ecommerce
                </h3>

            </div>
        </div>
    </nav>
    <style type="text/css">    
        #footer
        {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        #container{
              position:absolute;
        width:10px;
        right:300px;
        top:2px;
        text-align: left;
        margin-bottom:3px;
        padding:0px;
        font-family:Arial, Helvetica, sans-serif;
        font-size: 12px;
        color: #000000;
        }
    </style>
    <center>
        @show
        <div class="container">
            @yield('content')
        </div>
        <div class="container">
            @include('Admins/page_left_side')
        </div>
        @section('footer')
        <nav class="navbar navbar-inverse" id="footer" >
            <h3 style="color:white"> right copy to nada rageh </h3>
        </nav>

        @show

</html>