<form action="" method="post">
   <label for="cat_title">Edit Category</label>

   <?php // Busca o valor do campo que clicou em Edit e preenche dentro do campo do formulário
    if(isset($_GET['edit'])) {
        $cat_id = $_GET['edit'];   

        $query = "SELECT * FROM categories WHERE cat_id = $cat_id ";
        $select_categories_id = mysqli_query($connection, $query); 

        while($row = mysqli_fetch_assoc($select_categories_id)) { 
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title']; ?>
        <div class="form-group">
            <input type="text" name="cat_title" class="form-control" value="<?php if(isset($cat_title)) {echo $cat_title;}?>">
        </div>
        <?php }} ?> 
        <?php updateCategories();
        ?>                                                                                               
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_category" value="Update Category">
    </div>
</form>