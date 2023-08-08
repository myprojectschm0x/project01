<?php
function showErrors($errors, $field)
{
    $alert = '';
    if (isset($errors[$field]) && !empty($field)) {
        $alert = "<div class='alert alert-error'>" . $errors[$field] . "</div>";
    }
    return $alert;
}

function deleteSession()
{

    if (isset($_SESSION['errors'])) {
        $_SESSION['errors'] = null;
        unset($_SESSION['errors']);
    }

    if (isset($_SESSION['success'])) {
        $_SESSION['success'] = null;
        unset($_SESSION['success']);
    }

    if (isset($_SESSION['blog_errors'])) {
        $_SESSION['blog_errors'] = null;
        unset($_SESSION['blog_errors']);
    }

    if (isset($_SESSION['user_update_success'])) {
        $_SESSION['user_update_success'] = null;
        unset($_SESSION['user_update_success']);
    }

    if (isset($_SESSION['user_errors'])) {
        $_SESSION['user_errors'] = null;
        unset($_SESSION['user_errors']);
    }
}

function getCategoriesNav()
{
    global $db;

    $sql = 'select * from category order by id asc limit 3';
    $categories = mysqli_query($db, $sql);

    $result = array();
    if ($categories && mysqli_num_rows($categories) >= 1) {
        $result = $categories;
    }

    return $result;
}
function getCategory()
{
    global $db;

    $sql = 'select * from category order by id asc';
    $categories = mysqli_query($db, $sql);

    $result = array();
    if ($categories && mysqli_num_rows($categories) >= 1) {
        $result = $categories;
    }
    return $result;
}

// Get Category from ID
function getCategoryID($id){
    global $db;
    $sql = "select  * from category where id = $id ";
    $mysql_status = mysqli_query($db, $sql);

    $result = null;
    if($mysql_status && mysqli_num_rows($mysql_status) >= 1 ){
        $result = mysqli_fetch_assoc($mysql_status);
    }

    return $result;
}

// Get Blogs from Category
function getBlogsFromCategory($id){
    global $db;
    $sql = "select b.id as 'blog_id', b.title as 'blog_title',b.description as 'blog_desc',b.fecha,c.id as 'category_id', c.name as 'category_name' "
    ."from blog b "
    ."inner join category c "
    ."on b.category_id = c.id "
    ."where b.category_id = $id "
    ."order by b.id desc ";
    $mysql_status = mysqli_query($db, $sql);

    $result = null;
    if($mysql_status && mysqli_num_rows($mysql_status)){
        $result = $mysql_status;
    }

    return $result;

}

// Get One Blog with a specific ID. 
function getBlog($id)
{
    global $db;
    $sql = "select b.id as 'blog_id',b.title, b.user_id, b.description,b.fecha, c.id as 'category_id',c.name as 'category', concat(u.name,' ', u.surname) as 'user_name' " .
        "from blog b " .
        "inner join category c on b.category_id = c.id " .
        "inner join user u on b.user_id = u.id ".
        "where b.id = $id";

    $mysql_status = mysqli_query($db, $sql);
    $result = null;
    if($mysql_status && mysqli_num_rows($mysql_status) >= 1){
        $result = mysqli_fetch_assoc($mysql_status);
    }
    return $result;
}

// Get 4 or all Blogs. 
function getBlogs($limit = null)
{
    global $db;
    $sql = "select b.id as 'blog_id', b.title as 'blog_title', b.description as 'blog_desc', b.fecha, c.id as 'category_id', c.name as 'category_name' from blog b" .
        " inner join category c on b.category_id = c.id" .
        " order by b.id desc";

    if ($limit) {
        $sql .= " limit 5";
    }

    $mysql_blog = mysqli_query($db, $sql);

    $result = null;
    if ($mysql_blog && mysqli_num_rows($mysql_blog) >= 1) {
        $result = $mysql_blog;
    }
    return $result;
}


function searchBlog($search){
    global $db;
    $sql = "select b.id as 'blog_id', b.title, b.description as 'blog_desc', b.fecha, "
            ."u.name as 'user_name', c.id as 'category_id',c.name as 'category_name' from blog b "
            ."inner join category c on b.category_id = c.id "
            ."inner join user u on b.user_id = u.id "
            ."where b.title like '%$search%' or c.name like '%$search%' or u.name like '%$search%'";
    $mysql_status = mysqli_query($db, $sql);

    $result = null;
    if($mysql_status){
        $result = $mysql_status;
    }
    
    return $result;
}

/**
 * PREVIOUS:
 * select id form table where id < currentID order by id desc limit 3;
 * 
 * NEXT:
 * select id from table where id > currentID order by id asc limit 3;
 */

// function getNext($id){
//     global $db;
    
//     if(isset($_SESSION['next'])){

//     }else{
//         $_SESSION['next'] = $id
//     }
// }