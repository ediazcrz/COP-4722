<?php
print ("<br>");
$depNumber = isset($_POST['depNumber']) ? $_POST['depNumber'] : '';
$visited = isset($_POST['visited']) ? $_POST['visited'] : '';
$depNumbermsg = '';

if ($depNumber == '') {
  if ($visited) {	  
     $depNumbermsg = 'Please enter a department number';
  }

 // printing the form to enter the user input
 print <<<_HTML_
 <FORM method="POST" action="{$_SERVER['PHP_SELF']}">
 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
 <font color= 'red'>$depNumbermsg</font><br>
 Department Number: <input type="text" name="depNumber" size="9" value="$depNumber">
 <br/>
 <br>
 <INPUT type="submit" value=" Submit ">
 <INPUT type="hidden" name="visited" value="true">
 </FORM>
_HTML_;
 
}
else {
  require ('./dbConfig.php');
  $querystring = "SELECT dname, count(DISTINCT pno) as totalPno, sum(hours) as totalHours
                  FROM department, project, works_on
                  WHERE dnumber = '$depNumber' and dnumber = dnum and pno = pnumber
                  HAVING count(*) > 0";

  $result = mysqli_query($con, $querystring);

  if (!$result) {
    print ("Could not successfully run query ($querystring) from DB:".mysqli_error($con)."<br>");
    exit;
  }

  print ("Output for the department number $depNumber: <br>");
  
  if (mysqli_num_rows($result) == 0) {
    print ("&nbsp&nbsp&nbsp&nbsp Invalid department number $depNumber <br>");
    exit;
  }
  
  while ($row = mysqli_fetch_assoc($result)) {
    print "&nbsp&nbsp&nbsp&nbsp Department name: ".$row["dname"]."<br>";
    print "&nbsp&nbsp&nbsp&nbsp Number of projects: ".$row["totalPno"]."<br>";
    print "&nbsp&nbsp&nbsp&nbsp Total work hours: ".$row["totalHours"]."<br>"."<br>";
  }
  mysqli_free_result($result);
  mysqli_close($con);
}
?>