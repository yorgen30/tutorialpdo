<?php
class Conexion 
{
    private $_host;
    private $_user;
    private $_pass;
    private $_dbname;
    private $_charset;
    private $_conexion; /* private $_conexion */

    public function __construct(){
        if(!$this->hayConexion()) $this->getConec();
    }

    public function getConec(){
        $archivo = 'config.ini.php';
        $configurar = parse_ini_file($archivo, true);

        $this->_host = $configurar['basedatos']['host'];
        $this->_user = $configurar['basedatos']['user'];
        $this->_pass = $configurar['basedatos']['pass'];
        $this->_dbname = $configurar['basedatos']['dbname'];
        $this->_charset = $configurar['basedatos']['charset'];
        
        try 
        {

            $this->_conexion = new PDO("mysql:host=$this->_host;dbname=$this->_dbname;charset=$this->_charset",$this->_user,$this->_pass);
            $this->_conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->_conexion;
        }
        catch(PDOException $e)
        {
            echo "Conexion Fallida: " . $e->getMessage();
        }
    }

    public function connectar(){
        return $this->_conexion;
    }
    public function hayConexion(){
        $siHayConexion=false;
        if($this->_conexion!=null) return true;
        return $siHayConexion;
    }

    public function consultaRetorna($sql){
        try {
        $stmt = $this->connectar()->prepare($sql); 
        $stmt->execute();
        $resulta = $stmt->fetchAll(PDO::FETCH_ASSOC);
       return $resulta;
    }catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }finally{
        if($this->hayConexion()){
            $this->desconectar();
        }
    }
    }

    public function desconectar(){
        $this->_conexion=null;
    }
}
?>
