<?php

class JSONHandler {

    /**
     *
     * Get JSON file content
     *
     * @param   file  $files
     * @return  string
     *
     */
    function getJSONFile($file)
    {
        return file_get_contents($file);
    }
  
    /**
     *
     * Check JSON file valid or not
     *
     * @param   string  $string
     * @return  Exception
     *
     */
    function isValidJSON($string)
    {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
    }
  
    /**
     *
     * Merge JSON content of all valid files
     *
     * @param   file  $files
     * @return  json
     *
     */
    function mergeJSON($files)
    {
        $finalJson = [];
        for($file = 0; $file<count($files); $file++){
            $json = self::getJSONFile($files[$file]);
            
            if($json) {
                if(self::isValidJSON($json)) {
                    $finalJson = array_merge(json_decode($json, true),$finalJson);
                } else {
                    echo $files[$file]." is invalid json file. It will be discarded </br>";
                }
            } else {
                echo $files[$file]." No such file found.";
            }
        }
        return json_encode($finalJson);
    }

    /**
     *
     * Display output of all JSON
     *
     * @param   json  $json
     * @return  array
     *
     */
    function display($json)
    {
        print_r($json);
    }
  
}

// Load files and generate common configuration file
$files = ["fixtures/config1.json","fixtures/config2.json","fixtures/config3.json","fixtures/config4.json"];

$obj = new JSONHandler();
$json = $obj->mergeJSON($files);

// Display output
$obj->display($json);
