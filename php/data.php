<?php

function dbConnect()
{
    $server         = 'localhost';
    $database       = 'angularjstest';
    $username       = 'admin';
    $password       = 'root';
    
    $con            = mysql_connect("$server", "$username", "$password");
    if(!$con)
    {
        die('Could not connect ' . mysql_error());
    }
    else
    {
        //echo 'Connected!!!';
        
        $dbcheck    = mysql_select_db("$database");
        if(!$dbcheck)
        {
            //echo mysql_error();
        }
        else 
        {
            //echo '<p>You have connected to the database ' . $database . '</p>';
            
        }
    }
}

function getData()
{
    $query          = mysql_query("SELECT * FROM users");
    
    $items          = array();
    while($row = mysql_fetch_array($query))
    {
        $items[] = array('fname' => $row['fname'], 'lname' => $row['lname'], 'username' => $row['username'], 'city' => $row['city'], 'add_date' => $row['add_date']);
    }
    print_r( json_encode(array('items'=>$items)) );
}

dbConnect();
getData();
?>
