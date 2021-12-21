# DividoCodingChallenge

This repository has been created for Divido Coding challenge task where I have created class to merge different JSON files and discard invalid JSON.

Old values will be overwrite by new one.

Errors will be explicitely handeled and it will not stop execution of program.

# How to run project

Clone folder **DividoCodingChallenge** and run it in browser. It's index.php file will load all JSON files present in fixtures folder and it will display required output.

# How to use class functions
Creating an object<br/>
**$obj = new JSONHandler();<br/>
$json = $obj->mergeJSON($files);**<br/>

// Function for merging files from fixture folder<br/>
**$obj->mergeJSON($files);**<br/><br/>

// Function for displaying generated output after JSON merge<br/>
**$obj->display($files);**<br/><br/>

// Function for getting config values . separated<br/>

You need to pass 2 parameters in function.<br/>
1st is for mentioning file name to load config from. 2nd is for getting config value<br/>
**$obj->getConfigValue('fixtures/config1.json', 'database.host');**
