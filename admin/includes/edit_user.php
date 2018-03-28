<?php

    if(isset($_GET['p_id'])) {
        
        $the_user_id = $_GET['p_id'];
        
        $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
        $select_users_by_id = mysqli_query($connection, $query); 

        while($row = mysqli_fetch_assoc($select_users_by_id)) {
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];    
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];    
            $user_role = $row['user_role'];
        
            if(isset($_POST['edit_user'])) {
                $username = $_POST['username'];
                $user_password = $_POST['user_password'];
                $user_firstname = $_POST['user_firstname'];
                $user_lastname = $_POST['user_lastname'];
                $user_email = $_POST['user_email'];
                $user_role = $_POST['user_role'];

                $query = "SELECT randSalt FROM users ";
                $select_randsalt_query = mysqli_query($connection, $query);
                if(!$select_randsalt_query) {
                    die("Query Failed = " . mysqli_error($connection));
                }

                $row = mysqli_fetch_array($select_randsalt_query);
                $salt = $row['randSalt'];
                $hashed_password = crypt($user_password, $salt);

                
                $query = "UPDATE users SET ";
                $query .="username = '{$username}', ";
                $query .="user_password = '{$hashed_password}', ";
                $query .="user_firstname = '{$user_firstname}', ";
                $query .="user_lastname = '{$user_lastname}', ";
                $query .="user_email = '{$user_email}', ";
                $query .="user_role = '{$user_role}' ";
                $query .="WHERE user_id = '{$the_user_id}' ";    

                $edit_user_query = mysqli_query($connection, $query);

                confirmQuery($edit_user_query);
                
                header("Location: users.php");
           }

        } 
    }

?>
   

<form action="" method="post" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" name="user_firstname" value="<?php echo $user_firstname; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" name="user_lastname" value="<?php echo $user_lastname; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <select name="user_role">
           <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
           <?php 
            if($user_role == 'admin') {
                echo "<option value='subscriber'>subscriber</option>";
            } else {
                echo "<option value='admin'>admin</option>";
            } ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
    </div>
    
    <!--<div class="form-group">
        <label for="post_image">Image</label>
        <input type="file" name="post_image" class="form-control">
    </div>-->
    
    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" name="user_email" value="<?php echo $user_email; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="user_password">Password</label>
        <input type="password" name="user_password" value="<?php echo $user_password; ?>" class="form-control">
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
    </div>
    
</form>