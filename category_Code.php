<?php  
include("./connection/conn.php");

// Fetch and preview on page
if($_GET['action'] === "fetchData"){
    $fetchCategory = "SELECT * FROM tblcategory";
    $category = mysqli_query($conn,$fetchCategory);
    $data = [];
    while($row = mysqli_fetch_assoc($category)){
        $data[] = $row;
    }
    mysqli_close($conn);
    header("Content-Type: application/json");
    echo json_encode([
        "data" => $data,
    ]);
}

// Insert value to database
if($_GET["action"] === "insertData"){
    if(!empty($_POST['category']) ){
        $category = mysqli_escape_string($conn,$_POST["category"]);

        $insertCategory = "INSERT INTO tblcategory (CategoryName) VALUES('$category')";
        if(mysqli_query($conn, $insertCategory)){
            echo json_encode([
                "statusCode"=> 200,
                "msg"=> "Data insert successfully"
            ]);
        }else{
            echo json_encode([
                "statusCode"=> 500,
                "msg"=> "Insert data failed!!!"
            ]);
        }
    } else{
        echo json_encode([
            "statusCode"=> 400,
            "msg"=> "Please fill all the required failed!!!"
        ]);
    }
}

// update author 
if($_GET["action"] === "updatecategory"){
    $id = $_POST["id"];
    $updateCategory = "SELECT * FROM tblcategory WHERE id = '$id'";
    $updateCategoryQuery = mysqli_query($conn, $updateCategory);
    if(mysqli_num_rows($updateCategoryQuery) > 0){
        $data = mysqli_fetch_assoc($updateCategoryQuery);
        header("Content-Type: application/json");
        echo json_encode([
            "statusCode" =>  200,
            "data" => $data
        ]);
    }else{
        echo json_encode([
            "statusCode" =>  400,
            "msg" => "No author found with this id"
        ]);
    }
    mysqli_close($conn);
}

// Insert value to database
if($_GET["action"] === "updateData"){
    if(!empty($_POST['category'])  ){
        $category = mysqli_escape_string($conn,$_POST["category"]);
        $id = $_POST['id'];
        $updateCategory = "UPDATE tblcategory SET CategoryName='$category' WHERE id = '$id'";
        if(mysqli_query($conn, $updateCategory)){
            echo json_encode([
                "statusCode"=> 200,
                "msg"=> "Data update successfully"
            ]);
        }else{
            echo json_encode([
                "statusCode"=> 500,
                "msg"=> "update data failed!!!"
            ]);
        }
    } else{
        echo json_encode([
            "statusCode"=> 400,
            "msg"=> "Please fill all the required failed!!!"
        ]);
    }
}

// delete value on database 
if($_GET['action'] === "deletecategory"){
    $id = $_POST['id'];

    $delCategory = "DELETE FROM tblcategory WHERE id = '$id'";
    if(mysqli_query($conn, $delCategory)){
        echo json_encode([
            "statusCode" => 200,
            "msg" => "Data deleted successfully"
        ]);
    }else{
        echo json_encode([
            "statusCode" => 500,
            "msg" => "Failed to delete this data"
        ]);
    }
}