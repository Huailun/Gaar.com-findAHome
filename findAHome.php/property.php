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

	/**
	 * accesor method for property id
	 *
	 * @return int/null value of property id
	 **/
	public function getPropertyId() {
		return ($this->propertyId);
	}

	/**
	 * mutator method for property id
	 *
	 * @param int /null $newPropertyId new value of property id
	 * @throws \RangeExcep if $newPropertyId is not positive
	 * @throws \TypeError if $newPropertyId is not an integer
	 **/
	public function setPropertyId(int $propertyId = null) {
		// base case: if the property id is null, this is a new property without a mySQL assigned id (yet)
		if($newPropertyId === null) {
			$this->propertyId = null;
			return;
		}

		//verify the property id is positive
		if($newPropertyId <= 0) {
			throw(new \RangeException("property id is not positive"));
		}

		//convert and sotre the property id
		$this->propertyId = $newPropertyId;
	}
}
