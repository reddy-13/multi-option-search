<?php 

require 'db.php';



function get_userData($gen,$from,$to,$religion){
    global $con;
    
    $sql = "SELECT * FROM `user_data` WHERE `gender` = '$gen' AND (`age` BETWEEN '$from' and '$to') AND `religion`= '$religion'";
	$query = $con->query($sql);
    
    if (!$con->errno){
        if (isset($query->num_rows)) {
            
            $user = [];
            while($rows = $query->fetch_assoc()){
                
                $user[] = $rows;
            }
;           
        }else{
				return true;
			}
    }
    else {
		throw new ErrorException('Error: ' . $con->error . '<br />Error No: ' . $con->errno . '<br />' . $sql);
		exit();
	}
    
    return $user;
}

if(isset($_POST['action']) && $_POST['action'] == 'search'){
        $gender = $_POST['gender'];
        $fromAge = $_POST['fromAge'];
        $toAge = $_POST['ToAge'];
        $religion = $_POST['religion'];
        $user_data = get_userData($gender, $fromAge,$toAge,$religion);
        

          echo json_encode($user_data);
}