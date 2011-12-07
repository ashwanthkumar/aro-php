<?php
/**
* PHPDoc parser for use in Doqumentor
*
* Simple example usage: 
* $a = new Parser($string); 
* $a->parse();
* 
* @author Murray Picton
* @copyright 2010 Murray Picton
*/

/**
 *	This class is being modified to suite my needs for fetching all the 
 *	annotations in the DocComment of an object (class/method/property).
 *
 *	@author	Ashwanth Kumar <ashwanth@ashwanthkumar.in>
 *	@module ARO
 *	@version 0.1
 *	@date 08/12/2011
 **/
class Parser {
	
	/**
	* The string that we want to parse
	*/
	private $string;
	/**
	* Storge for the short description
	*/
	private $shortDesc;
	/**
	* Storge for the long description
	*/
	private $longDesc;
	/**
	* Storge for all the PHPDoc parameters
	*/
	private $params;
	
	/**
	* Parse each line
	*
	* Takes an array containing all the lines in the string and stores
	* the parsed information in the object properties
	* 
	* @param array $lines An array of strings to be parsed
	*/
	private function parseLines($lines) {
		foreach($lines as $line) {
			$parsedLine = $this->parseLine($line); //Parse the line
			
			if($parsedLine === false && empty($this->shortDesc)) {
				$this->shortDesc = implode(PHP_EOL, $desc); //Store the first line in the short description
				$desc = array();
			} elseif($parsedLine !== false) {
				$desc[] = $parsedLine; //Store the line in the long description
			}
		}
		$this->longDesc = implode(PHP_EOL, $desc);
	}
	/**
	* Parse the line
	*
	* Takes a string and parses it as a PHPDoc comment
	* 
	* @param string $line The line to be parsed
	* @return mixed False if the line contains no parameters or paramaters
	* that aren't valid otherwise, the line that was passed in.
	*/
	private function parseLine($line) {
		// Converting \t to whitespace as I use more often that convention to 
		// keep the code more readable. Just do it once to identify the values
		$line = str_replace("\t", " ", $line);
		
		//Trim the whitespace from the line
		$line = trim($line);
		
		if(empty($line)) return false; //Empty line
		
		if(strpos($line, '@') === 0) {
			/**
			 *	Checking if the annotation just a marker like in 
			 *	@AnnotationMarker
			 *	rather than the traditional 
			 *	@Annotation value
			 *
			 *	@todo More type of annotation types are to be checked. 
			 **/
			$pos = strpos($line, ' ');
			
			if($pos !== FALSE) {
				$param = substr($line, 1, strpos($line, ' ') - 1); //Get the parameter name
				$value = substr($line, strlen($param) + 2); //Get the value
				$this->setParam($param, $value);	// Just store the Annotation
			} else {
				$param = substr($line, 1, strlen($line)); //Get the parameter name alone
				
				// Setting NULL values for all Marker type annotations
				$this->setParam($param, NULL);
			}
		}
		
		return $line;
	}
	/**
	* Setup the valid parameters
	* 
	* @param string $type NOT USED
	*/
	private function setupParams($type = "") {
		$params = array();
		
		$this->params = $params;
	}

	/** Removing the formatParamOrReturn($string) as it is not required **/	

	/**
	* Set a parameter
	* 
	* @param string $param The parameter name to store
	* @param string $value The value to set
	* @return bool True = the parameter has been set, false = the parameter was invalid
	*/
	private function setParam($param, $value) {
		if(empty($this->params[$param])) {
			$this->params[$param] = $value;
		} else {
			$arr = array($this->params[$param], $value);
			$this->params[$param] = $arr;
		}
	}
	/**
	* Setup the initial object
	* 
	* @param string $string The string we want to parse
	*/
	public function __construct($string) {
		$this->string = $string;
		$this->setupParams();
	}
	/**
	* Parse the string
	*/
	public function parse() {
		//Get the comment
		if(preg_match('#^/\*\*(.*)\*/#s', $this->string, $comment) === false)
			die("Error");
			
		$comment = trim($comment[1]);
		
		//Get all the lines and strip the * from the first character
		if(preg_match_all('#^\s*\*(.*)#m', $comment, $lines) === false)
			die('Error');
		
		$this->parseLines($lines[1]);
	}
	/**
	* Get the short description
	*
	* @return string The short description
	*/
	public function getShortDesc() {
		return $this->shortDesc;
	}
	/**
	* Get the long description
	*
	* @return string The long description
	*/
	public function getDesc() {
		return $this->longDesc;
	}
	/**
	* Get the parameters
	*
	* @return array The parameters
	*/
	public function getParams() {
		return $this->params;
	}
	
	/**
	 *	Set the string (Doc Comment) to parse
	 **/
	public function setString($string) {
		$this->string = $string;
	}
}


