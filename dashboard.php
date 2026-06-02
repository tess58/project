<?php
require_once 'auth/check_auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo ucfirst($_SESSION['role']); ?> Dashboard - SalePro</title>
  <link rel="stylesheet" href="assets/dashboard.css">
</head>
<body>
  <div class="dashboard-container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-header">
        <span style="font-size: 24px;">✦</span>
        <h2>SalePro</h2>
      </div>

      <nav>
        <ul class="sidebar-menu">
          <li class="menu-item">
            <a href="#" class="menu-link active" data-page="overview">
              <span class="menu-link-icon">📊</span>
              <span>Overview</span>
            </a>
          </li>
          <li class="menu-item">
            <a href="#" class="menu-link" data-page="sales">
              <span class="menu-link-icon">💰</span>
              <span>Sales</span>
            </a>
          </li>
          <li class="menu-item">
            <a href="#" class="menu-link" data-page="reports">
              <span class="menu-link-icon">📈</span>
              <span>Reports</span>
            </a>
          </li>
          <li class="menu-item">
            <a href="#" class="menu-link" data-page="inventory">
              <span class="menu-link-icon">📦</span>
              <span>Inventory</span>
            </a>
          </li>
          <li class="menu-item">
            <a href="#" class="menu-link" data-page="users">
              <span class="menu-link-icon">👥</span>
              <span>Users</span>
            </a>
          </li>
          <li class="menu-item">
            <a href="#" class="menu-link" data-page="settings">
              <span class="menu-link-icon">⚙️</span>
              <span>Settings</span>
            </a>
          </li>
        </ul>
      </nav>

      <div class="sidebar-footer">
        <div class="user-info">
          <div class="user-avatar"><?php echo strtoupper(substr($_SESSION['first_name'], 0, 1)); ?></div>
          <div class="user-details">
            <h3><?php echo htmlspecialchars($_SESSION['first_name']); ?></h3>
            <p><?php echo ucfirst($_SESSION['role']); ?></p>
          </div>
        </div>
        <button class="logout-btn" id="logoutBtn">Logout</button>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
      <!-- Header -->
      <header class="header">
        <div class="header-left">
          <div class="breadcrumb">
            <a href="#" class="breadcrumb-link">Home</a>
            <span class="breadcrumb-separator">></span>
            <span><?php echo ucfirst($_SESSION['role']); ?> Dashboard</span>
          </div>

          <div class="search-box">
            <span style="color: var(--text-secondary);">🔍</span>
            <input type="text" placeholder="Search..." />
            <span class="search-shortcut">⌘ K</span>
          </div>
        </div>

        <div class="header-right">
          <button class="header-icon-btn" title="Messages">
            <span>💬</span>
            <span class="notification-badge"></span>
          </button>
          <button class="header-icon-btn" title="Notifications">
            <span>🔔</span>
            <span class="notification-badge"></span>
          </button>
          <button class="theme-toggle-dashboard" id="themeToggleDashboard" title="Toggle theme">🌙</button>
          <div class="user-profile-icon" title="Profile"><?php echo strtoupper(substr($_SESSION['first_name'], 0, 1)); ?></div>
        </div>
      </header>

      <!-- Content Area -->
      <div class="content-area">
        <!-- Welcome Section -->
        <div class="welcome-section">
          <h1 class="welcome-title">Hi <?php echo htmlspecialchars($_SESSION['first_name']); ?>, Welcome back 👋</h1>
          <p class="welcome-subtitle">You are logged in as: <strong><?php echo ucfirst($_SESSION['role']); ?></strong></p>
        </div>

        <!-- Controls Section -->
        <div class="controls-section">
          <div class="date-filter">
            📅 06 May 2026 - 29 May 2026
          </div>
          <button class="filter-btn">Filter</button>
        </div>

        <!-- Tabs -->
        <div class="tabs">
          <button class="tab active">Overview</button>
          <button class="tab">Reports</button>
        </div>

        <!-- Metric Cards -->
        <div class="content-grid">
          <div class="card">
            <div class="card-title">Total Revenue</div>
            <div class="card-value">$45,231.89</div>
            <div class="card-change positive">+20.1% from last month</div>
          </div>
          <div class="card">
            <div class="card-title">Subscriptions</div>
            <div class="card-value" style="color: #10b981;">-350</div>
            <div class="card-change positive">+180.1% from last month</div>
          </div>
          <div class="card">
            <div class="card-title">Sales</div>
            <div class="card-value" style="color: #ef4444;">+12,234</div>
            <div class="card-change negative">-2% from last month</div>
          </div>
          <div class="card">
            <div class="card-title">Active Now</div>
            <div class="card-value" style="color: #10b981;">+573</div>
            <div class="card-change positive">+21 since last hour</div>
          </div>
        </div>

        <!-- Placeholder Chart Sections -->
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px; margin-bottom: 24px;">
          <div class="placeholder-section">
            <div class="placeholder-icon">📊</div>
            <div class="placeholder-text">Performance Goal Chart - Ready to be updated</div>
          </div>
          <div class="placeholder-section">
            <div class="placeholder-icon">📍</div>
            <div class="placeholder-text">Sales by Countries - Ready to be updated</div>
          </div>
        </div>

        <!-- Additional Placeholder Sections -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 20px;">
          <div class="placeholder-section">
            <div class="placeholder-icon">📈</div>
            <div class="placeholder-text">Monthly Earning Chart - Ready to be updated</div>
          </div>
          <div class="placeholder-section">
            <div class="placeholder-icon">📊</div>
            <div class="placeholder-text">Sales Report Chart - Ready to be updated</div>
          </div>
          <div class="placeholder-section">
            <div class="placeholder-icon">⭐</div>
            <div class="placeholder-text">Best Selling Products - Ready to be updated</div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="assets/dashboard.js"></script>
</body>
</html>
