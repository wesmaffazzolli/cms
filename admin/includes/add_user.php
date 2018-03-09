<?php

if(isset($_POST['create_user'])) {
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    
    $query = "INSERT INTO users(user_firstname, user_lastname, user_role, username, user_email, user_password) ";
    $query .= "VALUES('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}') ";

    $create_user_query = mysqli_query($connection, $query);

    confirmQuery($create_user_query);

    /*$post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    
    try {
        
        move_uploaded_file($post_image_temp, "../images/$post_image");
        
        if ($_FILES['post_image']['error'] === UPLOAD_ERR_OK) { 
            $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
            $query .= "VALUES('{$post_category_id}','{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_comment_count}','{$post_status}') ";

            $create_post_query = mysqli_query($connection, $query);

            confirmQuery($create_post_query);
            
            echo "Post inserido com sucesso.";
        } else { 
            throw new UploadException($_FILES['post_image']['error']); 
        }   
    } catch (UploadException $e) {
        echo $e->getMessage();
    }*/
        
}

?>
   

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" name="user_firstname" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" name="user_lastname" class="form-control">
    </div>
    
    <select class="form-group" name="user_role">
        <option value="subscriber">Select Role</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>
    </select>
    
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" class="form-control">
    </div>
    
    <!--<div class="form-group">
        <label for="post_image">Image</label>
        <input type="file" name="post_image" class="form-control">
    </div>-->
    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" name="user_email" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="passoword" name="user_password" class="form-control">
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>
    
</form>