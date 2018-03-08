<?php

function confirmQuery($result) {
    global $connection;
    
    if(!$result) {
        die("QUERY FAILED ". mysqli_error($connection));
    }
    
}

function insert_categories() {
    if(isset($_POST['submit'])) {
    global $connection;
    $cat_title = $_POST['cat_title']; 
        if($cat_title == "" || empty($cat_title)) {
            echo "This field shouldn't be empty";
        } else {
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE('{$cat_title}')";

            $create_category_query = mysqli_query($connection, $query);
            if(!$create_category_query) {
                die('QUERY FAILED' . mysqli_error($connection));
            }
        }
    }
}

function findAllCategories () {
    global $connection;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection, $query); 

    while($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];    
        $cat_title = $row['cat_title'];

        echo "<tr>";    
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}

function findCategoriesById($id) {
    if(isset($_GET['edit'])) {
        global $connection;

        $query = "SELECT * FROM categories WHERE cat_id = {$id} ";
        $select_categories_id = mysqli_query($connection, $query);
        return $select_categories_id;   
    }    
}

function deleteCategories() {
    if(isset($_GET['delete'])) {
        global $connection;
        $the_cat_id = $_GET['delete']; 
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
        $delete_query = mysqli_query($connection, $query);
        header("Location: categories.php");
    }
}

function updateCategories() {
    if(isset($_POST['update_category'])) {
        global $connection;
        $the_cat_title = $_POST['cat_title'];
        $the_cat_id = $_GET['edit'];
        $query = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = {$the_cat_id} ";
        $update_query = mysqli_query($connection, $query);
        if(!$update_query) {
            die("QUERY FAILED" . mysqli_error($connection));
        } else {
            header("Location: categories.php");
        }
    } 
}


?>