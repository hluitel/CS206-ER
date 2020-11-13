<?php
include 'top.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$query = "insert into tblPlayers(fldFirstName, fldLastName, fldRating) values('".$_POST['txtFirstName']."','".$_POST['txtLastName']."','".$_POST['numRating']."')";

$thisDatabaseWriter->select($query,'');
