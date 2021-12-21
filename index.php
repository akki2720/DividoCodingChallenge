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
    function getJSONFile($file) {
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
    function isValidJSON($string) {
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
    function mergeJSON($files) {
        $finalJson = [];
        for ($file = 0;$file < count($files);$file++) {
            $json = self::getJSONFile($files[$file]);
            if ($json) {
                if (self::isValidJSON($json)) {
                    $finalJson = array_merge(json_decode($json, true), $finalJson);
                } else {
                    echo $files[$file] . " is invalid json file. It will be discarded </br>";
                }
            } else {
                echo $files[$file] . " No such file found.";
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
    function display($json) {
        echo "<pre>";
        print_r($json);
        echo "</pre>";
    }
    /**
     *
     * Load required value from provided config file
     *
     * @param   sting  $fileName filename to load from folder
     * @param   string  $valueToGet provide string separated with . to get required config value
     * @return  array
     *
     */
    function getConfigValue($fileName, $valueToGet) {
        // Get JSON content
        $json = self::getJSONFile($fileName);
        if ($json) {
            if (self::isValidJSON($json)) {
                $jsonContent = json_decode($json, true);
                // separating $valueToGet with . for getting required value
                $valueToGet = explode(".", $valueToGet);
                // Generating array keys to get required value from JSON array.
                $arrayKeyToGet = '';
                $filterJsonContent = $jsonContent;
                for ($i = 0;$i < count($valueToGet);$i++) {
                    $filterJsonContent = $filterJsonContent[$valueToGet[$i]];
                }
                // Show required value of config file
                if (isset($filterJsonContent)) {
                    print_r(json_encode($filterJsonContent));
                } else {
                    echo "configuration does not exist.";
                }
                
            } else {
                echo $fileName . " is invalid json file.</br>";
            }
        } else {
            echo $fileName . " No such file found.";
        }
    }
}
// Load files and generate common configuration file
$files = ["fixtures/config1.json", "fixtures/config2.json", "fixtures/config3.json", "fixtures/config4.json"];
$obj = new JSONHandler();
$json = $obj->mergeJSON($files);
// Display output
$obj->display($json);
// Get required configuration value
$obj->getConfigValue('fixtures/config1.json', 'database');
