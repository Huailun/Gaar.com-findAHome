<?php
namespace Edu\Cnm\eliu1\DataDesign;

/** Small Section of a Property search information
 *
 * This Property can be a demonstration of giving potential home buyers or investors usefully information for their investments.
 * Users can send inquiry for their preferred property to receive follow up services.
 *
 * @author Ellen Liu <eliu1@cnm.edu>
 */
class Property implements \JsonSerializable {
	/**
	 * id for this property; this is the primary key
	 * @var int $propertyId
	 **/
	private $propertyId;
}