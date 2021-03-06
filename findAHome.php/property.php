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
 * id for this Property; this is the primary key
 * 	@var int $propertyId
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
	 * constructor for this property
	 *
	 * @param int/null $newProperty id of this Property or null if a new Property
	 * @param int $newPrice the price of property
	 * @param int $newSquareFeet square feet of property
	 * @param string $newAddress string containing physical address of property
	 * @param string $newFloorPlan string containing the numbers of bedrooms and bathrooms inside property
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 **/
	public function __construct(int $newPropertyId = null, int $newPrice, int $newSquareFeet, string $newAddress, string $newFloorPlan = null) {
		try{
			$this->setPropertyId($newPropertyId);
			$this->setPrice($newPrice);
			$this->setsquareFeet($newSquareFeet);
			$this->setAddress($newAddress);
			$this->setFloorPlan($newFloorPlan);
		}catch(\InvalidArgumentException $invalidArgument){
			//rethrow the exception to the caller
		}
	}

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
		if(empty($newAddress) === true){
			throw(new \InvalidArgumentException("address is empty or insecure"));
		}
		//verify the address  will fit in the database
		if(strlen($newAddress) > 64) {
			throw(new \RangeException("address is too large"));
		}

		//store the new address
		$this->address = $newAddress;
	}
	/**
	 * accessor method for floor plan
	 *
	 * @return string value of floor plan
	 **/
	public function getFloorPlan() {
		return ($this->floorPlan);
	}
	/**
	 * mutator method for floor plan
	 *
	 * @param string %newFloorPlan new value of the number of bedrooms and bathrooms
	 * @throws \InvalidArgumentException if $newFloorPlan is not a string or insecure
	 * @throws \RangeException if $newFloorPlan is > 20 characters
	 * @throws \TypeError if $newFloorPlan is not a string
	 **/
	public function setFloorPlan(string $newFloorPlan) {
		// verify the floor plan is secure
		$newFloorPlan = trim($newFloorPlan);
		$newFloorPlan = filter_var($newFloorPlan, FILTER_SANITIZE_STRING);
		if(empty($newFloorPlan) === true){
			throw(new \InvalidArgumentException("floor plan is empty or insecure"));
		}

		//verify the floor plan will fit in the database
		if(strlen($newFloorPlan) > 20){
			throw(new \RangeException("floor plan too large"))
		}

		// store the floor plan
		$this->floorPlan = $newFloorPlan;
	}
	/**
	 * inserts this Property into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function insert(\pdo $pdo) {
		// enforce the property Id is null (i.e., don't insert a property that already exists)
		if($this->propertyId !== null){
			throw(new \PDOException("not a new property"));
		}

		// create query template
		$query = "INSERT INTO property(price, squareFeet, address, floorPlan) VALUES(:price, :squareFeet, :address, :floorPlan)";
		$statement = $pdo->prepare($query);

		// bind the member variables to the place holders in the template
		$parameters = ["price" => $this->price, "squareFeet" => $this-> squareFeet, "address" => $this->address, "floorPlan"=> $this->floorPlan ];
		$statement->execute($parameters);

		//update the null tweetId with what mySQL just gave us
		$this->propertyId = intval($pdo->lastInsertId());
	}

	/**
	 * deletes this Property from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo) {
		// enforce the propertyId is not null (i.e., don't delete a property that hasn't been inserted)
		if($this->propertyId === null){
			throw(new \PDOException("unable to delete a tweet that does not exist"));
		}
		// create query template
		$query = "DELETE FROM property WHERE propertyId = :propertyId";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holder in the template
		$parameters = ["propertyId" => $this->propertyId];
		$statement->execute($parameters);
	}

	/**
	 * updates this property in mySQL

	 @param \PDO $pdo PDO connection object
	 @throws \PDOException when mySQL related errors occur
	 @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo){
		// enforce the tweet Id is not null (i.e., don't update a property that has not been inserted)
		if($this->propertyId === null){
			throw(new \PDOException("unable to update a tweet that does not exist"));
		}

		//create query template
		$query = "UPDATE property SET price = :price, squareFeet = :squareFeet, address = :address, floorPlan = :floorPlan WHERE propertyId = :propertyId";
		$statement = $pdo->prepare($query);

		//bind the member variables to the place holders in the template
		$parameters = ["price" => $this->price, "squareFeet" => $this->squareFeet, "address" => $this->address, "floorPlan" => $this->floorPlan, "propertyId" => $this->propertyId];
		$statement->execute($parameters);
	}\
	/**
	 * gets the Property by address
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $address address to search for
	 * @return \ SplFixedArray SplFIxedArray of property found
	 * @throws \ PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getPropertyByaddress(\PDO $pdo, string $address)
	{
		//sanitize the description before searching
		$address = trim($address);
		if(empty($address) === true){
			throw(new \PDOException("address is invalid"));
		}

		//create query template
		$query = "SELECT propertyId, address, squareFeet, address, floorPlan FROM property WHERE address LIKE :address";
		$statement = $pdo->prepare($query);

		//bind the address to the place holders in the template
		$address = "%$address%";
		$parameters = array("address" => $address);
		$statement->execute($parameters);

		//build an array of tweets
		$properties = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch() !== false){
			try {
					$property = new property($row["propertyId"], $row["price"], $row["squareFeet"], $row["address"], $row["floorPlan"]);
					$properties[$properties->key()] = $property;
					$properties->next();
			}	catch(\Exception $exception){
					//if the row couldn't be converted, rethrow it
					throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}

		/**
		 * gets the property by propertyId
		 *
		 * @param \PDO $pdo PDO connection object
		 * @param int $propertyId property id to search for
		 * @return Property/null Property found or null if not found
		 * @throws \PDOException when mySQL related errors occur
		 * @throws \TypeError when variables are not the correct data type
		 **/
		public static function getPropertyByPropertyId(\PDO $pdo, int $propertyId){
		//sanitize the propertyId before searching
		if($propertyId <= 0){
			throw(new \PDOException("property id is not positive"));
		}

		//create query template
		$query = "SELECT propertyId, price, squareFeet, address, floorPlan FROM property WHERE propertyId = :propertyId";
		$statement = $pdo->prepare($query);

		//grab the property from mySQL
		try{
			$property = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($rows !== false){
				$property = new property($row["propertyId"], $row["price"], $row["squareFeet"], $row["address"], $row["floorPlan"]);
			}
		}catch(\Exception $exception){
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($property);
	}

		/**
		 * gets all Properties
		 *
		 * @param \PDO $pdo PDO connection object
		 * @return \SplFixedArray SplFixedArray of properties found or null
		 * @throws \PDOException when mySQL related errors occur
		 * @throws \TypeError when variables are not the correct data type
		 **/
		public static function getAllProperties(\PDO $pdo){
			// create query template
		$query = "SELECT propertyId, price, squareFeet, address, floorPlan FROM property";
		$statement = $pdo->prepare($query);
		$statement->execute();

		//build an array of properties
		$properties = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false){
			try{
				$property = new property($row["propertyId"], $row["price"], $row["squareFeet"], $row["address"], $row["floorPlan"]);
				$properties[$properties->key()] = $property;
				$properties->next();
			}catch(\Exception $exception){
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($properties);
	}
		
		/**
	 * formats the state variable s for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		return($fields);
	}
}
