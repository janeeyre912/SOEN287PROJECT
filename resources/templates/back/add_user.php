<?php add_user(); ?>  
    
    <div class="main col-lg-9 col-md-9 py-3 flex-grow-1 ">
        <!--    breadcrumb link-->
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php?users">users</a></li>
                <li class="breadcrumb-item active" aria-current="page">user information</li>
            </ol>
        </nav>
        <!--  user information-->
        <h4>add user</h4>
        <form class="user_info" action="" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="col-lg-4 mb-3">
                    <label for="firstname">First name</label>
                    <input type="text" name="firstname" placeholder="First name"  required>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="lastname">Last name</label>
                    <input type="text"  name="lastname" placeholder="Last name"  required>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Username" aria-describedby="inputGroupPrepend3" required>
                </div>
            </div>
            <div class="form-row">
                <div class="col-lg-4 mb-3">
                    <label for="email">Email</label>
                    <input type="text"  name="email" placeholder="Email" required>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="password">Password</label>
                    <input type="text"  name="password" placeholder="Password" required>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="telephone">Telephone</label>
                    <input type="text"  name="telephone" placeholder="Telephone" required>
                </div>
            </div>

            <!--    confirm button-->
            <div class="form-row">
                <div class="confirm_button col-lg-12">
                     <a id="user-id" class="btn btn-danger" href="">Delete</a>
                      <input type="submit" name="add_user" class="btn btn-dark pull-right" value="Add User" >
                </div>
            </div>
        </form>
    </div>
</div>
