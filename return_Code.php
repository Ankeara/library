<?php  
include("./connection/conn.php");

// Fetch and preview on page
if ($_GET['action'] === "fetchData") {
    $fetchReturn= "SELECT rt.id,p.FullName,bk.BookName,rt.amount,
    rt.returnDate,rt.status FROM 
    tblreturn rt inner join tblbooks bk on rt.book_id = bk.id 
inner join tblperson p on rt.person_id = p.id";
    $return = mysqli_query($conn, $fetchReturn);
    if (!$return) {
        die(mysqli_error($conn)); // Print any errors and stop execution
    }else{
        $return = mysqli_query($conn, $fetchReturn);
        $data = [];
        while ($row = mysqli_fetch_assoc($return)) {
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
        !empty($_POST['amount']) && 
        !empty($_POST['returnDate']) &&
        !empty($_POST['status'])
    ) {
        $book = mysqli_real_escape_string($conn, $_POST["book"]);
        $person = mysqli_real_escape_string($conn, $_POST["person"]);
        $amount = mysqli_real_escape_string($conn, $_POST["amount"]);
        $returnDate = mysqli_real_escape_string($conn, $_POST["returnDate"]);
        $status = mysqli_real_escape_string($conn, $_POST["status"]);
        $insertReturn = "INSERT INTO tblreturn(book_id, person_id, amount, returnDate, status) 
        VALUES ('$book', '$person', $amount, '$returnDate', '$status')";

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
if ($_GET["action"] === "updateReturn") {

    $id = mysqli_real_escape_string($conn, $_POST["id"]); // Prevent SQL injection

    $updateReturn = "SELECT * FROM tblreturn WHERE id = '$id'";
    $updateReturnQuery = mysqli_query($conn, $updateReturn);

    if ($updateReturnQuery) {
        if (mysqli_num_rows($updateReturnQuery) > 0) {
            $data = mysqli_fetch_assoc($updateReturnQuery);
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
        !empty($_POST['totalBook']) && 
        !empty($_POST['borrowDate']) &&
        !empty($_POST['returnDate']) &&
        !empty($_POST['status'])
    ) {

    $id = mysqli_real_escape_string($conn, $_POST["id"]); 
    $book = mysqli_real_escape_string($conn, $_POST["book"]);
    $person = mysqli_real_escape_string($conn, $_POST["person"]);
    $amount = mysqli_real_escape_string($conn, $_POST["amount"]);
    $returnDate = mysqli_real_escape_string($conn, $_POST["returnDate"]);
    $status = mysqli_real_escape_string($conn, $_POST["status"]);
    
    $updateReturn = "UPDATE tblreturn 
                     SET book_id = '$book', 
                         person_id = '$person', 
                         amount = $amount, 
                         returnDate = '$returnDate', 
                         status = '$status' 
                     WHERE id = '$id'";
    
        if(mysqli_query($conn, $updateBorrow)){
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
// if($_GET['action'] === "deleteBorrow"){
//     $id = $_POST['borrow_id'];

//     $delBook = "DELETE FROM tblborrow WHERE borrow_id = '$id'";
//     if(mysqli_query($conn, $delBook)){
//         echo json_encode([
//             "statusCode" => 200,
//             "msg" => "Data deleted successfully"
//         ]);
//     }else{
//         echo json_encode([
//             "statusCode" => 500,
//             "msg" => "Failed to delete this data"
//         ]);
//     }
// }