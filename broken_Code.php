<?php  
include("./connection/conn.php");

// Fetch and preview on page
if ($_GET['action'] === "fetchData") {
    $fetchBroken = "SELECT brk.id,p.FullName,bk.BookName,brk.broken_book,
                    brk.price,brk.detail_broken FROM 
                    tblbroken brk inner join tblbooks bk on brk.book_id = bk.id 
                inner join tblperson p on brk.person_id = p.id";
    $broken = mysqli_query($conn, $fetchBroken);
    if (!$broken) {
        die(mysqli_error($conn)); // Print any errors and stop execution
    }else{
        $broken = mysqli_query($conn, $fetchBroken);
        $data = [];
        while ($row = mysqli_fetch_assoc($broken)) {
            $data[] = $row;
        }
        mysqli_close($conn);
        header("Content-Type: application/json");
        echo json_encode([
            "data" => $data,
        ]);
    }
}


// Insert value to database
if ($_GET["action"] === "insertData") {
    if (
        !empty($_POST['person']) && 
        !empty($_POST['book']) && 
        !empty($_POST['broken']) && 
        !empty($_POST['price']) &&
        !empty($_POST['detail'])
    ) {
        $book = mysqli_real_escape_string($conn, $_POST["book"]);
        $person = mysqli_real_escape_string($conn, $_POST["person"]);
        $broken = mysqli_real_escape_string($conn, $_POST["broken"]);
        $price = mysqli_real_escape_string($conn, $_POST["price"]);
        $detail = mysqli_real_escape_string($conn, $_POST["detail"]);
        $insertReturn = "INSERT INTO tblbroken(person_id,book_id,  broken_book, price,detail_broken) 
        VALUES ('$person', '$book',  $broken, '$price', '$detail')";

        if (mysqli_query($conn, $insertReturn)) {
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
        mysqli_close($conn);
    } else {
        echo json_encode([
            "statusCode" => 401,
            "msg" => "Please fill all the required fields!!!",
        ]);
    }
}



// update Book 
if ($_GET["action"] === "updateBroken") {

    $id = mysqli_real_escape_string($conn, $_POST["id"]); // Prevent SQL injection

    $updateBroken = "SELECT * FROM tblbroken WHERE id = '$id'";
    $updateBrokenQuery = mysqli_query($conn, $updateBroken);

    if ($updateBrokenQuery) {
        if (mysqli_num_rows($updateBrokenQuery) > 0) {
            $data = mysqli_fetch_assoc($updateBrokenQuery);
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
        !empty($_POST['person']) && 
        !empty($_POST['book']) && 
        !empty($_POST['broken']) && 
        !empty($_POST['price']) &&
        !empty($_POST['detail'])
        ) {
        $id = mysqli_real_escape_string($conn, $_POST["id"]); 
        $book = mysqli_real_escape_string($conn, $_POST["book"]);
        $person = mysqli_real_escape_string($conn, $_POST["person"]);
        $broken = mysqli_real_escape_string($conn, $_POST["broken"]);
        $price = mysqli_real_escape_string($conn, $_POST["price"]);
        $detail = mysqli_real_escape_string($conn, $_POST["detail"]);
    
        $updateBroken = "UPDATE tblbroken 
                         SET
                             person_id = '$person',
                             book_id = '$book',
                          broken_book = $broken,
                             price = $price,
                             detail_broken = '$detail'
                         WHERE id = $id";
    
        if(mysqli_query($conn, $updateBroken)){
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