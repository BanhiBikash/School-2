<?php
    //change the hostname ,username, password or database here if required
    $host_name='localhost';
    $username='root';
    $password='';
    $database='school_db';

    //connect with database
    $conn=mysqli_connect($host_name,$username,$password,$database);

    //if cannot connect show this error message
    if(!$conn)
    {
        echo('Something went wrong! Cannot connect to database.');
    }
?>