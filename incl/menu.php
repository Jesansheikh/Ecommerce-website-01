
<!-- nav bar -->
<nav class="">
    <div class="container main-nav flex">
        <a class="company-logo" href="#">
            <img src="assets/img/logo.png" alt="Company Logo">
        </a>
        <div class="nav-links" id="nav-links">
            <ul class="flex">
                <li><a href="index" class="hover-link">Home</a></li>
                <li><a href="product" class="hover-link">Product</a></li>
                <li><a href="#" class="hover-link">Blog</a></li>
                <li><a href="contact" class="hover-link">Contact</a></li>
                <li><a href="login" class="hover-link secondary-button <?php if(isset($_SESSION['login_success'])){echo 'd-none';}?>">Sign in</a></li>
                <li><a href="registation" class="hover-link primary-button <?php if(isset($_SESSION['login_success'])){echo 'd-none';}?>">Sign up</a></li>
                <li class="dropdown <?php if(!isset($_SESSION['login_success'])){echo 'd-none';}?>">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-regular fa-circle-user profile"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="profile">Profile</a></li>
                        <li><a class="dropdown-item" href="history">History</a></li>
                        <li><a class="dropdown-item" href="add_product">Add Product</a></li>
                        <li><a class="dropdown-item" href="view_all_upload_product">View All Upload Product</a></li>
                        <li><a class="dropdown-item" href="support/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <a href="#" class="nav-toggle hover-link" id="nav-toggle">
            <i class="fa-solid fa-bars"></i>
        </a>
    </div>
</nav>
<script>
    const toggleButton = document.getElementById('nav-toggle');
    const navLinks = document.getElementById('nav-links');
    toggleButton.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    })
</script>