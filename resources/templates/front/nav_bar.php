<div class="navbarSticky">
  <nav class="navbar navbar-expand-lg bg-c05555">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span>Navigation</span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">&nbsp HOME &nbsp<span class="sr-only">(current)</span></a>
        </li>
        <a class="nav-link" href="basicPage.php?allproduct">&nbsp ALL PRODUCTS &nbsp</a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            AISLES
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" onclick="window.location.href='basicPage.php?dairy_eggs'">Dairy & Eggs</a>
            <a class="dropdown-item" onclick="window.location.href='basicPage.php?fruits_vegetables'">Fruits & Vegetables</a>
            <a class="dropdown-item" onclick="window.location.href='basicPage.php?seafood'">Fish & Seafood</a>
            <a class="dropdown-item" onclick="window.location.href='basicPage.php?meat_poultry'">Meat & Poultry</a>
            <a class="dropdown-item" onclick="window.location.href='basicPage.php?beverages'">Beverages</a>
            <a class="dropdown-item" onclick="window.location.href='basicPage.php?beer_wine'">Beer & Wine</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">More...</a>
          </div>
        </li>
        <a class="nav-link cart" href="checkout.php"><i class="fas fa-shopping-cart"></i>&nbsp CART <span>0</span></a>

      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button type="button" class="btn btn-warning" onclick="search_item()">Search</button>
      </form>
    </div>
  </nav>
</div>
