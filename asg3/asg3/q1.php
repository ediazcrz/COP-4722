<?php
print ("<br>");
$depName = isset($_POST['depName']) ? $_POST['depName'] : '';
$visited = isset($_POST['visited']) ? $_POST['visited'] : '';
$depNamemsg = '';

if (!($depName )) {
  if ($visited) {	  
     $depNamemsg = 'Please enter a dependents name';
  }

 // printing the form to enter the user input
 print <<<_HTML_
 <FORM method="POST" action="{$_SERVER['PHP_SELF']}">
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
 <font color= 'red'>$depNamemsg</font><br>
 Dependent Name: <input type="text" name="depName" size="9" value="$depName">
 <br/>
 <br>
 <INPUT type="submit" value=" Submit ">
 <INPUT type="hidden" name="visited" value="true">
 </FORM>
_HTML_;
 
}
else {
  require ('./dbConfig.php');
  $querystring = "SELECT dependent_name as dName, concat(e.fname, ' ', e.lname) as eName, concat(m.fname, ' ', m.lname) as mName 
                  FROM dependent, employee as e, employee as m, department 
                  WHERE dependent_name = '$depName' and essn = e.ssn and m.ssn = mgrssn and e.dno = m.dno";
                  
  $result = mysqli_query($con, $querystring);

  if (!$result) {
    print ("Could not successfully run query ($querystring) from DB: ".mysqli_error($con)."<br>");
    exit;
  }

  print("Output for the dependent $depName: <br>");

  if (mysqli_num_rows($result) == 0) {
    print "&nbsp&nbsp&nbsp&nbsp Invalid Dependent name $depName <br>";
    exit;
  }
  
  while ($row = mysqli_fetch_assoc($result)) {
    print "&nbsp&nbsp&nbsp&nbspDependent: ".$row["dName"]."<br>";
    print "&nbsp&nbsp&nbsp&nbspEmployee: ".$row["eName"]."<br>";
    print "&nbsp&nbsp&nbsp&nbspManager: ".$row["mName"]."<br>"."<br>";
  }
  mysqli_free_result($result);
  mysqli_close($con);
}
?>