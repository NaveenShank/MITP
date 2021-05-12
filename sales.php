<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="keywords" content="PHP" />
    <link href="styles/index.css" rel="stylesheet"/>
    <title>Sales - Peoples Health Pharmacy</title>
  </head>


  <body>
    <header>
        <div class="navbar">
       <a href="styles/images/Logo.png" target="_blank"> <img src="styles/images/Logo.png" alt="logo" title="Logo" class="logo" >
        </a>
      <nav>
          <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="sales.php" style="color:#ff8900;">Sales</a></li>
              <li><a href="searchsales.php">Search Sales</a></li>
              <li><a href="newsales.php">New Sales</a></li>
              <li><a href="">Predictions</a></li>
              <li><a href="">Download</a></li>
              <li><a href="login.php">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Logout</a></li>
          </ul>
        </nav>
        </div>
    </header>
    <main>
        <h1 style="text-align:center;color: #912121;">All Products </h1>

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
        <br/><br/><h1 style="text-align:center;color: #912121;">All Sales </h1>

      <?php
      //connects to database and runs query to display all data in sales table
      require_once("functions/process.php");
      $query = "select sales_id, product_id, available_units, units_sold,
      cost, purchase_date from sales";
      $results = mysqli_query($conn, $query);

      //displays data in table
      echo "<table width='80%' border='1'>";
      echo "<tr>
        <th>sales_id</th>
        <th>product_id</th>
        <th>available_units</th>
        <th>units_sold</th>
        <th>cost</th>
        <th>purchase_date</th>
        </tr>";
      while ($row = mysqli_fetch_assoc($results))
      {
        echo "<tr>
        <td>{$row['sales_id']}</td>
        <td>{$row['product_id']}</td>
        <td>{$row['available_units']}</td>
        <td>{$row['units_sold']}</td>
        <td>{$row['cost']}</td>
        <td>{$row['purchase_date']}</td>
        </tr>";
      }
      echo "</table>";
      mysqli_free_result($results);
      mysqli_close($conn);
      ?>

    </main>
     <footer> <p style="text-align:center;">
        Copyright Peoples Health Pharmacy© 2021</p>
    </footer>
  </body>
</html>
