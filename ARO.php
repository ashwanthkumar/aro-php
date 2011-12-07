<?php

/**
 *	This file acts as the placeholder for the module and includes all the 
 *	necessary files for using ARO module.
 * 
 *	@author	Ashwanth Kumar <ashwanth@ashwanthkumar.in>
 *	@module	ARO
 *	@version 0.1
 **/

// Get the ARO Module Path
$aro_module_path = dirname(__FILE__);

// Update the include_path for the module
set_include_path(get_include_path() . PATH_SEPARATOR . $aro_module_path);

// Include the IoC_Container Interface
require_once("AnnotationParsing.php");

// Include the Exception classes
require_once("ARO_Exceptions/AnnotationNotFoundException.php");

// Include the Core ARO (duh!) required classes
require_once("Parser.php");
require_once("AnnotationParser.php");

