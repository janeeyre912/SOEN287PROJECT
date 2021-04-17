let cartButton;

let currentProduct = {};

window.addEventListener("load", () => {
  //Record the item's data.
  currentProduct.name = document.getElementsByTagName("title")[0].innerText;
  currentProduct.imgSrc = document
    .querySelector(".itemImg")
    .getAttribute("src");
  currentProduct.price = parseFloat(
    document.querySelector(".itemPrice").innerText.replace("$", "")
  );

  //Select all 'add to cart' buttons on the page (only one on this page).
  cartButton = document.querySelector(".btn-danger");

  //Callback to click event.
  //If a button is clicked, add the product to cart.
  cartButton.addEventListener("click", () => {
    //Add the product to the browser storage.
    addItemToCart(
      currentProduct,
      parseInt(document.querySelector(".quantity").value)
    );
  });
});
