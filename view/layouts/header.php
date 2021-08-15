<?php

  use mvc\core\auth\Auth;
  use mvc\php\URL;

  $URI = $_SERVER['REQUEST_URI'];
  $pos = strpos("?", $URI);
  $URI = $pos === FALSE ? $URI : substr($URI, 0, $pos);
  $current_span = 'bg-dark text-light rounded';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light px-3">
  <a class="navbar-brand nav-link" href="<?php echo URL::getURL(); ?>">
    <img src="https://ui-avatars.com/api/?name=Up-Steam&background=000000&color=fffff" class="rounded-circle" width="35"/>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php if(!Auth::checkUser()) { ?>
        <li class="nav-item">
          <a class="nav-link <?php if ($URI == URL::getURL("login")) echo $current_span; ?>" href="<?php echo URL::getURL("login"); ?>">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if ($URI == URL::getURL("register")) echo $current_span; ?>" href="<?php echo URL::getURL("register"); ?>">Register</a>
        </li>
      <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link <?php if ($URI == URL::getURL("dashboard")) echo $current_span; ?>" href="<?php echo URL::getURL("dashboard"); ?>">Dashboard</a>
        </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link <?php if ($URI == URL::getURL("upload")) echo $current_span; ?>" href="<?php echo URL::getURL("upload"); ?>">Upload</a>
      </li>
      <?php if(Auth::canUserConfirm()) { ?>
        <li class="nav-item">
          <a class="nav-link <?php if ($URI == URL::getURL("requests")) echo $current_span; ?>" href="<?php echo URL::getURL("requests"); ?>">Requests</a>
        </li>
      <?php } ?>
      <?php if(Auth::isUserAdmin()) { ?>
        <li class="nav-item">
          <a class="nav-link <?php if ($URI == URL::getURL("users")) echo $current_span; ?>" href="<?php echo URL::getURL("users"); ?>">Users</a>
        </li>
      <?php } ?>
      <?php if(Auth::checkUser()) { ?>
        <form action="<?php echo URL::getURL(); ?>" method="POST">
          <li class="nav-item">
            <input type="submit" class="nav-link bg-danger text-light rounded mx-3" value="Logout" />
          </li>
        </form>
      <?php } ?>
    </ul>
  </div>
</nav>