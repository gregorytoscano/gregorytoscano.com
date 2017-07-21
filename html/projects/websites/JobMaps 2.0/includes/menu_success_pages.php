<nav class='navbar navbar-default navbar-fixed-top' role='navigation' style='background-color: #FFF;'>
  <div class='container'>
    <div class='navbar-header'>
      <button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
        <span class='sr-only'>Toggle navigation</span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
        <span class='icon-bar'></span>
      </button>
      <a href='./index.php'><img src='images/logo.png'></a>
    </div>
      <ul class='nav navbar-nav navbar-right'>
        <li><p class='navbar-text'>Welcome <?= $username ?></p></li>
        <li><p class='navbar-text'><a href="#"> Resume </a></p></li>
        <li><p class='navbar-text'><a href="#"> Settings </a></p></li>   
        <li><p class='navbar-text'><a href="includes/logout.php"> Logout </a></p></li>                  
      </ul>
  </div>
</nav>
