<?php
    class Conexion{
        var $conn;

        function conectar(){
            $this->conn = mysqli_connect( "localhost","root","" )
                    or die( "Conexion fallida " . mysql_error() );

            mysqli_select_db( $this->conn, "react" )
                or die( "No se puede conectar a la base de datos" );

            return $this->conn;
        }

        function buscarUsuario( $user, $pass ){
            $this->conectar();

            if( !$this->conn ){
                exit( "<h1> Fallo en la conexión... </h1>" );
            }
            else{
                $consulta = "SELECT * FROM usuario WHERE usuario='" 
                . $user . "' AND pass='" . $pass . "'";

                $result = mysqli_query( $this->conn, $consulta);

                $num = mysqli_num_rows( $result );

                return $num;
            }
        }

        function registrarUsuario ( $consulta ){
            $this->conectar();

            if( !$this->conn ){
                exit( "<h1> Fallo en la conexión... </h1>" );
            }
            else{
                $result = mysqli_query( $this->conn, $consulta );
                return $result;
            }
        }
    }
?>