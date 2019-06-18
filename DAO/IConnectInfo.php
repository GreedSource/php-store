<?php
//Filename: IConnectInfo.php
interface IConnectInfo
{
    const DBSYSTEM='mysql';
    const HOST ="localhost";
    const UNAME ="root";
    const PW ="";
    const DBNAME = "bdproducto";
    public function doConnect();
}
?>