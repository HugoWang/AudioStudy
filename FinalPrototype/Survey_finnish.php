<?php error_reporting(E_ALL); ini_set('display_errors', 'On'); ?>
<?php
		// $server = "soundstudy.cvd47iwnttus.eu-central-1.rds.amazonaws.com";
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
		$req = mysqli_query($db, "SELECT MAX(int_player) as max FROM player;") or die(mysqli_error);
		while($data = mysqli_fetch_assoc($req)){
			$id = $data['max'] /*+1*/;
		}	
		
		//The display
		$display = 3;
		
		
		//Initilization of the variables
		$id = $id +1;
		$gender = 0;
		$age = 0;
		$q1 = 0;
		$q2 = 0;
		$q3 = 0;
		$q4 = 0;
		$lang = "suomi";
		
		$ref = $_SERVER['HTTP_REFERER'];
		if(strpos($ref,'flags') !== false) {
		// $stmt = $conn->prepare("INSERT INTO `soundstudy`.`player` (`int_player`,`int_display`, `gender`, `age`, `answer_question1`, `answer_question2`, `answer_question3` ,`answer_question4` , lang) VALUES (?, ?, ?, ?, ?, ?, ? ,?, ?)");
//                 if($stmt)
//                 {
//                     $stmt->bind_param("iiiiiiiis" , $id, $display, $gender, $age, $q1, $q2, $q3, $q4, $lang);
//                     $stmt->execute();
//                     $stmt->close();
// 
//                 }
//                 else {
//                     echo "something went horribly wrong in the insert.";
//                 }
                
        $stmt_mamp = $conn_mamp->prepare("INSERT INTO `ubiquitous`.`player` (`int_player`,`int_display`, `gender`, `age`, `answer_question1`, `answer_question2`, `answer_question3` ,`answer_question4`, lang) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                if($stmt_mamp)
                {
                    $stmt_mamp->bind_param("iiiiiiiis" , $id, $display, $gender, $age, $q1, $q2, $q3, $q4 ,$lang);
                    $stmt_mamp->execute();
                    $stmt_mamp->close();

                }
                else {
                    echo "something went horribly wrong in the insert_mamp.";
                }      
        }  
        $valid = true;
        $errormsg = "";

		if (isset($_POST['submit'])){
			//die('here i am');
			//here we pick up the value for the gender, 1 for a man, 2 for a girl
			$gender = 0;
			if (isset($_POST['gender'])){
				if ($_POST['gender'] == "male"){
					$gender = 1;
				}
				else $gender = 2;
			}
            else {
                $valid = false;
            }
			
			//here the value of the age
			$age = 0;
			if (isset($_POST['age'])){
				if ($_POST['age'] == "age18"){
					$age = 1;
				}
                else if ($_POST['age'] == "age24"){
					$age = 2;
				}
                else if ($_POST['age'] == "age31"){
					$age = 3;
				}
                else if ($_POST['age'] == "age38"){
					$age = 4;
				}
				else if ($_POST['age'] == "age45"){
					$age = 5;
				}
				else $age = 6;
			}
            else {
                $valid = false;
            }
			
			//The value for the first question
			$q1 = 0;
			if (isset($_POST['q1'])){
				if ($_POST['q1'] == "a1_q1"){
					$q1 = 1;
				}
                else if ($_POST['q1'] == "a2_q1"){
					$q1 = 2;
				}
                else if ($_POST['q1'] == "a3_q1"){
					$q1 = 3;
				}
                else if ($_POST['q1'] == "a4_q1"){
					$q1 = 4;
				}
				else $q1 = 5;
			}
            else {
                $valid = false;
            }
			
			//The value for the second question		
			$q2 = 0;
			if (isset($_POST['q2'])){
				if ($_POST['q2'] == "a1_q2"){
					$q2 = 1;
				}
                else if ($_POST['q2'] == "a2_q2"){
					$q2 = 2;
				}
                else if ($_POST['q2'] == "a3_q2"){
					$q2 = 3;
				}
                else if ($_POST['q2'] == "a4_q2"){
					$q2 = 4;
				}
				else $q2 = 5;
			}
			else {
                $valid = false;
            }
            
			//The value for the third question
			$q3 = 0;
			if (isset($_POST['q3'])){
				if ($_POST['q3'] == "a1_q3"){
					$q3 = 1;
				}
                else if ($_POST['q3'] == "a2_q3"){
					$q3 = 2;
				}
                else if ($_POST['q3'] == "a3_q3"){
					$q3 = 3;
				}
                else if ($_POST['q3'] == "a4_q3"){
					$q3 = 4;
				}
				else $q3 = 5;
			}
            
            else {
                $valid = false;
            }
            
            //The value for the fourth question
			$q4 = 0;
			if (isset($_POST['q4'])){
				if ($_POST['q4'] == "a1_q4"){
					$q4 = 1;
				}
                else if ($_POST['q4'] == "a2_q4"){
					$q4 = 2;
				}
                else if ($_POST['q4'] == "a3_q4"){
					$q4 = 3;
				}
                else if ($_POST['q4'] == "a4_q4"){
					$q4 = 4;
				}
				else $q4 = 5;
			}
            
            else {
                $valid = false;
            }
            
            //The value for the fifth question
			/*$q5 = 0;
			if (isset($_POST['q5'])){
				if ($_POST['q5'] == "a1_q5"){
					$q5 = 1;
				}
                else if ($_POST['q5'] == "a2_q5"){
					$q5 = 2;
				}
                else if ($_POST['q5'] == "a3_q5"){
					$q5 = 3;
				}
                else if ($_POST['q5'] == "a4_q5"){
					$q5 = 4;
				}
				else $q5 = 5;
			}
            
            else {
                $valid = false;
            }*/
            
			
			$timestamp = date('Y-m-d H:i:s');
			
			
             if($valid)
            {
				$id_update = $id - 1;
                // $stmt = $conn->prepare("UPDATE `player` SET `gender` = ?, `age` = ?, `answer_question1` = ?, `answer_question2` = ?, `answer_question3` = ?, `answer_question4` = ?,`timestamp_end` = ?, lang = ? WHERE `player`.`int_player` = ?;");
//                 if($stmt)
//                 {
//                     $stmt->bind_param("iiiiiissi" , $gender, $age, $q1, $q2, $q3, $q4, $timestamp, $lang, $id_update);
//                     $stmt->execute();
//                     $stmt->close();
//                     
//                 }
//                 else {
//                     echo "something went horribly wrong in the update.";
//                 }
// 				
// 				//For delete the additional line
// 				$stmt = $conn->prepare("DELETE FROM `soundstudy`.`player` WHERE `player`.`int_player` = ?;");
//                 
//                 $check = false;
//                 
//                 if($stmt)
//                 {
//                     $stmt->bind_param("i" , $id);
//                     $stmt->execute();
//                     $stmt->close();
//                     $conn->close();
//                 	
//                 	$check = true;
//                     
//                     //thanks();
//                     
// 				
//                 }
//                 else {
//                     echo "something went horribly wrong in the delete.";
//                 }
//                 
                $stmt_mamp = $conn_mamp->prepare("UPDATE `player` SET `gender` = ?, `age` = ?, `answer_question1` = ?, `answer_question2` = ?, `answer_question3` = ?, `answer_question4` = ?,`timestamp_end` = ?, lang = ? WHERE `player`.`int_player` = ?;");
                if($stmt_mamp)
                {
                    $stmt_mamp->bind_param("iiiiiissi" , $gender, $age, $q1, $q2, $q3, $q4, $timestamp, $lang, $id_update);
                    $stmt_mamp->execute();
                    $stmt_mamp->close();
                    
                }
                else {
                    echo "something went horribly wrong in the update_mamp.";
                }
				
				//For delete the additional line
				$stmt_mamp = $conn_mamp->prepare("DELETE FROM `ubiquitous`.`player` WHERE `player`.`int_player` = ?;");
                
                $check = false;
                
                if($stmt_mamp)
                {
                    $stmt_mamp->bind_param("i" , $id);
                    $stmt_mamp->execute();
                    $stmt_mamp->close();
                    $conn_mamp->close();
                	
                	$check = true;
                    
                    //thanks();
                    
				
                }
                else {
                    echo "something went horribly wrong in the delete_mamp.";
                }
            }
            
            if($check) {
            //die('in if check');
             header('Location:thankyou.html');
            }
            else {
                $conn->close();
                $errormsg = "<div class='error'>Please answer all questions!</div>";
            }
        }
		function thanks() {
			header("Location: thankyou.html");
		}
		
	?>
<!doctype html>

<html> 
	
	<head>
        <meta charset="utf-8">
		<link rel="stylesheet" href="style.css" />
        
		<title> Survey </title>
        <script src="jquery.js"></script>
        <script type="text/javascript">            
        $(document).ready(function() {
            $('form').submit(function(e){
                // validation code here
                valid = true;

                if(!$("input:radio[name=gender]:checked").val())
                {   
                    valid = false;
                }
				if(!$("input:radio[name=age]:checked").val())
                {   
                    valid = false;
                }
                if(!$("input:radio[name=q1]:checked").val())
                {   
                    valid = false;
                }
                if(!$("input:radio[name=q2]:checked").val())
                {   
                    valid = false;
                }
                if(!$("input:radio[name=q3]:checked").val())
                {   
                    valid = false;
                }
                if(!$("input:radio[name=q4]:checked").val())
                {   
                    valid = false;
                }


                if(!valid) {
                    e.preventDefault();
                    $(".error").css("display", "block");
                }
            });      
            
            var d = new Date();
            var lastClick = d.getTime();
            
            $('body').click(function() {                    
                d = new Date();            
                lastClick = d.getTime();
            });
            
            setInterval(function() {
                d = new Date();            
                console.log(lastClick+","+d.getTime());
                
                var t = d.getTime();
                if(t-lastClick > 30000)
                {
                     window.location.href = 'index.html';
                }
            
            }, 2000);
        });
    
    </script>
	</head>
	
	<!--
	This part is for the survey
	-->
	<body oncontextmenu="return false" unselectable="on" onselectstart="return false;">		
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" name="formulaire">            
			<fieldset class="cadre">
			       <div style="z-index:10; position:relative;"> <a href="Survey.php"><img draggable="false" id="flag" src="flags/gb.png"></a>
			       </div>
			       <div style="z-index:3;">
			    <h1>Moi, vastaisitko näihin kysymyksiin :)</h1>               
                </div>
                
				<div align="center" id="gender">
                    <table>
                        <tr>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle">Mies</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle">Nainen</td>
                            <td width="20">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td width="20">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td width="20">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td width="20">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>                        
                        <tr>
                            <td align="right" valign="middle">Sukupuoli :</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="gender"	value="male" /></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="gender"	value="female" /></td>
                            <td width="20">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td width="20">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td width="20">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td width="20">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>       
                        <tr><td colspan="13" height="40">&nbsp;</td></tr>
                        <tr>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle">&lt;18</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle">18-24</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle">25-31</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle">32-38</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle">39-45</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle">&gt;45</td>
                        </tr>                        
                        <tr>
                            <td align="right" valign="middle">Ikä:</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="age"	value="age18"> </td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="age"	value="age24"> </td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="age"	value="age31"> </td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="age"	value="age38"> </td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="age"	value="age45"> </td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="age"	value="age99"> </td>
                        </tr>    
                        <tr><td colspan="13" height="20">&nbsp;</td></tr>
                        <tr>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle">Eri mieltä</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle">En osaa sanoa</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle">&nbsp;</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle">Samaa mieltä</td>
                            <td width="20">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>                        
                        <tr>
                            <td align="center" valign="middle">Ääni, joka tuli näytöstä kiinnitti huomioni</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q1"	value="a1_q1"></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q1"	value="a2_q1"></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q1"	value="a3_q1"></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q1"	value="a4_q1"></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q1"	value="a5_q1"></td>
                            <td width="20">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr><td colspan="13" height="20">&nbsp;</td></tr>
                        <tr>
                            <td align="center" valign="middle">Teksti, joka oli näytöllä kiinnitti huomioni</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q2"	value="a1_q2"></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q2"	value="a2_q2"></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q2"	value="a3_q2"></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q2"	value="a4_q2"></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q2"	value="a5_q2"></td>
                            <td width="20">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr><td colspan="13" height="20">&nbsp;</td></tr>
                        <tr>
                            <td align="center" valign="middle">Ääni, joka tuli näytöstä antoi minun ymmärtää, että näyttö on vuorovaikutteinen</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q3"	value="a1_q3"></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q3"	value="a2_q3"></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q3"	value="a3_q3"></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q3"	value="a4_q3"></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q3"	value="a5_q3"></td>
                            <td width="20">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr><td colspan="13" height="20">&nbsp;</td></tr>
                        <tr>
                            <td align="center" valign="middle">Teksti, joka oli näytössä antoi minun ymmärtää, että näyttö on vuorovaikutteinen</td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q4"	value="a1_q4"></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q4"	value="a2_q4"></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q4"	value="a3_q4"></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q4"	value="a4_q4"></td>
                            <td width="20">&nbsp;</td>
                            <td align="center" valign="middle"><input type="radio" name="q4"	value="a5_q4"></td>
                            <td width="20">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr><td colspan="13" height="20">&nbsp;</td></tr>
                        
                    </table>                    
				</div>
                <div class="error">Vastaa kaikkiin kysymyksiin, kiitos!</div>
                				
				<div align="center" id="submit">
					<input type="submit" name="submit" value="Submit" /> 
				</div>
			
			</fieldset>
		</form>	   
	</body>	
</html>