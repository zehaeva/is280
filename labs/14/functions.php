<?php
	

function dbconnerror($connection) {
	return 	"<p>Unable to connect to Server</p>".
			"<p>Error Code:". @mysqli_connect_errno($connection) .":". @mysqli_connect_error($connection);
}

function mysqli_prepared_query($link,$sql,$typeDef = FALSE,$params = FALSE){ 
  if($stmt = mysqli_prepare($link,$sql)){ 
	if(count($params) == count($params,1)){ 
	  $params = array($params); 
	  $multiQuery = FALSE; 
	} else { 
	  $multiQuery = TRUE; 
	}  
	
	if($typeDef){ 
	  $bindParams = array();    
	  $bindParamsReferences = array(); 
	  $bindParams = array_pad($bindParams,(count($params,1)-count($params))/count($params),"");         
	  foreach($bindParams as $key => $value){ 
		$bindParamsReferences[$key] = &$bindParams[$key];  
	  } 
	  array_unshift($bindParamsReferences,$typeDef); 
	  $bindParamsMethod = new ReflectionMethod('mysqli_stmt', 'bind_param'); 
	  $bindParamsMethod->invokeArgs($stmt,$bindParamsReferences); 
	} 
	
	$result = array(); 
	foreach($params as $queryKey => $query){ 
	  foreach($bindParams as $paramKey => $value){ 
		$bindParams[$paramKey] = $query[$paramKey]; 
	  } 
	  $queryResult = array(); 
	  if(mysqli_stmt_execute($stmt)){ 
		$resultMetaData = mysqli_stmt_result_metadata($stmt); 
		if($resultMetaData){                                                                               
		  $stmtRow = array();   
		  $rowReferences = array(); 
		  while ($field = mysqli_fetch_field($resultMetaData)) { 
			$rowReferences[] = &$stmtRow[$field->name]; 
		  }                                
		  mysqli_free_result($resultMetaData); 
		  $bindResultMethod = new ReflectionMethod('mysqli_stmt', 'bind_result'); 
		  $bindResultMethod->invokeArgs($stmt, $rowReferences); 
		  while(mysqli_stmt_fetch($stmt)){ 
			$row = array(); 
			foreach($stmtRow as $key => $value){ 
			  $row[$key] = $value;           
			} 
			$queryResult[] = $row; 
		  } 
		  mysqli_stmt_free_result($stmt); 
		} else { 
		  $queryResult[] = mysqli_stmt_affected_rows($stmt); 
		} 
	  } else { 
		$queryResult[] = FALSE; 
	  } 
	  $result[$queryKey] = $queryResult; 
	} 
	mysqli_stmt_close($stmt);   
  } else { 
	$result = FALSE; 
  } 
  
  if($multiQuery){ 
	return $result; 
  } else { 
	return $result[0]; 
  } 
} 

function initialize_db($connection, $dbname) {
	
	if (!@mysqli_select_db($connection, $dbname)) {
		$sql = 'create database `'. $dbname .'`;';
		@mysqli_query($connection, $sql) or die(dbconnerror($connection));
		echo '<p>Database successfully created</p>';
		
		@mysqli_select_db($connection, $dbname);
	}

	$table_name = 'divers';
	$sql = 'SELECT * FROM '. $table_name .';'; 
	$results = @mysqli_query($connection, $sql);
	if (!$results) {
		$sql_create = 'create table '. $table_name . ' (diverid int auto_increment primary key, firstname varchar(40), lastname varchar(40), phone varchar(20), address varchar(80), city varchar(40), state varchar(40), zip varchar(10), email varchar(80));';
		@mysqli_query($connection, $sql_create) or die(dbconnerror($connection));
		
		echo '<p>Table Created</p>';
	}
	
	$table_name = 'registration';
	$sql = 'SELECT * FROM '. $table_name .';'; 
	$results = @mysqli_query($connection, $sql);
	if (!$results) {
		$sql_create = 'create table '. $table_name . ' (registrationid int auto_increment primary key, diverid int, class varchar(40), days varchar(40), time varchar(40));';
		@mysqli_query($connection, $sql_create) or die(dbconnerror($connection));
		
		echo '<p>Table Created</p>';
	}
}


?>