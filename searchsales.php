<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="keywords" content="PHP" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Search Sales - Peoples Health Pharmacy</title>
  </head>

  <body>
    <header>
      <img src="PHP_logo.png">
      <h2>Employee Login</h2>
      <nav>
        <a href="index.php">Home</a>
        <a href="sales.php">Sales</a>
        <a href="searchsales.php">Search Sales</a>
        <a href="">Predictions</a>
        <a href="">Download</a>
      </nav>
    </header>
    <main>
      <p></p>

      <?php
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
      mysqli_close($conn);
      ?>
      <p></p>
      <form action="searchsales.php" method="post">
      <p><label for="productid">Search Product (ID):</label>
      <input type="text" name="productid" Size="40"/></p>
      <p><button type="submit" value="Submit">Submit</button></p>
      </form>
      <p></p>


      <?php
      require_once("functions/process.php");
      if (!$_POST)
      {
        echo "<p>Please enter a product name to search</p>";
      }
      else
      {
        $productid = trim($_POST["productid"]);

        $salesquery = "select sales_id, available_units, units_sold, cost, purchase_date
        from sales
        where product_id = '$productid'";
        $results = mysqli_query($conn, $salesquery)

        or die('Unable to execute query');
        echo $results;

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
      }


      ?>

    </main>

    <footer>
        <p>Copyright Peoples Health Pharmacy© 2021<p>
    </footer>
  </body>
</html>
