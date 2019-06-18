<?php
//Filename: IConnectInfo.php
interface IConnectInfo
{
    const DBSYSTEM='mysql';
    const HOST ="localhost";
    const UNAME ="root";
    const PW ="";
    const DBNAME = "bd_store";
    public function doConnect();
}
?>