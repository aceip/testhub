<?php
    /*该文件为PHP连接sqlserver示例文件--By guoxing*/
    //$dbh = new PDO("sqlsrv:Server=192.168.1.100,1433;Database=mydb", "sa", "622701zxcv");
    $server = "192.168.1.100";
    $coninfo = array("Database"=>"mydb", "UID"=>"SA", "PWD"=>"622701zxcv");
    $conn = sqlsrv_connect($server, $coninfo) or die ("连接失败!");
    var_dump($conn);
    //sqlsrv_close($conn);
    if ($conn)
        {
            echo "</br>已成功连接至数据库";
            echo "</br>";
        }else{
            echo "数据库连接失败！<br/>";
            die(print_r(sqlsrv_errors(),true));
        }
    $tsql = "select * from mytable;";
    $getResults = sqlsrv_query($conn,$tsql);
    echo ("读取数据库数据：<br/>");
    
    if($getResults)
    {
        while ($row = sqlsrv_fetch_array($getResults,SQLSRV_FETCH_ASSOC)){
        echo (iconv('GBK','UTF-8', $row['name'])." ".iconv('GBK','UTF-8', $row['yes'])." ".iconv('GBK','UTF-8', $row['note']).PHP_EOL);
        echo '<br/>';
        }
    }else{
        echo "查询失败\n";
        die(print_r(sqlsrv_errors(), true));
    }
    sqlsrv_free_stmt($getResults);
/*************************************************************************/
/**

    //Update from Sample_Table
$userToUpdate = 'RedHat';
$tsql= "UPDATE Sample_Table SET Last_Name = ? WHERE First_Name = ?";
$params = array('Maipo', $userToUpdate);
echo("\nUpdating Last_Name for user " . $userToUpdate . PHP_EOL);
 
$getResults = sqlsrv_query($conn,$tsql,$params);
if($getResults)
{
	echo "连接成功!<br/>";
}
else
{
	echo "连接失败!<br/>";
	
	
}
 
$rowsAffected = sqlsrv_rows_affected($getResults);
if ($getResults == FALSE or $rowsAffected == FALSE)
    die(print_r(sqlsrv_errors(),true));
echo ($rowsAffected. " row(s) updated: " . "<br/>");
sqlsrv_free_stmt($getResults);
 
 
//Select from SampleTable
$tsql = "select * from Sample_Table;";
$getResults = sqlsrv_query($conn,$tsql);
echo ("Reading data from SampleTable.<br/>");
if($getResults)
{
        while ($row = sqlsrv_fetch_array($getResults,SQLSRV_FETCH_ASSOC)){
        echo ($row['Number'] ." " .$row['First_Name'] . " " . $row['Last_Name'] .PHP_EOL);
        echo '<br/>';
        }
}
else
{
        echo "select  failed.\n";
        die(print_r(sqlsrv_errors(), true));
}
sqlsrv_free_stmt($getResults);
 
 
//Insert from Sample_table
$tsql = "INSERT INTO Sample_Table (
	Number,
	First_Name,
	Last_Name,
	Last_Update
	) 
	values (?,?,?,?);";
$params = array('00005','Debian','Linux','2018-01-01');
$getResults = sqlsrv_query($conn,$tsql,$params);
echo ("Insering a new row into Sample_Table.");
$rowAffected = sqlsrv_rows_affected($getResults);
if($getResults == FALSE or $rowAffected == FALSE)
	die(print_r(sqlsrv_errors(), true));
echo ($rowsAffected. "row(s) inserted."."<br/>" );
sqlsrv_free_stmt($getResults);
 
 
 
// Delete from Sample_Table
$userToDelete = 'Debian';
$tsql = "DELETE FROM Sample_Table WHERE First_name = ?";
$params = array($userToDelete);
$getResults = sqlsrv_query($conn,$tsql,$params);
echo("鍒犻櫎鐢ㄦ埛".$userToDelete)."銆?;
$rowAffected = sqlsrv_rows_affected($getResults);
if($getResults == FALSE or $rowAffected == FALSE)
        die(print_r(sqlsrv_errors(), true));
echo ($rowAffected. "row(s) deleted. <br\>" );
sqlsrv_free_stmt($getResults);
sqlsrv_close($conn);
**/
/*************************************************************************/
?>