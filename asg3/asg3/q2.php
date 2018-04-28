<?php
print ("<br>");
  require ('./dbConfig.php');
  $querystring = "SELECT t1.pno, concat(t1.fname, ' ', t1.lname) as t1Name, concat(t2.fname, ' ',t2.lname) as t2Name
                    FROM (SELECT pno, fname, lname, ssn
                          FROM employee, works_on
                          WHERE ssn = essn) as t1
                    JOIN 
                         (SELECT pno, fname, lname, ssn
                          FROM employee, works_on
                          WHERE ssn = essn) as t2
                  WHERE t1.pno = t2.pno and t1.ssn <> t2.ssn and t1.fname < t2.fname
                  order by pno";
                  
  $result = mysqli_query($con, $querystring);

  if (!$result) {
    print ("Could not successfully run query ($querystring) from DB: " . mysqli_error($con)."<br>");
    exit;
  }

  print("Output: <br>");

  if (mysqli_num_rows($result) == 0) {
    print ("&nbsp&nbsp&nbsp&nbsp&nbsp No pair of employees on the same project <br>");
    exit;
  }

print "<style>
  td {
    padding: 2px;
    text-align: left
  }
  
</style>";

print "<table>";

  //put result into a table
  while ($row = mysqli_fetch_assoc($result)) {
	
    print "<tr>";
    print "<td>&nbsp&nbsp&nbsp&nbsp".$row["pno"]."</td>";
    print "<td>&nbsp&nbsp&nbsp&nbsp".$row["t1Name"]."</td>";
    print"<td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp&nbsp&nbsp".$row["t2Name"]."</td>";
    print "</tr>";
  }
print "</table>";

  mysqli_free_result($result);
  mysqli_close($con);
?>