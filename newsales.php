<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="keywords" content="PHP" />
     <link href="styles/index.css" rel="stylesheet"/>
    <title>New Sales - Peoples Health Pharmacy</title>
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
              <li><a href="newsales.php">New Sales</a></li>
              <li><a href="">Predictions</a></li>
              <li><a href="">Download</a></li>
              <li><a href="login.php">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Logout</a></li>
          </ul>
        </nav>
        </div>
    </header>
    <main>

      <h1 style="text-align:center;color: #912121;">Please enter the details of the new sale</h1><br/>
      <!-- form entry to add new sale -->
      <p></p>
      <form method="post" action="newsales.php">
          <fieldset>
      <p><label for="product_id">Product (ID):</label>
      <input type="number" name="product_id" id="product_id" Size="40" required="required"/></p>
      <p><label for="available_units">Available Units:</label>
      <input type="number" name="available_units" id="available_units" Size="40" required="required"/></p>
      <p><label for="units_sold">Units Sold:</label>
      <input type="number" name="units_sold" id="units_sold" Size="40" required="required"/></p>
      <p><label for="cost">Cost:</label>
      <input type="number" name="cost" id="cost" Size="40" required="required"/></p>
      <p><input type="submit" name="submit" value="add"/></p></fieldset>
      </form>
      <p></p>

      <?php
      //checks for post of productid from form
      require_once("functions/process.php");
      if (!$_POST)
      {
        echo "<p>Please enter New Sale</p>";
      }
      else
      {
        //sets values from form, query for mysql
        $product_id = trim($_POST["product_id"]);
        $available_units = trim($_POST["available_units"]);
        $units_sold = trim($_POST["units_sold"]);
        $cost = trim($_POST["cost"]);
        $query = "insert into sales(product_id, available_units, units_sold,
         cost, purchase_date)
        values ($product_id, $available_units, $units_sold, $cost, now())";

        //checks if mysql was successful
        if (mysqli_query($conn, $query))
        {
          echo "<p>Record updated successfully</p>";
        }
        else
        {
          echo "<p>Record updated not successful</p>";
        }
      }

      //shows all sales
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
      ?>

    </main>
  </body>
</html>
