<div style="float:left;position:absolute;top:150px">
    <ul>
   <li>
        {{ Html::linkAction('CategoryController@getIndex', 'Categories','') }} 
    </li>
    <li>

        {{ Html::linkAction('ProductController@getIndex', 'products', '') }} 
    </li>
    <li>

        {{ Html::linkAction('UserController@getPageusers', 'users', '') }} 
    </li>
    <li>


        {{ Html::linkAction('UserController@getLogout', 'Logout', '') }}
    </li>
 
  
</ul>

</div>




