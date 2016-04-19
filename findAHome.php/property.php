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
	/**
	 * price for this property
	 * @var int $price
	 **/
	private $price;
	/**
	 * the interior squareFeet of this property
	 * @var int $squareFeet
	 **/
	private $squareFeet;
	/**
	 * physical address of this property
	 * @var string $address
	 **/
	private $address;
	/**
	 * numbers of bedrooms and bathrooms inside this property, the floor plan.
	 * @var string $floorPlan
	 **/
	private $floorPlan;
}
