<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function getGetData($field) {
    if(!isset($_GET[$field])) {
        $data = "";
        
    }else {
        $data = trim($_GET[$field]);
        $data = htmlspecialchars($data);
       
    }
    
    return $data;
      
}

function getPostData($field) {
    if(!isset($_POST[$field])) {
        $data = "";
        
    }else {
        $data = trim($_POST[$field]);
        $data = htmlspecialchars($data);
       
    }
    
    return $data; 
    
}

?>
