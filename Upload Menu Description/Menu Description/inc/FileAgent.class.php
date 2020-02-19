<?php

class FileAgent {
    
    private static $_fileContents;

    //getter for fileContents
    public static function getFileContents()    {
        return self::$_fileContents;
    }

    static function read($fileName)    {
    
        try{
            $fileHandle =fopen($fileName,'r');
            self::$_fileContents = fread($fileHandle,filesize($fileName));

            //Check if the file handle was opened and there is content in the file
            if (empty(self::$_fileContents) || !$fileHandle)   {
                throw new Exception("There was a problem opening the file: $fileName");
            }

        } catch(Exception $ex) {
            echo $ex->getMessage();
        }
    }
}

?>