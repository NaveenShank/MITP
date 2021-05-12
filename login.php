<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="keywords" content="PHP" />
    <link href="styles/index.css" rel="stylesheet"/>
    <title>Login Authenticator - Peoples Health Pharmacy</title>
  </head>

  <body>
    <header>
     <div class="navbar">
       <a href="styles/images/Logo.png" target="_blank"> <img src="styles/images/Logo.png" alt="logo" title="Logo" class="logo" >
         </a></div>
        <h1 style="text-align: center; color: #912121; ">Welcome to People Health pharmacy </h1>
    </header>
      <br/><br/><br/><br/><br/><br/><br/>
      
    <main>
        <h2 style="text-align: center;">Please Login to view Sales records and predection</h2><br/><br/>
      <fieldset>
        <section>
          <article style="text-align: center;">
            <form action="Landing-Page_v2.0.html">
              <label for="Emp_ID">Employee ID:</label><br>
              <input type="text" id="Emp_ID" name="Emp_ID"><br>
              <label for="Emp_Pwd">Password:</label><br>
              <input type="text" id="Emp_Pwd" name="Emp_Pwd"><br>
              <input type=button onClick="parent.location='index.php'"
 value='Login'>
            </form>
          </article>
        </section>
      </fieldset>
    </main>

 <footer id="Footer"> <p style="text-align:center;">
        Copyright Peoples Health Pharmacy© 2021</p>
    </footer>
  </body>
</html>
