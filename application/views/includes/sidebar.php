    
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">

      <?php if($page == "dashboard-nav"): ?>
        <li id="dashboard-nav" class="nav-item active">
      <?php else: ?>
        <li id="dashboard-nav" class="nav-item">
      <?php endif; ?>

        <a id="dashboard" class="nav-link" href="<?= base_url('Dashboard/index') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <?php if($page == "temperature-nav"): ?>
        <li id="temperature-nav" class="nav-item active">
      <?php else: ?>
        <li id="temperature-nav" class="nav-item">
      <?php endif; ?>

        <a id="temperature" class="nav-link" href="<?= base_url('Temperature/index') ?>">
          <i class="fas fa-fw fa-thermometer-quarter"></i>
          <span>Temperature</span>
        </a>
      </li>

      <?php if($page == "humidity-nav"): ?>
        <li id="humidity-nav" class="nav-item active">
      <?php else: ?>
        <li id="humidity-nav" class="nav-item">
      <?php endif; ?>

        <a id="humidity" class="nav-link" href="<?= base_url('Humidity/index') ?>">
          <i class="fas fa-fw fa-wind"></i>
          <span>Humidity</span>
        </a>
      </li>

      <?php if($page == "soilMoist-nav"): ?>
        <li id="soilMoist-nav" class="nav-item active">
      <?php else: ?>
        <li id="soilMoist-nav" class="nav-item">
      <?php endif; ?>

        <a id="soilMoist" class="nav-link" href="<?= base_url('SoilMoisture/index') ?>">
          <i class="fas fa-fw fa-tint"></i>
          <span>Soil Moisture</span>
        </a>
      </li>

      <?php if($page == "ph-nav"): ?>
        <li id="ph-nav" class="nav-item active">
      <?php else: ?>
        <li id="ph-nav" class="nav-item">
      <?php endif; ?>

        <a id="ph" class="nav-link" href="<?= base_url('Ph/index') ?>">
          <i class="fas fa-fw fa-water"></i>
          <span>pH</span>
        </a>
      </li>

<!--       <?php if($page == 'settings-page'): ?>
        <li id="settings-nav" class="nav-item active">
      <?php else: ?>
        <li id="settings-nav" class="nav-item">
      <?php endif; ?>

        <a id="settings" class="nav-link" href="<?= base_url('Settings/index') ?>">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Settings</span>
        </a>
      </li> -->

    </ul>
