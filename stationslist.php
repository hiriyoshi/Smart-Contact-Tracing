<!DOCTYPE html>
<html lang="en-US">
          <head> 
                    <link rel="stylesheet" href="/assets/mymain1.css">
                    <meta name="viewport" content="width=device-width, initial-scale=1" />
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                    <title>Stations List</title>
                    
          </head>
          <body>
                   <div class="sidenav">
                    <ul class="first">
                              <li> <a  href="hadmin.html">Home</a></li>
                              <li> <a href="registeredUsers.php">Users List</a></li>
                              <li> <a href="adminslist.php">Admins List</a></li>
                              <li><a class="active" href="stationslist.html">Stations List</a></li>
                              <li style="float: right"> <a href="index.php">Logout</a></li>
                    </ul>
                   </div>
          <main>
                    <h1>Stations List</h1>
                    <!-- for contact tracing, the head admin system and system user can able to use this.
                    you can use the search button by filling up either the
                        >QR code and
                        >the date
                    with qr code, it will search only the specific qr code 
                    if qr code is not fulfilled but with the date it will
                    display a table of that date and between of the date.
                    -->
                    <!-- search area -->
                    <div>
                        <div class="form-group">
                            <br>
                            <label for="textinput">Search Name</label>  
                                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                                            <div class="row"><br>
                                                  <div class="col-md-4">
                                                      <input id="fname" name="Sfname" type="text" placeholder="First Name" class="form-control input-md"><br>
                                                      <button type="submit" class="btn btn-primary" >Search</button>      
                                                  </div>
                                        
                                              <div class="col-md-4">
                                                  <input id="lname" name="Slname" type="text" placeholder="Last Name" class="form-control input-md"><br>
                                                  <button type="submit" class="btn btn-primary">Search</button>
                                              </div>

                                              <div class="col-md-4">
                                                  <input id="qrcode" name="QRcode" type="text" placeholder="QR code" class="form-control input-md"><br>
                                                  <button type="submit" class="btn btn-primary">Search</button>
                                              </div>

                                            </div>
                                        </form><br>
                                    <br>
                                    <div class="col-md-4">
                                                <label for="fromDate">From:</label>
                                                <input type="date" id="#" name="#">
                                    </div>
                                    <div class="col-md-4">
                                                <label for="intoDate">Into:</label>
                                                <input type="date" id="#" name="#">
                                    </div>
                            </div>
                            <br>
                    </div>
                    <!--List of stations buttons-->
                   <div>
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary" onclick="document.location='stationA.html' ">Station A</button>
                    <button id="singlebutton" name="singlebutton" class="btn btn-primary" onclick="document.location='stationB.html' ">Station B</button>
                    </div>
                    </div><br>

              <table>
                        <tr>
                                  <th>QR code</th>
                                  <th>First Name</th>
                                  <th>Last Name</th>
                                  <th>Contact No.</th>
                                  <th>Email Address</th>
                                  <th>Station</th>
                                  <th>Facial recognition image</th>
                                  <th>Date</th>
                                  <th>Time</th>
                                  <th>Body Heat Temperature</th>
                        </tr>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                  // collect value of input field
                                  $Sfname = $_REQUEST['Sfname'];
                                  $Slname = $_REQUEST['Slname'];
                                  if (!empty($Sfname)) {
                                            $result = mysqli_query($mysqli," SELECT  * FROM usersAndStations_table WHERE firstname LIKE '".$Sfname."' ");
                                                      while($row = mysqli_fetch_array($result))
                                                                {
                                                                echo "<tr>";
                                                                echo "<td>" . $row['QRcode'] . "</td>";
                                                                echo "<td>" . $row['firstname'] . "</td>";
                                                                echo "<td>" . $row['lastname'] . "</td>";
                                                                echo "<td>" . $row['contactno'] . "</td>";
                                                                echo "<td>" . $row['email'] . "</td>";
                                                                echo "<td>" . $row['address'] . "</td>";
                                                                echo "</tr>";
                                                                }
                                            echo "</table>";
                                            mysqli_close($mysqli);
                                  } elseif(!empty($Slname)) {
                                            
                                            $result = mysqli_query($mysqli," SELECT  * FROM customers_table WHERE lastname = '".$Slname."' ");
                                                      while($row = mysqli_fetch_array($result))
                                                      {
                                                                echo "<tr>";
                                                                echo "<td>" . $row['QRcode'] . "</td>";
                                                                echo "<td>" . $row['firstname'] . "</td>";
                                                                echo "<td>" . $row['lastname'] . "</td>";
                                                                echo "<td>" . $row['contactno'] . "</td>";
                                                                echo "<td>" . $row['email'] . "</td>";
                                                                echo "<td>" . $row['address'] . "</td>";
                                                                echo "</tr>";
                                                      }
                                                      echo "</table>";
                                                      mysqli_close($mysqli);
                                  } else {
                                            while($row = mysqli_fetch_array($result))
                                                      {
                                                                echo "<tr>";
                                                                echo "<td>" . $row['QRcode'] . "</td>";
                                                                echo "<td>" . $row['firstname'] . "</td>";
                                                                echo "<td>" . $row['lastname'] . "</td>";
                                                                echo "<td>" . $row['contactno'] . "</td>";
                                                                echo "<td>" . $row['email'] . "</td>";
                                                                echo "<td>" . $row['address'] . "</td>";
                                                                echo "</tr>";
                                                      }
                                            echo "</table>";
                                            mysqli_close($mysqli);
                                            }
                        }
              ?>
          </main>
                   
                   
                    
                              
          </body>
</html>