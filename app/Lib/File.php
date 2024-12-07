<?php

namespace App\Lib;
use App\Exceptions\FileException;
    class File
    {
        use Helper;

        const MAXFILESIZE = 3000000;
        protected $name;
        protected $full_path;
        protected $size;
        protected $type;
        protected $tmp_name;
        protected $error;

        public function __construct($file)
        {
            foreach ($_FILES["$file"] as $key => $value) {
                $this->$key = $value;
            }
        }

        public static function deleteFile(string $destLoc): bool
        {
            if (!file_exists($destLoc))
                throw new FileException("File Does Not Exist");
            return unlink($destLoc);
        }

        public function moveUploadedFile(): bool
        {
            if (file_exists(FILE_UPLOADLOC . $this->name))
                throw new FileException("File Already Exists");
            $result = move_uploaded_file($this->tmp_name, FILE_UPLOADLOC . $this->name);
            if (!$result) throw new FileException("Cannot Move File");
            return $result;

        }

    }
?>