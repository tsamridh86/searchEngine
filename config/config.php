<?php
  
class connector	
 {
  	private $connection;
    private $hostName;
    private $userName;
    private $password;
    private $database;
  	
  	public function __construct()
  	{
  		$this->hostName = "localhost";
  		$this->userName = "root";
  		$this->password = "";
  		$this->database = "searchEngine";
  	}

  	//this function is used to open the connection between php & sql server
  	public function openConnection()
  	{
  		$this->connection = mysqli_connect($this->hostName,$this->userName,$this->password);
  		mysqli_select_db($this->connection , $this->database);
  	}

  	//this function is used to close the opened connection 
  	public function closeConnection()
  	{
  		if (isset($this->connection)) 
  			$this->connection->close();
  	}

  	//this function is for executing sql queries
  	public function executeQuery ( $query )
  	{
  		$this->openConnection();
  		$result = $this->connection->query($query);
  		$this->closeConnection();
  		return $result;
  	}

    public function getLastestId ()
    {
      $id = $this->executeQuery("select max(id) as max from files");
      $id = $id->fetch_assoc();
      $id = $id['max'];
      if($id != NULL) return  $id+1;
      else return 1;
    }
  }

  function checkExtension($extension)
  {
    $imageExtensions = array("jpg", "png", "bmp", "gif");
    $audioExtensions = array("mp3","wav","wma");
    $videoExtensions = array("avi", "mov", "mp4", "wmv", "3gp" );
    if($extension == "txt") return "text";
    else if (in_array($extension, $imageExtensions)) return "image";
    else if ($extension == "pdf") return "pdf";
    else if (in_array($extension, $audioExtensions)) return "audio";
    else if (in_array($extension, $videoExtensions)) return "video";
    else return "others";
  }

  
?>