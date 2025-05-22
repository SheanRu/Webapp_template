    <!-- Footer -->
    <footer class="footer">
      <p>&copy; 2025 NGSI. All rights reserved.</p>
    </footer>

    <script>
      const hamburger = document.getElementById("hamburger");
      const sidebar = document.getElementById("sidebar");
      const overlay = document.getElementById("overlay");
      hamburger.addEventListener("click", () => {
        sidebar.classList.toggle("active");
        overlay.classList.toggle("active");
      });

      overlay.addEventListener("click", () => {
        sidebar.classList.remove("active");
        overlay.classList.remove("active");
      });

      const adminToggle = document.getElementById("adminToggle");
      const dropdownMenu = document.getElementById("dropdownMenu");

      adminToggle.addEventListener("click", () => {
        dropdownMenu.style.display =
          dropdownMenu.style.display === "block" ? "none" : "block";
      });

      document.addEventListener("click", (e) => {
        if (
          !adminToggle.contains(e.target) &&
          !dropdownMenu.contains(e.target)
        ) {
          dropdownMenu.style.display = "none";
        }
      });
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  </body>
</html>