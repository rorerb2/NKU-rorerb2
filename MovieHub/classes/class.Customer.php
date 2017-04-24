<?php class Customer{
	private $userid;
	private $name;
	private $database;
	
	function __construct($userid, $database){

		
	
	$sql = file_get_contents('sql/getUser.sql');
	$params = array(
	'userid' => $userid
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);
	$user = $users[0];
		$this->userid = $user['userid'];
		$this->username = $user['username'];
		$this->database = $database;
	}
	
	function getName(){
		return $this->username ;
	}
}
	

?>