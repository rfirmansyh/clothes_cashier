<?php
    class Storage {
        public static function upload($file, $pathDirectory) 
        {
            $file_name = $file['name'];
            $file_size = $file['size'];
            $file_error = $file['error'];
            $file_tmp = $file['tmp_name'];

            // cek apakah tidak ada gambar yang diupload
            if ( $file_error === 4 ) {
                return false;
            }

            $file_valid_ext = ['jpg', 'jpeg', 'png'];
            $file_ext = explode('.', $file_name);
            $file_ext = strtolower(end($file_ext));

            if ( !in_array($file_ext, $file_valid_ext) ) {
                return false;
            }

            if ( $file_size > 1000000 ) {
                return false;
            }

            $file_new_name = uniqid();
            $file_new_name .= '.';
            $file_new_name .= $file_ext;

            move_uploaded_file($file_tmp, $pathDirectory.$file_new_name); 

            return $file_new_name;
        }
    }