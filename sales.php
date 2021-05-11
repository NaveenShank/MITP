<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="keywords" content="PHP" />
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Sales - Peoples Health Pharmacy</title>
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

      <?php
      require_once("functions/process.php");

      $query = "select sales_id, product_id, available_units, units_sold,
      cost, purchase_date from sales";
      $results = mysqli_query($conn, $query);

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

    <footer>
        <p>Copyright Peoples Health Pharmacy© 2021<p>
    </footer>
  </body>
</html>
