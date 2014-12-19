<?php

    class DataProvider
    {
        public static function ExecuteQuery($sql)
        {
            $server="localhost";
            $data="test";
            $user="root";
            $pass="";

            $connect= mysql_connect($server,$user,$pass)or die("Error!!");
            $select= mysql_select_db($data);
            mysql_query("set names 'utf8'");
            $result = mysql_query($sql);    
            mysql_close();
            @mysql_free_result(); //Giải phóng bộ nhớ cho MySQL
            return $result;
        }
    }
    
?>