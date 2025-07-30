<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href= https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css rel= "stylesheet">
    <link rel="stylesheet" href="taskStyle.css">

    <style>
     .brd{  /*border styling*/
        border: 2px solid;
        border-radius: 5px ;
        padding: 2px;
        margin-top: 1px;
        box-sizing: border-box;
       }
    .form-container{
     color: rgb(4, 4, 35);    
     max-width: 600px;
     margin: 0 auto;
     padding: 20px;
     border-radius: 8px;
     box-shadow: 0 0 10px rgba(20, 2, 2, 0.875);
     background-color: gainsboro }
  
    </style>   
</head>
<body > 
    <form class="form-container" method="post" action="checkConnect.php">
  <label for="name"> Name:</label><br>
  <input type="text" id="name" name="name" ><br>
  <label for="age">Age:</label><br>
  <input type="number"id="age" name="age" ><br><br>
  <input type="submit" value="Submit">

    <br> <br>

      <table border="1">
        <thead>
        <tr >
            <th> ID </th> 
            <th>|</th>
            <th> Name </th>
            <th>|</th>
            <th> Age </th>
            <th>|</th>
            <th> Status </th>
            <th>|</th>
            <th> Action </th>
        </tr>
        </thead>
    <tbody>
      <?php 
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "info";

          // Create connection
         $conn = new mysqli($servername, $username, $password, $dbname);


           // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
              }
           $sql = "SELECT * FROM user";
           $result = $conn->query($sql);

           // read data of each row
           while($row = $result->fetch_assoc()){
            echo " <tr >
            <td>" . $row["id"] . "<td>
            <td>" . htmlspecialchars($row["name"]) . "<td>  
            <td>" . $row["age"] . "<td>
            <td>" . ($row["status"] ? '1' : '0') . "<td> 
            <td>
              <a href='toggle.php?id=" .$row["id"] . "'class='btn btn-primary btn-sm' >Toggle</a>
             
            </td>
            </tr>";
           }
           
           ?>
      </form>
    </tbody>
    </table>
</body>
</html>




