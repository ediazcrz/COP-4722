<?php
print ("<br>");
$depName = isset($_POST['depName']) ? $_POST['depName'] : '';
$visited = isset($_POST['visited']) ? $_POST['visited'] : '';
$depNamemsg = '';

if (!($depName )) {
  if ($visited) {	  
     $depNamemsg = 'Please enter a department name';
  }

 // printing the form to enter the user input
 print <<<_HTML_
 <FORM method="POST" action="{$_SERVER['PHP_SELF']}">
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
 <font color= 'red'>$depNamemsg</font><br>
 Department Name: <input type="text" name="depName" size="9" value="$depName">
 <br/>
 <br>
 <INPUT type="submit" value=" Submit ">
 <INPUT type="hidden" name="visited" value="true">
 </FORM>
_HTML_;
 
}
else {
  require ('./dbConfig.php');
  $querystring = "SELECT dname, concat(m.fname, ' ', m.lname) as mName, count(e.ssn = essn) as depCount
                  FROM employee as e, employee as m, department, dependent
                  WHERE e.ssn = essn and m.ssn = mgrssn and e.dno = m.dno and dname = '$depName'
                  HAVING count(*) > 0";

  $result = mysqli_query($con, $querystring);

  if (!$result) {
    print ("Could not successfully run query ($querystring) from DB: ".mysqli_error($con)."<br>");
    exit;
  }

  print ("Output for the department name $depName: <br>");
  
  if (mysqli_num_rows($result) == 0) {
    print ("&nbsp&nbsp&nbsp&nbsp Invalid department name $depName <br>");
    exit;
  }
  
  while ($row = mysqli_fetch_assoc($result)) {
    print "&nbsp&nbsp&nbsp&nbsp Department name: ".$row["dname"]."<br>";
    print "&nbsp&nbsp&nbsp&nbsp Manager: ".$row["mName"]."<br>";
    print "&nbsp&nbsp&nbsp&nbsp Dependents: ".$row["depCount"]."<br>"."<br>";
  }
  mysqli_free_result($result);
  mysqli_close($con);
}
?>