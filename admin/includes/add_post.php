<?php

if(isset($_POST['create_post'])) {
    $post_title = $_POST['post_title'];
    $post_category = $_POST['post_category'];
    $post_author = $_POST['post_author'];
    $post_status = $_POST['post_status'];
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_comment_count = 4;
    $post_date = date('d-m-y');
    
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    
    move_uploaded_file($post_image_temp, "../images/{$post_image}");
}

?>
   

   <form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="post_title">Title</label>
        <input type="text" name="post_title" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="post_category">Category</label>
        <input type="text" name="post_category" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="post_author">Author</label>
        <input type="text" name="post_author" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="post_status">Status</label>
        <input type="text" name="post_status" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="post_image">Image</label>
        <input type="file" name="post_image" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Tags</label>
        <input type="text" name="post_tags" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="post_content">Content</label>
        <textarea type="text" name="post_content" class="form-control" id="" cols="30" rows="10">
        </textarea>
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>
    
</form>