<!DOCTYPE html>
 <html>
 <head>
<style>
.error {color: #FF0000;}
</style>
 <title>
Lab 6
 </title>
 </head>
 <body>
<?php 
	$query = "";
    $input = "";
    
    if(isset($_POST["submit"])){
    	$query = $_POST["query"];
        $input = $_POST["input"];
	}
?>

<!--<div style="background-color:pink;width:60%;margin:auto;text-align:center;">-->
<div style="width:60%;margin:auto;">
<h1>City Info Query System</h1>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
<p><span class="error">* required field.</span></p>

Query by: 
<select name="query">
  <option value="city" >City</option>
  <option value="state" >State</option>
  <option value="income"  >Income</option>
</select> <br/><br/>

Type the State, City Name or Income that you want to search: <input type="text" name="input" 
value = ""
><span class="error">*
</span><br/><br/>
<input type=submit name="submit">
</form>
<hr/>

<?php 
    $CityInfo = array(    
    	array("New York", "NY", 8008278,103246,12345),
         array("Los Angeles", "CA", 3694820,100000,12346),
         array("Chicago", "IL", 2896016,93591,12347),
         array("Houston", "TX", 1953631,98174,12348),
         array("Philadelphia", "PA", 1517550,91083,12349),
         array("Phoenix", "AZ", 1321045,83412,29874),
         array("San Diego", "CA", 1223400,99247,29875),
         array("Dallas", "TX", 1188580,90111,29876),
         array("San Antonio", "TX", 1144646,89925,29877),
         array("Detroit", "MI",951270,80188,29878)
    );
    
    $selectedArrayRows = array();
    $selectedArrayCol;
    
    if(isset($_POST["submit"])){
    
    	$i = 0;
   		if ($query == "city") {
        	foreach($CityInfo as $cit){
    			if ($cit[0] == $input){
        			$selectedArrayRows[$i] = $cit;
                    $i++;
    			}
             }
		}elseif ($query == "state"){
        	 foreach($CityInfo as $cit){
    			if ($cit[1] == $input){
        			$selectedArrayRows[$i] = $cit;
                    $i++;
    			}
              }
        } elseif ($query == "income") {
        	  foreach($CityInfo as $cit){
    			if ($cit[3] >= $input){
        			$selectedArrayRows[$i] = $cit;
                    $i++;
    			}
             }
        }
        
        echo "<table border=1>";
		echo "<tr><th>City</th><th>State</th><th>Population</th><th>Income</th><th>Zip Code</th></tr>";
			foreach($selectedArrayRows as $index => $city){
            echo "<tr>";
        		foreach($city as $value) echo "<td>" . $value . "</td>";
        	echo "</tr>";
    		}
		echo "</table>";
        
       	echo "<br/>" . $i . " cities found!<br/>";
	}
?>


</div>
 </body>
 </html> 
