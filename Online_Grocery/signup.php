<?php require_once("../resources/config.php"); ?>
<?php $title = "Sign Up" ?>
<?php include(TEMPLATE_FRONT . DS . "header.php"); ?>
<?php add_base(); ?>  

    <div class="row justify-content-center">
      <div class="col-lg-8">
        <h2 id="customerLogin">Create an account</h2>
        <p class="signInColumn">Sign Up</p>

        <form action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name" ; style="font-size: 20px">Name</label>
            <div style="width: 300px">
              <form>
                <div class="row">
                  <div class="col">
                    <input
                      type="text"
                      name = "firstname"
                      class="form-control"
                      placeholder="First name"
                      required
                    />
                  </div>
                  <div class="col">
                    <input
                      type="text"
                      name  ="lastname"
                      class="form-control"
                      placeholder="Last name"
                      required
                    />
                  </div>
                </div>
            </div>

            <label
              for="exampleInputEmail1"
              style="font-size: 20px; margin-top: 10px"
            >
              Email
            </label>
            <input
              type="text"
              name="email"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Enter email"
              style="width: 300px"
            />
            <small id="emailHelp" class="form-text text-muted"
              >We'll never share your email with anyone else.
            </small>

            <label for="phone" style="font-size: 20px; margin-top: 10px"
              >Mobile Number</label
            >
            <input
              type="tel"
              name="telephone"
              class="form-control"
              id="exampleInputNumber1"
              placeholder="Mobile Number"
              style="width: 300px"
            />

            <label
              for="exampleInputPassword1"
              id="exampleInputPassword1"
              style="font-size: 20px; margin-top: 10px"
            >
              Password
            </label>
            <input
              type="password"
              name="password"
              class="form-control"
              id="password"
              placeholder="Password"
              style="width: 300px"
            />


            <label
              for="exampleInputPassword1"
              style="font-size: 20px; margin-top: 10px"
            >
              Re-type Password
            </label>

            <input
              type="password"
              class="form-control"
              id="confirmPassword"
              placeholder="Password"
              style="width: 300px"
              onkeyup="check()"
            />
            <span id='message'></span>
          </div>
          <input
            id="CreateYourAccount"
            name="add_base"
            disabled
            type="submit"
            class="btn btn-primary"
            style="background-color: #59886b"
            value="Create your account!"
            onclick="clicked()"
          />
      </form>

          <script>
            function clicked(){
              alert("Your identification has been submitted!");
            }

            function check(){
              if(document.getElementById('password').value == document.getElementById('confirmPassword').value){
                document.getElementById("message").style.color="green";
                document.getElementById("message").innerHTML = "Passwords matches!";
                document.getElementById("CreateYourAccount").disabled = false;

              }else {
                document.getElementById("message").style.color = 'red';
                document.getElementById("message").innerHTML = "Please match the passwords!";
              }

            }
          </script>

      </div>
    </div>


<?php include(TEMPLATE_FRONT . DS . "footer.php") ?>