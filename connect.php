<?php
    //database info

    $username = "itt";
    $password = "1u1NbxV69gPlDvGN";
    $host = "localhost"; 
    $dbname = "java_scoop";
    //adding UTF-8 to connection options
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    //try|catch scenario is useful for error handling..
    //similar to if|else statment only stops immediatly instead of continuing through the if section
    //as soon as problem occurs in try, it will stop and jump to catch
    try {
        //using the PDO library to open connection
        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options); 
    } 
    catch(PDOException $ex) {
        die("Failed to connect to the database: " . $ex->getMessage());
    }
    //sets PDO to throw exception on error
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //sets PDO to return database rows
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //PHP 5.3.3 (cli) (built: May 10 2016 21:39:50) - CURRENT VERSION
    //this fixes 'magic quotes' known issue... was removed in PHP version 5.4
    if(function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
        function undo_magic_quotes_gpc(&$array) {
            foreach($array as &$value) {
                if(is_array($value)) {
                    undo_magic_quotes_gpc($value); 
                } 
                else {
                    $value = stripslashes($value); 
                } 
            } 
        }
        undo_magic_quotes_gpc($_POST); 
        undo_magic_quotes_gpc($_GET); 
        undo_magic_quotes_gpc($_COOKIE); 
    }
    //this tells browser to use UTF-8 when sending data back to DB
    header('Content-Type: text/html; charset=utf-8');
    //initilizing the session
    session_start();