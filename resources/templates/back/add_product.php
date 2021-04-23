
<?php add_product(); ?>




<div class="main col-lg-9 col-md-9 py-3 flex-grow-1 ">
        <!--    breadcrumb link-->
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="index.php?products">Products</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Information</li>
            </ol>
        </nav>
    
        <div class="center-area">
          <form action="" method="post" enctype="multipart/form-data" >
                <div class="product-image group col-md-5">
                    <input type="file" class="productInput" name="image" value="" required>
                    <img src="" id = "prImg" width=400px height=400px class="float-left">
                </div>
                <div class="product row justify-content-md-center">
                    <div class="main-desc col-md-7 mb-3">
                        <label for="product-name"  >New Product name </label>
                        <input type="text" name="pro-name" id="product-name" placeholder="Label" required>
                    </div>
                    <div class= "secondary-desc col-md-7 mb-3">
                        <label for="product-desc" name="product-desc">New Product description </label>
                        <textarea id="product-desc" name="pro-desc" placeholder="Description"
                        cols="15" rows="2" class="align-middle purple-border-focus" required></textarea>
                    </div>
                </div>
                <div class="aisle row justify-content-md-center col-md-7 mb-3">
                    <label for="aisle-choice">Aisle</label>
                    <select name="aisle" value="<?php echo $productAisle; ?>" id="aisle-choice">
                        <option value="Fruits and Vegetables">Fruits &amp; Vegetables</option>
                        <option value="Dairy and Eggs">Dairy &amp; Eggs</option>
                        <option value="seafood">Fish &amp; Seafood</option>
                        <option value="Meat and Poultry">Meat &amp; Poultry</option>
                        <option value="beverages">Beverages</option>
                        <option value="Beer and Wine">Beer &amp; Wine</option>
                    </select>
                </div>
                <div class="price row justify-content-md-center col-md-7 mb-3">
                        <label for="price" name="price">Price </label> 
                        <input id="price" name="pro-price" type="number" placeholder="$" step=".01" min="0"  required>
                </div>
                <div class="quantity-btn row justify-content-md-center col-md-7 mb-3">
                            <label for="quantity">Units in Store</label>
                            <input type="number" name="quantity"
                            id="quantity"  min="0" required> 
                </div>
                <div class="text-center">
                    <button type="reset" class="btn btn-secondary pull-left">
                        Reset</button>
                    <button type="submit" class="btn btn-danger pull-right" name="add_product">
                            Save</button>
                </div>
            </form>
        </div>
        <script type="text/javascript">
            window.addEventListener('load', function(){

            document.querySelector('input[type="file"]').addEventListener('change', function(){

                if(this.files && this.files[0]){
                    
                    var img = document.getElementById('prImg')

                    img.src = URL.createObjectURL(this.files[0]);
                
                }

                
            })


        })
        </script>
        </div>
</div>