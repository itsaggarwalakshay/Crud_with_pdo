<?php
class post{
	//db stuff
	private $con;
	// private $table = 'posts';

	//post properties
	public $id;
	public $name;
	public $marks;

	//constructor with db connection
	public function __construct($db){
		$this->conn = $db;
	}
	// --create--
	public function create()
	{
		//insert query	
		$query = "INSERT INTO `posts` SET name = :name, marks = :marks";
		// prepare statement
		$stmt = $this->conn->prepare($query);
		//clean data 
		$this->name = htmlspecialchars(strip_tags($this->name));
		$this->marks = htmlspecialchars(strip_tags($this->marks));
		//binding parameter
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':marks',$this->marks);
		//execute query
		if ($stmt->execute()) {
			return true;
		}else{
			// print error here if query failed
			printf("Error %s. \n",$stmt->error);
			return false;
		}
		
	}
	// display data from database
	public function read()
	{
		$query = "SELECT * from  posts";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}
	// --read-single-data--
	public function read_single()
	{
		$query = "SELECT * from  posts WHERE id = ?";

		$stmt = $this->conn->prepare($query);

		$stmt->bindParam(1, $this->id);

		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->id = $row['id'];
		$this->name = $row['name'];
		$this->marks = $row['marks'];
	}
	
	// --update---
	public function update()
	{
		//insert query	
		$query = "UPDATE `posts` SET name = :name, marks = :marks WHERE id = :id";
		// prepare statement
		$stmt = $this->conn->prepare($query);
		//clean data 
		$this->id  	 = htmlspecialchars(strip_tags($this->id));
		$this->name  = htmlspecialchars(strip_tags($this->name));
		$this->marks = htmlspecialchars(strip_tags($this->marks));
		//binding parameter
		$stmt->bindParam(':id',$this->id);
		$stmt->bindParam(':name',$this->name);
		$stmt->bindParam(':marks',$this->marks);
		//execute query
		if ($stmt->execute()) {
			return true;
		}else{
			// print error here if query failed
			printf("Error %s. \n",$stmt->error);
			return false;
		}
		
	}
	// ---delete--
	public function delete()
	{
		$query = "DELETE FROM `posts` WHERE id = :id";
		// prepare statement
		$stmt = $this->conn->prepare($query);
		//clean data 
		$this->id = htmlspecialchars(strip_tags($this->id));
		//binding parameter
		$stmt->bindParam(':id',$this->id);
		//execute query
		if ($stmt->execute()) {
			return true;
		}else{
			// print error here if query failed
			printf("Error %s. \n",$stmt->error);
			return false;
		}
	}

}

?>