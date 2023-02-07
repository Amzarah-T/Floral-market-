<?php
if(isset($_GET['edit_products'])){
    $edit_id=$_GET['edit_products'];
    //echo $edit_id;

    $get_data="Select * from `products` where product_id=$edit_id";
    $result=mysqli_query($con, $get_data);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    echo $product_title;
    $product_material=$row['product_material'];
    $product_total_length=$row['product_total_length'];
    $category_id=$row['category_id'];
    $flower_diameter=$row['flower_diameter'];
    $product_image=$row['product_image'];
    $product_color=$row['product_color'];
    $product_price=$row['product_price'];

    //fetching category name

    //echo $category_title;

     //fetching category brands

     
}
?>



<div class="container mt-5">
    <h1 class="text-center">Edit Products</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" id="product_title" value="<?php echo $product_title?>"  name="product_title" class="form-control" required="required">
        </div>
 
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_material" class="form-label">product_material</label>
            <input type="text" id="product_material" value="<?php echo $product_material?>" name="product_material" class="form-control" required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_total_length" class="form-label">product_total_length</label>
            <input type="text" id="product_total_length" value="<?php echo $product_total_length?>" name="product_total_length" class="form-control" required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
        <label for="product_category" class="form-label">Product Categories</label>
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_title?>"> <?php echo $category_title?> </option>
                <?php
                
                $select_category_all="Select * `categories`";
                $result_category_all=mysqli_query($con, $select_category_all);
                while($row_category_all=mysqli_fetch_assoc($result_category_all)){
                    $category_title=$row_category_all['category_title'];
                    $category_id=$row_category_all['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                };

                ?>

               
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="flower_diameter" class="form-label">flower_diameter</label>
            <input type="text" id="flower_diameter" name="flower_diameter" value="<?php echo $flower_diameter?>" class="form-control" required="required">
        </div>
        
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form-label">Product Image</label>
            <div class="d-flex w-90 m-auto">
            <input type="file" id="product_image" name="product_image" class="form-control" required="required">
            <img src="../product_images/<?php echo $product_image?>" alt="" class="product_img">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_color" class="form-label">product_color</label>
            <input type="text" id="product_color" name="product_color" value="<?php echo $product_color?>" class="form-control" required="required">
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" id="product_price" name="product_price" value="<?php echo $product_price?>" class="form-control" required="required">
        </div>

        <div class="w-50">
            <input type="submit" name="edit_product" value="Update Product" class="btn btn-info px-3 mb-3">
        </div>

    </form>
</div>

<!--editing products-->

<?php
    if(isset($_POST['edit_product'])){
        $product_title=$_POST['product_title'];
        $product_material=$_POST['product_material'];
        $product_total_length=$_POST['product_total_length'];
        $product_category=$_POST['product_category'];
        $flower_diameter=$_POST['flower_diameter'];
        $product_price=$_POST['product_price'];
        $product_price=$_POST['product_price'];


        $product_image=$_FILES['product_image']['name'];
      
        $temp_image=$_FILES['product_image']['tmp_name'];
    }

    
    move_uploaded_file($temp_image,"./product_images/$product_image");

    $update_products="update `products` set product_title='$product_title',
    product_material='$product_material',product_total_length='$product_total_length',
    category_id='$product_category',flower_diameter='$flower_diameter',product_image='$product_image',
    product_color='$product_color',product_price='$product_price',date=NOW() where product_id=$edit_id";
    $result_update= mysqli_query($con,$update_products);
    if($result_update){
        echo "<script>alert('Product Updated Successfully')</script>";
        echo "<script>window.open('./insert_products.php','_self')</script>";
    }

?>