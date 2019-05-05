
    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link  <?php echo $mod == 'home' ? 'active' : ''; ?>" href="index.php">
                  <span data-feather="cloud"></span>
                  Điều khiển
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?php echo $mod == 'device' ? 'active' : ''; ?>" href="<?php echo SITE_PATH; ?>?mod=device">
                  <span data-feather="cpu"></span>
                  Thiết bị
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link <?php echo $mod == 'relay' ? 'active' : ''; ?>" href="<?php echo SITE_PATH; ?>?mod=relay">
                  <span data-feather="hard-drive"></span>
                  Relay
                </a>
              </li>              
            </ul>
          </div>
        </nav>
