<?php require_once("../resources/config.php"); ?>
<?php $title = "Checkout" ?>
<?php include(TEMPLATE_FRONT . DS . "header.php") ?>
<script>
let userName = "<?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest'; ?>";
</script>
<script src="shoppingcart.js"></script>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <!--- middle of page -->
        <!--Section: Block Content-->
        <section>
          <!--Grid row-->
          <div class="row">
            <!--Grid column-->
            <div class="col-lg-8">
              <!-- Card -->
              <div class="mb-3">
                <div class="pt-4 wish-list">
                  <h5 class="mb-4">Cart</h5>
                  <div class="itemsProducts"></div>

                  <p class="text-primary mb-0">
                    <i class="fas fa-info-circle mr-1"></i> All pictures are
                    just reference images. Your items might not be exactly look
                    as shown.
                  </p>
                </div>
              </div>
              <!-- Card -->

              <!-- Card -->
              <div class="mb-3">
                <div class="pt-4">
                  <h5 class="mb-2">Expected shipping delivery</h5>

                  <p class="text-info mb-0" id="dateID"></p>
                </div>
              </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4">
              <!-- Card -->
              <div class="mb-3">
                <div class="pt-4">
                  <h5 class="mb-4">We accept</h5>

                  <img
                    class="mr-2"
                    width="45px"
                    src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                    alt="Visa"
                  />
                  <img
                    class="mr-2"
                    width="45px"
                    src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                    alt="American Express"
                  />
                  <img
                    class="mr-2"
                    width="45px"
                    src="https://mdbootstrap.com/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                    alt="Mastercard"
                  />
                  <img
                    class="mr-2"
                    width="45px"
                    src="https://mdbootstrap.com/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.png"
                    alt="PayPal acceptance mark"
                  />
                </div>
              </div>
              <div class="mb-3">
                <div class="pt-4">
                  <h5 class="mb-3">Total</h5>

                  <ul class="list-group list-group-flush">
                    <li
                      class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0"
                      ;
                      style="background-color: transparent"
                    >
                      Subtotal
                      <span id="subTotal"></span>
                    </li>
                    <li
                      class="list-group-item justify-content-between align-items-center px-0"
                      ;
                      style="background-color: transparent"
                    >
                      Shipping based on
                      <a href="#!" ; style="display: inline-flex!">J1Z</a>
                      <span class="justify-content-end">Free</span>
                    </li>
                    <li
                      class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0"
                      ;
                      style="background-color: transparent"
                    >
                      Tax
                      <span id="tax"></span>
                    </li>
                    <li
                      class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3"
                      ;
                      style="background-color: transparent"
                    >
                      <div>
                        <strong>Estimated Total</strong>
                      </div>
                      <span id="total"><strong></strong></span>
                    </li>
                  </ul>

                  <button class="btn btn-primary btn-block"  onClick="postOrder(); resetCart(); displayCart();">
                    Checkout
                  </button>
                </div>
              </div>
              <!-- Card -->

              <!-- Card -->
              <div class="mb-3">
                <div class="pt-4">
                  <a
                    class="dark-grey-text d-flex justify-content-between"
                    data-toggle="collapse"
                    href="#collapseExample"
                    aria-expanded="false"
                    aria-controls="collapseExample"
                  >
                    Add a discount code (optional)
                    <span><i class="fas fa-chevron-down pt-1"></i></span>
                  </a>

                  <div class="collapse" id="collapseExample">
                    <div class="mt-3">
                      <div class="md-form md-outline mb-0">
                        <input
                          type="text"
                          id="discount-code"
                          class="form-control font-weight-light"
                          placeholder="Enter discount code"
                        />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Card -->
            </div>
            <!--Grid column-->
          </div>
          <!-- Grid row -->
        </section>
        <!--Section: Block Content-->
      </div>
    </div>

    <!-- Footer -->
    <div class="footer">
      <div class="row">
        <div class="col-sm">
          <a class="footerText" href="#">ABOUT</a>
        </div>
        <div class="col-sm">
          <a class="footerText" href="#">CONTACT US</a>
        </div>
        <div class="col-sm">
          Copyright &copy Fast groceries. &nbsp; Technical support: (514)
          555-1234.
        </div>
      </div>
    </div>
  </body>
</html>
