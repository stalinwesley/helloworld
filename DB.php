<?php 


function dbconnections($host="localhost",$user="root",$pass="",$db="test"){
return mysqli_connect($host, $user, $pass,$db);
}

function select($table,$selectfield=array(),$where=array(),$limit=0,$offset=0){
    if(empty($table)) return "";
    if(empty($selectfield)) $selectfield="*";
    if(empty($where)) $whrer="";
    if(empty($limit)) $limit="";
    $querystr = "";
    $querystr = "SELECT ";
    if(is_array($selectfield) && count($selectfield) > 1 ) {
        foreach($selectfield as $val){ $selectfieldq []='`'.$val.'`';}
        $querystr .= implode(",",$selectfieldq);
    }
    elseif(is_string($selectfield)){ $querystr .=  '`'.$selectfield.'`'; }
    $querystr .= " FROM ".$table;    
    if(is_array($where) && count($where) > 1 ) {
        $querystr .= " WHERE ";
        $i=0;$lastele = count($where) - 1 ;          
        foreach ($where as $key => $val ){
        ($i != $lastele) ? $sufix = " AND ": $sufix = "";
        is_string($val) ? $val = "'".$val."'" :$val; 
        $querystrwh .= $key."=".$val.$sufix; 
        $i++;           
        }
        $querystr .= $querystrwh;                            
    }
    elseif(is_string($where)){ $querystr .= " WHERE ".$where;}
    if(!empty($limit))$querystr .= " LIMIT ".$limit;
    if(!empty($offset)) $querystr .= " OFFSET ".$offset;
    $dbcon = dbconnections();
    $resultobj = mysqli_query($dbcon, $querystr);
    if(mysqli_num_rows($resultobj) > 1)
    {
        while($row = mysqli_fetch_array($resultobj, MYSQLI_ASSOC)){
            $returnarr []= $row; 
        }
    }
    else{ $returnarr = mysqli_fetch_array($resultobj, MYSQLI_ASSOC);}
    // echo $querystr;
    return $returnarr;
}

function selectall($table,$selectfield,$whrer){

}

function insert($table,$fieldstoisnert,$valuetoinsert){

}

function update($table,$valuetoupdate,$wheretoupdate){

}
function sqlescape(){

}


$allrow = select("employees",array('lastName','firstName','email'),array(),0,0);
print_r($allrow);