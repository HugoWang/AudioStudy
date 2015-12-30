<?php

		// 
// 		$server = "soundstudy.cvd47iwnttus.eu-central-1.rds.amazonaws.com";
// 		$username = "UCF_2015_Wang";
// 		$password = "s0undUCF";
// 		$base = "soundstudy";
// 		
// 		$conn = new mysqli($server, $username, $password, $base);
		
		$server_mamp = "localhost";
		$username_mamp = "ucf";
		$password_mamp = "";
		$base_mamp = "ubiquitous";
		
		$conn_mamp = new mysqli($server_mamp, $username_mamp, $password_mamp, $base_mamp);
		
		//Now we will store the informations in the database
		$id = 0;
		$db = mysqli_connect($server_mamp, $username_mamp, $password_mamp, $base_mamp);		
		$req = mysqli_query($db, "SELECT MAX(num_no_player) as max FROM no_player;") or die(mysqli_error);
		while($data = mysqli_fetch_assoc($req)){
			$id = $data['max'] ;
		}	
		
		//The display
		$display = 3;
		
		//Initilization of the variables
		$id = $id +1;
		// 
// 		$stmt = $conn->prepare("INSERT INTO `soundstudy`.`no_player` (`num_no_player`,`display`)	 VALUES (?, ?)");
//                 if($stmt)
//                 {
//                     $stmt->bind_param("is" , $id, $display);
//                     $stmt->execute();
//                     $stmt->close();
// 					$conn->close();
// 
//                 }
//                 else {
//                    // echo "something went horribly wrong in the insert.";
//                 }
                
         $stmt_mamp = $conn_mamp->prepare("INSERT INTO `ubiquitous`.`no_player` (`num_no_player`,`display`)	 VALUES (?, ?)");
                if($stmt_mamp)
                {
                    $stmt_mamp->bind_param("is" , $id, $display);
                    $stmt_mamp->execute();
                    $stmt_mamp->close();
					$conn_mamp->close();

                }
                else {
                    echo "something went horribly wrong in the insert_mamp.";
                }       
		?>		
				