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
	 * @throws \RangeException if $newPropertyId is not positive
	 * @throws \TypeError if $newPropertyId is not an integer
	 **/
	public function setPropertyId(int $newPropertyId = null) {
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
	/**
	 * accessor method for price
	 *
	 * @return int/null value of price of the property
	 **/
	public function getPrice() {
		return($this->price);
	}
	/**
	 * mutator method for price
	 *
	 * @param int/null $newPrice new value of price
	 * @throws \RangeException if $newPrice is not positive
	 * @throws \TypeError if $newPrice is not an integer
	 **/
	public function setPrice(int $newPrice = null) {
		//verify the price is positive
		if($newPrice <= 0) {
			throw(new \RangeException("price is not positive"));
		}
		// convert and store the price
		$this->price = $newPrice;
	}
	/**
	 * accessor method for square feet of the property
	 *
	 * @return int value of square feet of the property
	 **/
	public function getSquareFeet() {
		return ($this->squareFeet);
	}
	/** mutator method for square feet
	 *
	 *@param int $newPrice new value of price
	 *@throws \RangeException if $newSquareFeet is not positive
	 *@throws \TypeError if $newSquareFeet is not an integer
	 **/
	public function setSquareFeet(int $newSquareFeet) {
		//verify the squar feet is positive
		if($newSquareFeet <= 0){
			throw(new \RangeException("squareFeet is not positive"));
		}
		//convert and store the square feet
		$this->squareFeet = $newSquareFeet;
	}
	/**
	 * accessor method for address
	 *
	 * @return string value of physical address of property
	 **/
	public function getAddress() {
		return ($this->address);
	}
	/**
	 * mutator method for tweet content
	 *
	 * @param string &newAddress new value of property address
	 * @throws \InvalidArgumentException if $newAddress is not a string or insecure
	 * @throws \RangeException if $newAddress is > 64 characters
	 * @throws \TypeError if $newAddress is not a string
	 **/
	public function setAddress(string $newAddress) {
		//verify the address is secure
		$newAddress = trim($newAddress);
		$newAddress = filter_var($newAddress, FILTER_SANITIZE_STRING);
		$this->address = $address;
	}
}
