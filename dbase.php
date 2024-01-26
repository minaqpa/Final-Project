<?php

mysql_connect("localhost","root","");

   $db= mysql_select_db("finalyearproject");
     if (!$db)
      {
    	echo"not connected";
     }
    else
    {
   	//echo"Connected";
    }
    	?> 