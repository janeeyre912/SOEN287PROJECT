<div class="main col-lg-9 col-md-9 py-3 flex-grow-1 ">
        <!--users information-->
            <!--    breadcrumb link-->
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </nav>
            <?php display_message(); ?>
            <table class="table table-hover" role="table">
                <thead role="rowgroup">
                <tr role="row">
                    <th scope="col" role="columnheader">Item number</th>
                    <th scope="col" role="columnheader">Product</th>
                    <th scope="col" role="columnheader">Aisle</th>
                    <th scope="col" role="columnheader">Price</th>
                    <th scope="col" role="columnheader">Quantity in stock</th>
                    <th scope="col" role="columnheader"></th>
                </tr>
                </thead>
                <tbody role="rowgroup">
                  
                <?php displayProductList(); ?>
              
                </tbody>
            </table>
            <div class="row justify-content-end">
            <div>
                <button type="button" class="btn btn-dark"onclick="window.location.href='index.php?add_product'">Add a product</button>
                <button type="button" class="btn btn-dark btn-confirm2">Save</button>
                <button type="button" class="btn btn-dark btn-confirm1"; style="margin-right: 20px;">Cancel</button>
            </div>
</div>
</div>
