[![No Maintenance Intended](http://unmaintained.tech/badge.svg)](http://unmaintained.tech/)

# ARO - Doc Comment Parsing Wrapper- 
### Module of BlueIgnis 
#### Written by Ashwanth Kumar \<ashwanth@ashwanthkumar.in\>
#### Version 0.1

## Introduction
An attempt to create a **Doc Comment** Block parsing wrapper, as I was not able to find anything decent to get things done in a simple way without too much dependencies, and being lightweight. Well the name **At the Rate Of (ARO)** is inspired from 2 source, first being usually **At the Rate Of (ARO)** refers to symbol *"@"*, and second that's how we represent annotations. 

## Design Goals:
- Improve the parsing method to enable detecting mutli-valued annotation values as in `` @MultiValued(name = "Name", visible = "false") ``

## Usage Examples:
	require_once("/path/to/lib/aro/ARO.php");
	
	/**
	 *	Mock Class small description goes here about the class.
	 *
	 *	@author Ashwanth Kumar
	 *	@email	ashwanth@ashwanthkumar.in
	 *	@version 0.1
	 *	@module AROTest
	 *	@Inject ServiceName
	 **/
	class MockClass {
		/**
		 *	@NonVisual Helo
		 **/
		public $non_visual;
		/**
		 *	@Visual
		 **/
		public $visual;
	
		/**
		 *	Sample random method that does nothing.
		 *
		 *	@return void
		 **/
		public function method() {
		}
	}

	// Invoke any of these classes for parsing the annotations
	$reflection = new AnnotatedClass('MockClass');
	
	$reflection = new AnnotatedMethod('MockClass', 'method');
	
	$reflection = new AnnotatedProperty('MockClass', 'visual');
	
	// All these Objects have 3 methods in common
	
	// Returns a Boolean value whether the Annotation exist 
	$reflection->hasAnnotation($annotation_name_to_check);
	
	try {
		// If the Annotation exist, it returns the value, else AnnotationNotFoundException exception is thrown
		$reflection->getAnnotation($annotation_name_to_get_value);
	} catch(AnnotationNotFoundException $e) {
		// Handle the exception here
	}
	
	// Get the list of all annotations 
	$reflection->getAnnotations(); 
	
## Credits
* The parsing library was initially inspired from [Doqumentor] (http://www.doqumentor.com "View Docqumentor project website") project. Thanks to the author for providing me the basic idea to get started. This [blog post] (http://www.murraypicton.com/2011/02/building-a-phpdoc-parser-in-php/) explains the parsing mechanism very well.
* The `AnnotationParsing` interface is inspired from the [Addendum] (http://code.google.com/p/addendum/wiki/ExtendedReflectionAPI "Addendum's Extended Reflection API"). 

