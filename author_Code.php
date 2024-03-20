<?php  
include("./connection/conn.php");

// Fetch and preview on page
if($_GET['action'] === "fetchData"){
    $fetchAuthor = "SELECT * FROM tblauthors order by id DESC";
    $author = mysqli_query($conn,$fetchAuthor);
    $data = [];
    while($row = mysqli_fetch_assoc($author)){
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
    if(!empty($_POST['author']) && !empty($_POST['gender']) ){
        $author = mysqli_escape_string($conn,$_POST["author"]);
        $gender = mysqli_escape_string( $conn,$_POST["gender"]);
        $dob = mysqli_escape_string( $conn,$_POST["dob"]);
        // rename image before upload to database
        $original_name = $_FILES['profile']['name'];
        $new_name = uniqid() . time() . "." . pathinfo($original_name, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['profile']['tmp_name'], "uploads/profile-novels/". $new_name);

        $insertAuthor = "INSERT INTO tblauthors (author_name,gender,dob,profile) VALUES('$author','$gender','$dob','$new_name')";
        if(mysqli_query($conn, $insertAuthor)){
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
if($_GET["action"] === "updateAuthor"){
    $id = $_POST["id"];
    $updateAuthor = "SELECT * FROM tblauthors WHERE id = '$id'";
    $updateAuthorQuery = mysqli_query($conn, $updateAuthor);
    if(mysqli_num_rows($updateAuthorQuery) > 0){
        $data = mysqli_fetch_assoc($updateAuthorQuery);
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
    if(!empty($_POST['author']) && !empty($_POST['gender']) ){
        $author = mysqli_escape_string($conn,$_POST["author"]);
        $gender = mysqli_escape_string( $conn,$_POST["gender"]);
        $dob = mysqli_escape_string( $conn,$_POST["dob"]);
        // rename image before upload to database
        $id = $_POST['id'];
        if($_FILES['profile']['size'] <> 0){
            $original_name = $_FILES['profile']['name'];
            $new_name = uniqid() . time() . "." . pathinfo($original_name, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['profile']['tmp_name'], "uploads/profile-novels/". $new_name);
        unlink("uploads/profile-novels/". $_POST['old_image']);
        } else{
            $new_name = mysqli_escape_string( $conn,$_POST["old_image"]);
        }
        $updateAuthor = "UPDATE tblauthors SET author_name='$author', gender = '$gender', dob='$dob',profile='$new_name' WHERE id = '$id'";
        if(mysqli_query($conn, $updateAuthor)){
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
if($_GET['action'] === "deleteAuthor"){
    $id = $_POST['id'];
    $delete_image = $_POST['delete_image'];

    $delAuthor = "DELETE FROM tblauthors WHERE id = '$id'";
    if(mysqli_query($conn, $delAuthor)){
        unlink("uploads/profile-novels/" . $delete_image);
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