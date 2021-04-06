<!--header-->
    <div class="title col-lg-6 col-sm-12">
        <span class="title navbar-brand">Fast Groceries Administration</span>
    </div>
    <div class="username col-lg-6 col-sm-12">
        <ul class="user">
            <li>
                <a><i class="far fa-user-circle"></i>
                  <?php 

                  if(isset($_SESSION['user_name']) ){
                    echo $_SESSION['user_name'];

                  } else {

                  echo "unregistered user";
                }

                ?>
                </a>
                <ul class="dropdown">
                    <li><a href="logout.php">Log out</a></li>
                </ul>
            </li>
        </ul>
    </div>
