# DividoCodingChallenge

This repository has been created for Divido Coding challenge task where I have created class to merge different JSON files and discard invalid JSON.

Old values will be overwrite by new one.

Errors will be explicitely handeled and it will not stop execution of program.

# How to run project

Clone folder **DividoCodingChallenge** and run it in browser. It's index.php file will load all JSON files present in fixtures folder and it will display required output.

# How to use class functions
Creating an object
$obj = new JSONHandler();
$json = $obj->mergeJSON($files);

// Function for merging files from fixture folder
$obj->mergeJSON($files);

// Function for displaying generated output after JSON merge
$obj->display($files);

// Function for getting config values . separated

You need to pass 2 parameters in function.
1st is for mentioning file name to load config from. 2nd is for getting config value
$obj->getConfigValue('fixtures/config1.json', 'database.host');
