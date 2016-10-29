<?php 
include('config.php');

$parent_cat1 = $_GET['parent_cat1'];
$parent_cat2 = $_GET['parent_cat2'];
$dependent1 = $_GET['dependent1'];
$dependent2 = $_GET['dependent2'];
$targetname = $_GET['targetname'];
$displayID =  $_GET['displayID'];
$displayName = $_GET['displayName'];


if($dependent2 == 'none'){
    $query = mysql_query("SELECT * FROM {$targetname} WHERE {$dependent1} = {$parent_cat1}");
} else{
    $query = mysql_query("SELECT * FROM {$targetname} WHERE {$dependent1} = {$parent_cat1} AND {$dependent2} = {$parent_cat2}");
}

while($row = mysql_fetch_array($query)) {
    echo "<option value='".$row[$displayID]."'>".$row[$displayName]."</option>";
}

mysql_free_result($query);

?>