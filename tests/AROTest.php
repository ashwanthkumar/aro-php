<?php

// Include all the required files for the module
require_once("../ARO.php");
// Include the Mock Class for executing all the test cases
require_once("MockClass.php");

/**
 *	ARO Test Suite 
 *
 *	@module ARO
 *	@author	Ashwanth Kumar <ashwanth@ashwanthkumar.in>
 *	@version 0.1
 *
 *	Execute all the tests in the module using
 *	$ phpunit .
 **/

/**
 *	Checks the AROAnnotatecClass using PHPUnit
 **/
class AROAnnotatedClass extends PHPUnit_Framework_TestCase {

	// Instance of the class we are using here
	private $annotated_class;
	
	public function __construct() {
		$this->annotated_class = new AnnotatedClass('MockClass');
	}
	
	/**
	 *	@test
	 **/
	public function hasAnnotationCheck() {
		$this->assertTrue($this->annotated_class->hasAnnotation('Inject'));
	}
	
	/**
	 *	@test
	 **/
	public function getAnnotationCheck() {
		$this->assertEquals('Ashwanth Kumar', $this->annotated_class->getAnnotation('author'));
	}
	
	/**
	 *	@test
	 *	@expectedException AnnotationNotFoundException
	 **/
	public function getAnnotationExceptionCheck() {
		$this->assertEquals('Ashwanth Kumar', $this->annotated_class->getAnnotation('AnnotationDoesNotExist'));
	}
	
	/**
	 *	@test
	 **/
	public function getAnnotationsCheck() {
		$this->assertEquals(5, count($this->annotated_class->getAnnotations()));
	}
}

/**
 *	Checks the AROAnnotatedMethod using PHPUnit
 **/
class AROAnnotatedMethod extends PHPUnit_Framework_TestCase {

	// Instance of the annoated method we are using here
	private $annotated_method;
	
	public function __construct() {
		$this->annotated_method = new AnnotatedMethod('MockClass', 'method');
	}
	
	/**
	 *	@test
	 **/
	public function hasAnnotationCheck() {
		$this->assertTrue($this->annotated_method->hasAnnotation('return'));
	}
	
	/**
	 *	@test
	 **/
	public function getAnnotationCheck() {
		$this->assertEquals('void', $this->annotated_method->getAnnotation('return'));
	}
	
	/**
	 *	@test
	 *	@expectedException AnnotationNotFoundException
	 **/
	public function getAnnotationExceptionCheck() {
		$this->assertEquals('void', $this->annotated_method->getAnnotation('AnnotationDoesNotExist'));
	}
	
	/**
	 *	@test
	 **/
	public function getAnnotationsCheck() {
		$this->assertEquals(1, count($this->annotated_method->getAnnotations()));
	}
}


/**
 *	Checks the AROAnnotatedProperty using PHPUnit
 **/
class AROAnnotatedProperty extends PHPUnit_Framework_TestCase {

	// Instance of the annoated method we are using here
	private $annotated_property;
	
	public function __construct() {
		$this->annotated_property = new AnnotatedProperty('MockClass', 'visual');
	}
	
	/**
	 *	@test
	 **/
	public function hasAnnotationCheck() {
		$this->assertTrue($this->annotated_property->hasAnnotation('Visual'));
	}
	
	/**
	 *	@test
	 **/
	public function getAnnotationCheck() {
		$this->assertEquals(NULL, $this->annotated_property->getAnnotation('Visual'));
	}
	
	/**
	 *	@test
	 *	@expectedException AnnotationNotFoundException
	 **/
	public function getAnnotationExceptionCheck() {
		$this->assertEquals('void', $this->annotated_property->getAnnotation('AnnotationDoesNotExist'));
	}
	
	/**
	 *	@test
	 **/
	public function getAnnotationsCheck() {
		$this->assertEquals(1, count($this->annotated_property->getAnnotations()));
	}
}

