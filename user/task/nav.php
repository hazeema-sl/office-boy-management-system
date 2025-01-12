<!-- navigation.php -->
 <link rel="stylesheet" href="../../css/nav.css">
 <link rel="stylesheet" href="../../Bootstrap/dist/css/bootstrap.css">
 <script src="../../Bootstrap/dist/js/bootstrap.js"></script>
<nav>
      <a href="../home.php">
        <img id="logo" src='../../assets/icons/logo.svg' alt="logo" />
      </a>
      <input type="checkbox" id="sidebar-active" />
      <label for="sidebar-active" class="open-sidebar-button">
        <img class="icons" src="../../assets/icons/Nav/menu.svg" />
      </label>
      <label for="sidebar-active" id="overlay"></label>
      <div class="links-container">
        <label for="sidebar-active" class="close-sidebar-button">
          <img class="icons" src='../../assets/icons/Nav/close.svg' />
        </label>
        
        <a href="../request/request.php">Order</a>
        <a href="../history/menu.php">History</a>
        <a href="./menu.php">Daily Tasks</a>
        <a href="../logout.php">
          <img class='logout' src="../../assets/icons/Nav/logout.svg" alt="logout">
        </a>
      </div>
    </nav>


