<?php
if (isset($_FILES["foto"])){

            $foto_name= $_FILES["foto"]["name"];

            /* ESTE CONDICIONAL NOS PERMITE GUARDAR O MODIFICAR USUARIOS SIN QUE LE ASIGNEN FOTO */

            if ($foto_name == NULL || $foto_name == ""){

                $fot = "";

            } else { 

                $foto_name= $_FILES["foto"]["name"];

                $foto_size= $_FILES["foto"]["size"];

                $foto_type= $_FILES["foto"]["type"];

                $foto_temporal= $_FILES["foto"]["tmp_name"];



                # Limitamos los formatos de imagen admitidos a: png, jpg y gif

                if ($foto_type=="image/x-png" OR $foto_type=="image/png") { $extension="image/png"; }

                if ($foto_type=="image/pjpeg" OR $foto_type=="image/jpeg"){ $extension="image/jpeg";}

                if ($foto_type=="image/gif" OR $foto_type=="image/gif")   { $extension="image/gif"; }



                /*Reconversion de la imagen para meter en la tabla abrimos el fichero temporal en modo lectura "r" y binaria "b"*/

                $f1= fopen($foto_temporal,"rb");

                # Leemos el fichero completo limitando la lectura al tamaño del fichero

                $foto_reconvertida = fread($f1, $foto_size);

                /* Se cifra en Base64 Encode de manera que la foto quede cifrada dentro de la base de datos */

                $fot = base64_encode($foto_reconvertida);

                /* cerrar el fichero temporal */

                fclose($f1);  

            }

        }else{

            $fot = NULL;

	} 

?>
