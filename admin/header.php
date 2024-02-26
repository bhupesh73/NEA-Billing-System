<div class="navbar">
    <div class="navbar-logo">
      <img src="logo.png" alt="Logo" width="50" height="50">
    </div>
    <div class="navbar-profile">
      <?php
      if (isset($_SESSION['aid'])) {
        $username = $_SESSION['adname'];
        echo "$username";
        echo '<div class="dropdown">';
        echo '<img src="profile-icon.jpg" alt="Profile Icon" width="30" height="30">';
        echo '<div class="dropdown-content">';
        echo '<a href="profile.php">Profile</a>';
        echo '<a href="adminpanel.php">Admin Panel</a>';
        if($_SESSION['superadmin']==1){
          echo'<a href="admintable.php">Manage Admins</a>';
        }
        echo '<a href="logout.php">Logout</a>';
;
        echo '</div>';
        echo '</div>';
      } else {
        echo '<a href="login.php">Login</a>';
      }
      ?>
    </div>
  </div>