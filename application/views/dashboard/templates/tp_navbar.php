  <!-- Navbar -->
  <nav class="navbar">
      <div class="nav-left">
          <!-- Sidebar collapse toggle (desktop only) -->
          <button
              id="sidebarToggleBtn"
              class="hamburger"
              aria-label="Toggle sidebar"
              title="Toggle sidebar">
              <i class="fas fa-bars"></i>
          </button>

          <!-- Sidebar open toggle for mobile -->
          <button
              id="mobileSidebarToggleBtn"
              class="hamburger"
              aria-label="Toggle sidebar mobile"
              title="Toggle sidebar"
              style="display: none">
              <i class="fas fa-bars"></i>
          </button>

          <a href="/">
              <img src="https://openclipart.org/image/800px/232064" alt="Logo" class="brand-logo" />
          </a>
      </div>
      <div class="nav-right">
          <button id="themeToggle" title="Toggle dark/light theme">🌙</button>
          <div class="admin-dropdown">
              <button class="admin-toggle" id="adminToggle">
                  Hi, <b>ADMIN</b> <i class="fa-solid fa-chevron-down"></i>
              </button>
              <ul class="dropdown-menu" id="dropdownMenu">
                  <li>
                      <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>