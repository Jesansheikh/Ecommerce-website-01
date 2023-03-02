    <div class="container-fluid ">
        <div class="row p-2 pt-3 pb-3 d-flex align-items-center">
            <div class="col-md-6">
                <div class="dropdown">
                    <button class="secondary-button " type="button" id="allProduct">
                        All Product
                    </button>

                    <button class="secondary-button " type="button" id="laptop">
                        Laptop
                    </button>

                    <button class="secondary-button " type="button" id="mobilePhone">
                        Mobile Phone
                    </button>

                    <button class="secondary-button " type="button" id="gadget">
                        Gadget
                    </button>

                </div>
            </div>
            <div class="col-md-5">
                <div class="d-flex search-btn">
                    <form method="GET">
                    <div class="d-flex">
                    <input class="form-control" type="search" placeholder="Search any product..." name="search">
                    <input type="submit" value="Search" width="80px" name="searching" class="ms-2 ps-2 pe-2">
                    </div>
                    </form>

                    <?php
                    if (isset($_GET['searching'])) {
                       $search_key = $_GET['search'];

                    }
                    
                    ?>
                </div>
            </div>

            <div class="col-md-1">
                <div class="d-flex d-md-flex flex-row align-items-center">
                    <a href="cart" class="shop-bag"><i class="fa-solid fa-cart-shopping pe-4"></i></a>
                </div>
            </div>
        </div>
    </div>


