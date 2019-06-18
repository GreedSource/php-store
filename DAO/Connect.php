<?php
include_once('IConnectInfo.php');
class Connect implements IConnectInfo
{
    private static $sys=IConnectInfo::DBSYSTEM;
    private static $server=IConnectInfo::HOST;
    private static $currentDB= IConnectInfo::DBNAME;
    private static $user= IConnectInfo::UNAME;
    private static $pass= IConnectInfo::PW;
    private static $hookup;
    
    public function doConnect()
    {
        try {
            $dsn=self::$sys.':host='.self::$server.';dbname='. self::$currentDB;   
            $connection = new PDO($dsn, self::$user, self::$pass);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$hookup=$connection;
        }catch (PDOException $pdoExcetion) {
            self::$hookup = null;
            echo 'Error al establecer la conexión: '.$pdoExcetion;
            exit();
        }
        //echo 'Conectado a la base de datos: '.self::$currentDB;
    
        return self::$hookup;
    }
}
?>