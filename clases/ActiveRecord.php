<?php

namespace App;

class ActiveRecord {
        // Base de datos
        protected static $db;
        protected static $columnasDB = [];

        protected static $tabla = "";

        // errores o validacion
        protected static $errores = [];
        
        // define una conexion a la BD
        public static function setDB($database)
        {
            self::$db = $database;
        }
        
        public function guardar() {
            if( !is_null($this->id) ) {
                // Actualizar
                $this->actualizar();
            } else {
                // Crea un nuevo registro
                $this->crear();
            }
        }
    
        public function crear() {
            // sanitiza la entrada de datos 
            $atributos = $this->sanitizarAtributos();
            //Inserta en la base de datos
            $query = " INSERT INTO " . static::$tabla . " ( ";
            $query .= join(', ', array_keys($atributos));
            $query .= " ) VALUES (' ";
            $query .= join("', '", array_values($atributos));
            $query .= " ') ";
    
            $resultado = self::$db->query($query);
    
            // Rensaje de exito
            if ($resultado) {
                // Redireccionar al usuario para no duplicar entradas en la BD
                header('Location:/admin?resultado=1');
            }
        }
    
        public function actualizar() {
             // sanitiza la entrada de datos 
            $atributos = $this->sanitizarAtributos();
    
            $valores = [];
            foreach($atributos as $key => $value) {
                $valores[] = "{$key}='{$value}'";
            }
               //Insertar en la base de datos
            $query = "UPDATE " . static::$tabla . " SET ";
            $query .= join(', ', $valores );
            $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
            $query .= " LIMIT 1 ";
              
            $resultado = self::$db->query($query);
    
            if ($resultado) {
                 // redireccionar al usuario para no duplicar entradas en la db
                header('Location: /admin?resultado=2');
            }
        }
        
            // Elimina un registro
        public function eliminar() {
            $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1"; 
            $resultado = self::$db->query($query);
    
            if ($resultado) {
                $this->borrarImagen();
                header('location: /admin?resultado=3');
            }
        }
    
        // Idetifica y une los atributos de las BD
        public function atributos() { 
            $atributos = [];
            foreach (self::$columnasDB as $columna) {
                if ($columna === 'id') continue;
                $atributos[$columna] = $this->$columna;
            }
            return $atributos;
        }
    
        public function sanitizarAtributos() {
            $atributos = $this->atributos();
            $sanitizado = [];
            foreach ($atributos as $key => $value) {
                $sanitizado[$key] = self::$db->escape_string($value);
            }
            return $sanitizado;
        }
    
        // Subida de archivos
        public function setImagen($imagen) {
            // Elimina la img previa
            if( !is_null( $this->id)) {
                $this->borrarImagen();
            }
            // Asigna al atributo  de imagen el nombre de la imagen
            if ($imagen) {
                $this->imagen = $imagen;
            }
        }
    
        // Elimina el archivo
        public function borrarImagen() {
       // Comprobar si existe un archivo
            $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
            if($existeArchivo) {
                unlink(CARPETA_IMAGENES . $this->imagen);
            }
        }
    
    // Validacion
        public static function getErrores() {
            return self::$errores;
        }
    
        public function validar() {
    
            if (!$this->titulo) {
                self::$errores[] = "Debes añadir un titulo";
            }
            if (!$this->precio) {
                self::$errores[] = "Debes añadir un precio";
            }
            if (!$this->imagen) {
                self::$errores[] = "Debes añadir una imagen";
            }
            if (strlen($this->descripcion) < 50) {
                self::$errores[] = "La descripcion debe tener al menos 50 caracteres";
            }
            if (!$this->habitaciones) {
                self::$errores[] = "Debes añadir un numero de habitaciones";
            }
            if (!$this->wc) {
                self::$errores[] = "Debes añadir un numero de wc";
            }
            if (!$this->estacionamiento) {
                self::$errores[] = "Debes añadir un numero de estacionamiento";
            }
            if (!$this->vendedores_id) {
                self::$errores[] = "Debes añadir un vendedor";
            }
    
            return self::$errores;
        }
    
            // Lista los registros
        public static function all() { 
            $query = "SELECT * FROM " . static::$tabla;
            $resultado = self::consultarSQL($query);
            return $resultado;
          }
    
          // Busca el registro por si id
        public static function find($id) {
            $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id";
            $resultado = self::consultarSQL($query);
            return array_shift( $resultado );  //array_shift apunta a la primera posicion del array
        }
    
    
        public static function consultarSQL($query) {
            // Consultar la  BD
            $resultado = self::$db->query($query);
            //Iterar los resultados
            $array = []; 
            while($registro = $resultado->fetch_assoc()) {
                $array[] = self::crearObjeto($registro);
            }
                //Liberar la memoria
            $resultado->free();
                // Retornar los resultados
            return $array;
        }
    
        protected static  function crearObjeto($registro) {
            $objeto = new static;

            foreach($registro as $key => $value ) {
                if( property_exists( $objeto, $key ) ) {
                    $objeto->$key = $value;
                }
            }
            return $objeto;
        }
    
          // Sincroniza el objeto en memoria con los cambios efectuados por el admin.
        public function sincronizar( $args = []) {
            foreach($args as $key => $value) {
                if(property_exists($this, $key) && !is_null($value)) {
                    $this->$key = $value;
                }
            }
        }
}