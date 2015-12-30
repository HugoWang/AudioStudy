<?php
	$xcoord = $_GET["x"];
	$ycoord = $_GET["y"];
	$music = $_GET["music"];
	
	//$timestamp = date("d.m.Y-H:i:s");
   //header( "Location: http://www.ubioulu.fi/signalstudy/kyselylomake_fin.php?x=$xcoord&y=$ycoord&timestamp=$timestamp" ) ;
    //echo("".$xcoord.", ".$ycoord.", ".$timestamp);	

    //save the click event to database
  //   $server = "soundstudy.cvd47iwnttus.eu-central-1.rds.amazonaws.com";
// 		$username = "UCF_2015_Wang";
// 		$password = "s0undUCF";
// 		$base = "soundstudy";
// 
//     $conn = new mysqli($server, $username, $password, $base);
//     
   $server_mamp = "localhost";
		$username_mamp = "ucf";
		$password_mamp = "";
		$base_mamp = "ubiquitous";
		
	$conn_mamp = new mysqli($server_mamp, $username_mamp, $password_mamp, $base_mamp);

    //Now we will store the informations in the database
    $id = 0;
    $db = mysql_connect($server_mamp, $username_mamp, $password_mamp);
    mysql_select_db($base_mamp,$db);    

   // if ($xcoord != null && $ycoord != null){        
//         $stmt = $conn->prepare("INSERT INTO clickevents (xcoord, ycoord, music) VALUES (?, ?, ?)");
//         if($stmt)
//         {
//             $stmt->bind_param("iii" , $xcoord, $ycoord, $music);
//             $stmt->execute();
//             $stmt->close();
//             $conn->close();
//         }
//         else {
//            // echo "prepare statement false in rredirect".$stmt->error_list;
//         }
//     }
    
     if ($xcoord != null && $ycoord != null){        
        $stmt_mamp = $conn_mamp->prepare("INSERT INTO clickevents (xcoord, ycoord, music) VALUES (?, ?, ?)");
        if($stmt_mamp)
        {
            $stmt_mamp->bind_param("iii" , $xcoord, $ycoord, $music);
            $stmt_mamp->execute();
            $stmt_mamp->close();
            $conn_mamp->close();
        }
        else {
            echo "prepare statement false in redirect_mamp".$stmt->error_list;
        }
    }
	
    header( "Location: flags.html");
?>