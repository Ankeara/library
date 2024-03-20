<?php  
include("./connection/conn.php");

// Fetch and preview on page
if ($_GET['action'] === "fetchData") {
    $fetchBook = "SELECT bk.id, bk.BookName, cat.CategoryName, aut.author_name, bk.ISBNNumber, bk.BookImg, bk.Amount, bk.status 
                  FROM tblbooks bk INNER JOIN tblcategory cat ON bk.CatId = cat.id INNER JOIN tblauthors aut ON bk.AuthorId = aut.id order by id DESC;";
    // $fetchBook = "Select * from tblbooks";
    $book = mysqli_query($conn, $fetchBook);
    $data = [];
    while ($row = mysqli_fetch_assoc($book)) {
        $data[] = $row;
    }
    mysqli_close($conn);
    header("Content-Type: application/json");
    echo json_encode([
        "data" => $data,
    ]);
}


// Insert value to database
if ($_GET["action"] === "insertData") {
    if (
        !empty($_POST['bookName']) && 
        !empty($_POST['amount']) && 
        !empty($_POST['category']) && 
        !empty($_POST['status']) && 
        !empty($_POST['ISBNNumber'])
    ) {
        
        $book = mysqli_real_escape_string($conn, $_POST["bookName"]);
        $amount = mysqli_real_escape_string($conn, $_POST["amount"]);
        $author = mysqli_real_escape_string($conn, $_POST["author"]);
        $category = mysqli_real_escape_string($conn, $_POST["category"]);
        $status = mysqli_real_escape_string($conn, $_POST["status"]);
        $ISBNNumber = mysqli_real_escape_string($conn, $_POST["ISBNNumber"]);

        // Upload and rename image
        $original_name = $_FILES['bookImg']['name'];
        $new_name = uniqid() . time() . "." . pathinfo($original_name, PATHINFO_EXTENSION);
        
        if (move_uploaded_file($_FILES['bookImg']['tmp_name'], "uploads/books/" . $new_name)) {
            $insertBook = "INSERT INTO tblbooks(BookName, CatId, AuthorId, ISBNNumber, BookImg, Amount, status) 
                           VALUES ('$book', '$category', '$author', '$ISBNNumber', '$new_name', '$amount', '$status')";

            if (mysqli_query($conn, $insertBook)) {
                echo json_encode([
                    "statusCode" => 200,
                    "msg" => "Data inserted successfully",
                ]);
            } else {
                echo json_encode([
                    "statusCode" => 500,
                    "msg" => "Inserting data failed!!!",
                ]);
            }
        } else {
            echo json_encode([
                "statusCode" => 500,
                "msg" => "File upload failed!!!",
            ]);
        }

        mysqli_close($conn);
    } else {
        echo json_encode([
            "statusCode" => 401,
            "msg" => "Please fill all the required fields!!!",
        ]);
    }
}



// update Book 
if ($_GET["action"] === "updateBookQuery") {

    $id = mysqli_real_escape_string($conn, $_POST["id"]); // Prevent SQL injection

    $updateBook = "SELECT * FROM tblbooks WHERE id = '$id'";
    $updateBookQuery = mysqli_query($conn, $updateBook);

    if ($updateBookQuery) {
        if (mysqli_num_rows($updateBookQuery) > 0) {
            $data = mysqli_fetch_assoc($updateBookQuery);
            header("Content-Type: application/json");
            echo json_encode([
                "statusCode" => 200,
                "data" => $data
            ]);
        } else {
            echo json_encode([
                "statusCode" => 400,
                "msg" => "No book found with this id"
            ]);
        }
    } else {
        echo json_encode([
            "statusCode" => 500,
            "msg" => "Error querying the database"
        ]);
    }
}

// Insert value to database
if($_GET["action"] === "updateData"){
    if (
        !empty($_POST['bookName']) && 
        !empty($_POST['amount']) && 
        !empty($_POST['author']) && 
        !empty($_POST['category']) && 
        !empty($_POST['status']) && 
        !empty($_POST['ISBNNumber'])
    ) {
        $book = mysqli_real_escape_string($conn, $_POST["bookName"]);
        $amount = mysqli_real_escape_string($conn, $_POST["amount"]);
        $author = mysqli_real_escape_string($conn, $_POST["author"]);
        $category = mysqli_real_escape_string($conn, $_POST["category"]);
        $status = mysqli_real_escape_string($conn, $_POST["status"]);
        $ISBNNumber = mysqli_real_escape_string($conn, $_POST["ISBNNumber"]);
        // rename image before upload to database
        $id = mysqli_real_escape_string($conn, $_POST["id"]);
        if($_FILES['bookImg']['size'] <> 0){
            $original_name = $_FILES['bookImg']['name'];
            $new_name = uniqid() . time() . "." . pathinfo($original_name, PATHINFO_EXTENSION);
        move_uploaded_file($_FILES['bookImg']['tmp_name'], "uploads/books/". $new_name);
        unlink("uploads/books/". $_POST['old_image']);
        } else{
            $new_name = mysqli_escape_string( $conn,$_POST["old_image"]);
        }
        $updateBook = "UPDATE tblbooks 
        SET BookName='$book', CatId='$category', AuthorId='$author', BookImg='$new_name',ISBNNumber='$ISBNNumber', Amount='$amount', status='$status' 
        WHERE id = '$id'";
        if(mysqli_query($conn, $updateBook)){
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
if($_GET['action'] === "deleteBook"){
    $id = $_POST['id'];
    $delete_image = $_POST['delete_image'];

    $delBook = "DELETE FROM tblbooks WHERE id = '$id'";
    if(mysqli_query($conn, $delBook)){
        unlink("uploads/books/" . $delete_image);
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