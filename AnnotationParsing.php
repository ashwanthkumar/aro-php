<?php

/** 
 *	Interface for the Module to clearly describe its actions. 
 *
 *	@module ARO (At the Rate Of)
 *	@author	Ashwanth Kumar <ashwanth@ashwanthkumar.in>
 *	@version 0.1
 **/
interface AnnotationParsing {

	/**
	 *	Checks if $annotation exist on the AnnotationParsing Object
	 *
	 *	@return true if found, false if not
	 **/
	public function hasAnnotation($annotation);
	
	/**
	 *	Return the Annotation Object from the AnnotationParsing Object
	 *
	 *	@return $annotation class object with all the values set
	 *			false if the $annotation is not found. 
	 *
	 *	@throws AnnotationClassNotFoundException If the $annotation class 
	 *					definition is not found in the execution context. 
	 **/
	public function getAnnotation($annotation);
	
	/**
	 *	Return all the annotations of the given AnnotationParsing Object
	 *
	 *	@return	Array of annotation Objects for the given AnnotationParsing Obj.
	 **/
	public function getAnnotations();
}

