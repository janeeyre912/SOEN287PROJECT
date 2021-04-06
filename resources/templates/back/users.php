

    <div class="main col-lg-9 col-md-9 py-3 flex-grow-1 ">
        <!--users information-->
            <!--    breadcrumb link-->
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">users</li>
                </ol>
            </nav>
            <button type="button" class="btn btn-dark btn-adduser"onclick="window.location.href='index.php?add_user'">Add user</button>
            <h6 class="bg-success"><?php display_message(); ?></h6>
            <table class="table table-hover" role="table">
                <thead role="rowgroup">
                <tr role="row">
                    <th scope="col" role="columnheader">#</th>
                    <th scope="col" role="columnheader">Username</th>
                    <th scope="col" role="columnheader">Last name</th>
                    <th scope="col" role="columnheader">First name</th>
                    <th scope="col" role="columnheader">Email</th>
                    <th scope="col" role="columnheader"></th>
                </tr>
                </thead>
                <tbody role="rowgroup">
                  
                <?php display_users(); ?>
              
                </tbody>
            </table>
</div>
</div>
