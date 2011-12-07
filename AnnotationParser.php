<?php

/**
 *	Library used for Parsing Annotations in the project. 
 *
 *	@notice This class uses a Parser class from Doqumentor Project
 *			(http://www.doqumentor.com/). Due Credits delivered. 
 *	@module ARO	(At the Rate Of)
 *	@author Ashwanth Kumar <ashwanth@ashwanthkumar.in>
 *	@version 0.1
 **/

/**
 *	Represents the Annotated class
 **/
class AnnotatedClass extends ReflectionClass implements AnnotationParsing {

	private $parser;
	private $annotations;
	
	/**
	 *	Constructor of the Annotated class 
	 **/
	public function __construct($class) {
		parent::__construct($class);
		
		$this->parser = new Parser($this->getDocComment());
		$this->parser->parse();
		
		// Setting the default values
		$this->annotations = array();
	}

	/**
	 *	Check if AnnotatedClass has the required annotation
	 *
	 *	@param	$annotation	Annotation to check for in the object
	 **/	
	public function hasAnnotation($annotation) {
		// Get all the annotations
		$this->annotations = $this->parser->getParams();
		
		if(isset($this->annotations[$annotation])) return true;
		else return false;
	}
	
	/**
	 *	Returns the value of the Annotation in the docComment section of the 
	 *	Class being refered
	 *
	 *	@return	Annotation value if it exist
	 *			AnnotationNotFoundException if the annotation is not found
	 **/
	public function getAnnotation($annotation) {
		if($this->hasAnnotation($annotation)) return $this->annotations[$annotation];
		else throw new AnnotationNotFoundException;
	}
	
	/**
	 *	Get all the annotations of the AnnotatedClass in the form of an array
	 *
	 *	@return	Array of Annoatations and its value
	 **/
	public function getAnnotations() {
		if(count($this->annotations) < 1) $this->annotations = $this->parser->getParams();	// Get all the annotations
		
		return $this->annotations;
	}
}

/**
 *	Represents the Annotated method
 **/
class AnnotatedMethod extends ReflectionMethod implements AnnotationParsing {

	private $parser;
	private $annotations;
	
	/**
	 *	Constructor of the AnnotatedMethod 
	 **/
	public function __construct($class, $name) {
		parent::__construct($class, $name);
		
		$this->parser = new Parser($this->getDocComment());
		$this->parser->parse();
		
		// Setting the default values
		$this->annotations = array();
	}

	/**
	 *	Check if AnnotatedMethod has the required annotation
	 *
	 *	@param	$annotation	Annotation to check for in the object
	 **/	
	public function hasAnnotation($annotation) {
		// Get all the annotations
		$this->annotations = $this->parser->getParams();
		
		if(isset($this->annotations[$annotation])) return true;
		else return false;
	}
	
	/**
	 *	Returns the value of the Annotation in the docComment section of the 
	 *	Method being refered
	 *
	 *	@return	Annotation value if it exist
	 *			AnnotationNotFoundException if the annotation is not found
	 **/
	public function getAnnotation($annotation) {
		if($this->hasAnnotation($annotation)) return $this->annotations[$annotation];
		else throw new AnnotationNotFoundException;
	}
	
	/**
	 *	Get all the annotations of the AnnotatedMethod in the form of an array
	 *
	 *	@return	Array of Annoatations and its value
	 **/
	public function getAnnotations() {
		if(count($this->annotations) < 1) $this->annotations = $this->parser->getParams();	// Get all the annotations
		
		return $this->annotations;
	}
}

/**
 *	Represents the Annotated Property
 **/
class AnnotatedProperty extends ReflectionProperty implements AnnotationParsing {

	private $parser;
	private $annotations;
	
	/**
	 *	Constructor of the AnnotatedMethod 
	 **/
	public function __construct($class, $name) {
		parent::__construct($class, $name);
		
		$this->parser = new Parser($this->getDocComment());
		$this->parser->parse();
		
		// Setting the default values
		$this->annotations = array();
	}

	/**
	 *	Check if AnnotatedProperty has the required annotation
	 *
	 *	@param	$annotation	Annotation to check for in the object
	 **/	
	public function hasAnnotation($annotation) {
		// Get all the annotations
		$this->annotations = $this->parser->getParams();
		
		if(array_key_exists($annotation, $this->annotations)) return true;
		else return false;
	}
	
	/**
	 *	Returns the value of the Annotation in the docComment section of the 
	 *	Property being refered
	 *
	 *	@return	Annotation value if it exist
	 *			AnnotationNotFoundException if the annotation is not found
	 **/
	public function getAnnotation($annotation) {
		if($this->hasAnnotation($annotation)) return $this->annotations[$annotation];
		else throw new AnnotationNotFoundException;
	}
	
	/**
	 *	Get all the annotations of the AnnotatedProperty in the form of an array
	 *
	 *	@return	Array of Annoatations and its value
	 **/
	public function getAnnotations() {
		if(count($this->annotations) < 1) $this->annotations = $this->parser->getParams();	// Get all the annotations
		
		return $this->annotations;
	}
}

