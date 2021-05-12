<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="keywords" content="PHP" />
     <link href="styles/index.css" rel="stylesheet"/>
    <title>Search Sales - Peoples Health Pharmacy</title>
  </head>

  <body>
    <header>
        <div class="navbar">
       <a href="styles/images/Logo.png" target="_blank"> <img src="styles/images/Logo.png" alt="logo" title="Logo" class="logo" >
        </a>
      <nav>
          <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="sales.php">Sales</a></li>
              <li><a href="searchsales.php" style="color:#ff8900;">Search Sales</a></li>
              <li><a href="">Predictions</a></li>
              <li><a href="">Download</a></li>
              <li><a href="login.php">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Logout</a></li>
          </ul>
        </nav>
        </div>
    </header>
    <main>
      
      <h1 style="text-align:center;color: #912121;">Please enter the details of the product</h1><br/>
      <!-- form entry to search for product id -->
      <p></p>
      <form method="post" action="searchsales.php">
          <fieldset>
      <p><label for="productid">Search Product (ID):</label>
      <input type="text" name="productid" id="productid" Size="40"/></p>
      <p><label for="productname">Search Product (Name):</label>
      <input type="text" name="productname" id="productname" Size="40"/></p>
      <p><label for="productdate">sales date:</label>
      <input type="date" name="productdate" id="productdate" Size="40"/></p>
      <p><input type="submit" name="submit" value="search"/></p></fieldset>
      </form>
      <p></p>


      <?php
 
      //checks for post of productid from form
      require_once("functions/process.php");
      if (!$_POST)
      {
        echo "<p></p>";
      }
      else
      {
        //sets product id and runs query to display the data for specific product
        //***curently not working
        $productid = trim($_POST["productid"]);
        $salesquery = "select product_id, available_units, units_sold, cost
        from sales where product_id = '$productid'";

        //***cant execute this query
        $results = mysqli_query($conn, $salesquery)
        or die('Unable to execute query');
          
        if($results->num_rows == 0)
        {
          echo "no matches";
        }
        else
        {
          echo "<table width='100%' border='1'>";
          echo "<tr>
          <th>product_id</th>
          <th>available_units</th>
          <th>units_sold</th>
          <th>cost</th>
          </tr>";
          while ($row = mysqli_fetch_assoc($results))
          {
            echo "<tr>
            <td>{$row['product_id']}</td>
            <td>{$row['available_units']}</td>
            <td>{$row['units_sold']}</td>
            <td>{$row['cost']}</td>
            </tr>";
          }
          echo "</table>";
        }
        mysqli_free_result($results);
          mysqli_close($conn);
      }
        

      ?>

    </main>
    
  </body>
</html>
