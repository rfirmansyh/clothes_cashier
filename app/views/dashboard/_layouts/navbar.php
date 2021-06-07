<nav class="navbar">
    <div class="container w-100 d-flex justify-content-center px-0 py-2">
        <div class="row w-100 align-items-center">
            <div class="col">
            </div>
            <div class="col-auto">
                <a href="<?= BASE_URL.'/admin/dashboard/carts/' ?>" class="btn btn-icon">
                    <i class="fas fa-shopping-cart text-gray mr-1"></i>
                    <sup>
                        <span class="badge badge-xs badge-warning">
                            <?= Session::get('carts') ? Session::count('carts') : 0 ?>
                        </span>
                    </sup>
                </a>
            </div>
            <div class="col-auto">
                <div class="dropdown dropdown-block">
                    <div class="d-flex align-items-center" type="button" id="dropdownMenuButton" data-toggle="dropdown">
                        <div class="mr-2">Hey, Spancer</div>
                    </div>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item text-danger" href="">
                            <i class="fas fa-sign-in-alt mr-1"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>