 <div id="loader" class="loading">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <script>
        window.addEventListener("load", function() {
            setTimeout(function() {
                document.getElementById("loader").style.display = "none";
            }, 500); 
        });
    </script>