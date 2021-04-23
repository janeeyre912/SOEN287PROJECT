var itemQuantity;

window.addEventListener("load", () => {
  deliveryDate();
  displayCart();
  itemQuantity = document.getElementsByClassName("quantity");

  for (var i = 0; i < itemQuantity.length; i++) {
    itemQuantity[i].onchange = () => {
      updateSubTotal();
    };
  }
  updateSubTotal();
});


function updateSubTotal() {
  var cartItem = document.getElementsByClassName("itemPrice");

  var subTotal = 0;
  var itemSubTotal = document.getElementsByClassName("itemSubTotalPrice");
  for (var i = 0; i < cartItem.length; i++) {
    var cartItemSubPrice = cartItem[i].innerHTML;

    var quantity = itemQuantity[i].value;

    var itemTotal = cartItemSubPrice * quantity;
    subTotal = subTotal + quantity * cartItemSubPrice;
    itemSubTotal[i] = itemTotal;
    document.getElementsByClassName("itemSubTotalPrice")[
      i
    ].innerHTML = itemTotal.toFixed(2);
  }

  document.getElementById("subTotal").innerHTML = "$" + subTotal.toFixed(2);

  var tax = subTotal * 0.15;
  document.getElementById("tax").innerHTML = "$" + tax.toFixed(2);

  var total = subTotal + tax;
  document.getElementById("total").innerHTML = "$" + total.toFixed(2);
}

function deliveryDate() {
  var today = new Date();
  var deliveryDate = new Date();
  deliveryDate.setDate(today.getDate() + 2);
  document.getElementById("dateID").innerHTML = deliveryDate.toDateString();
}

/**
 * Displays all cart items.
 */
function displayCart() {
  var cartItems = localStorage.getItem("User:Cart");
  cartItems = JSON.parse(cartItems);
  var itemsProducts = document.querySelector(".itemsProducts");
  itemsProducts.innerHTML = "";
  for (var i = 0; i < cartItems.items.length; i++) {
    itemsProducts.innerHTML += `<div class="row mb-4">
      <div class="col-md-5 col-lg-3 col-xl-3">
        <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
          <a href="#!">
            <img class="img-fluid w-100" src="${cartItems.items[i].imgSrc}" alt="Sample" />
          </a>
        </div>
      </div>
      <div class="col-md-7 col-lg-9 col-xl-9">
        <div>
          <div class="d-flex justify-content-between">
            <div>
              <h5 class="itemName">${cartItems.items[i].name}</h5>
              <p class="mb-3 text-muted text-uppercase small">
                              Price per item $<span class="itemPrice">${cartItems.items[i].price}</span>
              </p>
            </div>
            <div>
              <div class="def-number-input number-input mb-0 w-100">
                <button onclick="this.parentNode.querySelector('input[type=number]').stepDown(); reloadAmount();updateSubTotal();" class="minus">
                  -
                </button>
                <input class="quantity" min="1" name="quantity" value="${cartItems.items[i].amount}" type="number" />
                <button onclick="this.parentNode.querySelector('input[type=number]').stepUp();reloadAmount(); updateSubTotal();" class="plus">
                  +
                </button>
              </div>
            </div>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <a href="#" type="button" class="card-link-secondary small text-uppercase mr-3" onclick="removeItemFromCart('${cartItems.items[i].name}',${cartItems.items[i].amount})"><i class="fas fa-trash-alt mr-1">
              </i> Remove item
              </a>
            </div>
            <strong>$<span class="itemSubTotalPrice">${cartItems.items[i].price}</span></strong>
          </div>
        </div>
      </div>
    </div>`;
  }
}


function removeItemFromCart(name, amount) {
  for (var i = 0; i < userCart.items.length; i++) {
    if (userCart.items[i].name === name) {
      userCart.totalPrice -= userCart.items[i].price * amount;
      userCart.items[i].amount = 0;

      if (userCart.items[i].amount === 0) {
        userCart.items.splice(i, 1); // removes item from the array
      }
      userCart.itemAmount -= amount;

      saveCart();
      updateItemCount();
      displayCart();
      updateSubTotal();
      return;
    }
  }
}

function reloadAmount() {
  userCart.itemAmount = 0;
  for (var i = 0; i < userCart.items.length; i++) {
    userCart.items[i].amount = itemQuantity[i].value;
    userCart.itemAmount += parseInt(userCart.items[i].amount);
  }
  saveCart();
  updateItemCount();
  displayCart();
}


/**
 * Converts the current user cart to an 
 * order object and sends it to the server.
 */
function postOrder() {

  //Create a deep copy of the cart.
  let order = JSON.parse(JSON.stringify(userCart));
  //Remove the image source (server won't need it).
  order.items.forEach(item => {
    delete item.imgSrc;
  });

  order['user'] = userName;

  //Get the current date.
  let today = new Date();
  today.setDate(today.getDate());
  //Add the current date in the canadian english format (YYYY-MM-DD).
  order['date'] = today.toLocaleDateString('en-CA');

  //Get the order ID from the server.
  let idRequest = new XMLHttpRequest();
  idRequest.open('GET', '../Back_Store/getNextOrderID.php', true);
  //Specify how the response should be intepreted.
  idRequest.responseType = 'text';

  //Specify callback function. Set the ID and send a post request..
  idRequest.onload = () => {

    //Set the ID as the returned number.
    order['id'] = idRequest.response;

    //Create a new AJAX request to postOrder.php
    let orderRequest = new XMLHttpRequest();
    orderRequest.open('GET', '../Back_Store/postOrder.php?' + toQueryStr(order), true);
    //Specify how the response should be intepreted.
    orderRequest.responseType = 'text';

    //Specify callback function. Simply display the response using alert().
    orderRequest.onload = () => {
      //This is the last statement that will execute if there is no errors.
      alert(orderRequest.response);
    };

    //Send the request.
    orderRequest.send();
  }

  //Send the request.
  idRequest.send();
}

/**
 * Converts the js object to a query string.
 * Found at: https://stackoverflow.com/questions/56173848/want-to-convert-a-nested-object-to-query-parameter-for-attaching-to-url
 */
function toQueryStr(obj) {

  //Iterable function.
  let getPairs = (obj, keys = []) =>
    //For each element in the passed 'obj', execute the anonymous function. 
    Object.entries(obj).reduce((pairs, [key, value]) => {
      //If the value is also a js object, recusively call this function on that element.
      //Add what's is returned to the 'pairs' array.
      if (typeof value === 'object') {
        pairs.push(...getPairs(value, [...keys, key]));
      }
      //Otherwise, add the key-value pair (as an array of length 2) to the 'pairs' array.
      else {
        pairs.push([[...keys, key], value]);
      }
      //Return the array of 'pairs' (key-value arrays of length 2).
      return pairs;
    }, []);

  //Return a stringified version of the array using the following method.
  return getPairs(obj).map(([[elemKey, ...subKeys], value]) =>
    //Add each property of each element in the format: 'elementKey[subKey1][subKey2][...]=value'.
    `${elemKey}${subKeys.map(key => `[${key}]`).join('')}=${value}`)
    //Join each of the printed proterties with '&'.
    .join('&');
}