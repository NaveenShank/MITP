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
              <li><a href="login.php">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Logout</a></li>
          </ul>
        </nav>
        </div>
    </header>
    <main>
      

      <?php
      //connects to database and runs query to display all products with id
      require_once("functions/process.php");
      $query = "select product_id, product_name from products";
      $results = mysqli_query($conn, $query);
      echo "<table width='50%' border='1'>";
      echo "<tr>
        <th>Product ID</th>
        <th>Product Name</th>
        </tr>";
      while ($row = mysqli_fetch_assoc($results))
      {
        echo "<tr>
        <td>{$row['product_id']}</td>
        <td>{$row['product_name']}</td>
        </tr>";
      }
      echo "</table>";
      mysqli_free_result($results);
      
      ?>


      <!-- form entry to search for product id -->
      <p></p>
      <form method="post" action="searchsales.php">
          <fieldset>
      <p><label for="productid">Search Product (ID):</label>
      <input type="text" name="productid" id="productid" Size="40"/></p>
      <p><input type="submit" name="submit" value="search"/></p></fieldset>
      </form>
      <p></p>


      <?php
 
      //checks for post of productid from form
      require_once("functions/process.php");
      if (!$_POST)
      {
        echo "<p>Please enter a product id to search</p>";
      }
      else
      {
        //sets product id and runs query to display the data for specific product
        //***curently not working
        $productid = trim($_POST["productid"]);
        $salesquery = "select sales_id, available_units, units_sold, cost, purchase_date
        from salesdb
        where product_id = '$productid'";

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
          <th>sales_id</th>
          <th>available_units</th>
          <th>units_sold</th>
          <th>cost</th>
          <th>purchase_date</th>
          </tr>";
          while ($row = mysqli_fetch_assoc($results))
          {
            echo "<tr>
            <td>{$row['sales_id']}</td>
            <td>{$row['available_units']}</td>
            <td>{$row['units_sold']}</td>
            <td>{$row['cost']}</td>
            <td>{$row['purchase_date']}</td>
            </tr>";
          }
          echo "</table>";
        }
        mysqli_free_result($results);
          mysqli_close($conn);
      }
        

      ?>

    </main>
    <footer id="Footer"> <p style="text-align:center;">
        Copyright Peoples Health Pharmacy© 2021</p>
    </footer>
  </body>
</html>
