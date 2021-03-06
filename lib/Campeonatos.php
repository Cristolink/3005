<?php
class Campeonato{
    var $idcampeonato;
    var $codigo;
    var $nombre;
    var $fechainicio;
    var $fechatermino;
    var $cantidadpartidos;
    private $oDB;
    
    function __construct($nid=0,$scod="",$snom="",$dfecini="",$dfecfin="",$ncant=0){
            $this->idcampeonato=$nid;
            $this->codigo=$scod;
            $this->nombre=$snom;
    }
    public function ListaCampeonatosArr(){        
        $oConn=new Conexion();
        
        if ($oConn->Conectar())
            $db=$oConn->objconn;
        else
            return false;
            
        $sql="SELECT idcampeonato, codigo,nombre,fechainicio,fechatermino,cantidadpartidos"
             ." FROM campeonato";
        
        $resultado=$db->query($sql);
        $i=0;    
        while($fila = $resultado->fetch_assoc()){         
          $oCampeonato= new Campeonato($fila["idcampeonato"],
                                        $fila["codigo"],
                                        $fila["nombre"],
                                        $fila["fechainicio"],
                                        $fila["fechatermino"],
                                        $fila["cantidadpartidos"]);
          $arrCampeonato[$i]=$oCampeonato;
          $i++;
         }
         return $arrCampeonato;
        
    }
    
    
    public function ListaCampeonatos(){
        /*Conexion*/
        if(!isset($this->oDB)){
            $oConn=new Conexion();
            if ($oConn->Conectar()){
                /*STRING QUERY*/
                $sql="SELECT idcampeonato, codigo,nombre,fechainicio,fechatermino,cantidadpartidos"
                 ." FROM campeonato";
                /*Ejecución*/
                $this->oDB=$oConn->objconn->query($sql);            
            }
            else{
                return false;
            }
        }
       
               
        if( $fila=$this->oDB->fetch_assoc()){
          $oCampeonato= new Campeonato($fila["idcampeonato"],
                                        $fila["codigo"],
                                        $fila["nombre"],
                                        $fila["fechainicio"],
                                        $fila["fechatermino"],
                                        $fila["cantidadpartidos"]);
          return $oCampeonato;
         }
        return false;
        
       
    }
    
}