<?php  
include("./connection/conn.php");

// Fetch and preview on page
if ($_GET['action'] === "fetchData") {
    $fetchBorrow = "SELECT bw.borrow_id,bk.BookName,p.FullName,bw.TotalBook,
                            bw.BorrowBook,bw.ReturnBook,bw.status FROM 
                         tblborrow bw inner join tblbooks bk on bw.BookId = bk.id 
                         inner join tblperson p on bw.PersonId = p.id";
    $borrow = mysqli_query($conn, $fetchBorrow);
    if (!$borrow) {
        die(mysqli_error($conn)); // Print any errors and stop execution
    }else{
        $borrow = mysqli_query($conn, $fetchBorrow);
        $data = [];
        while ($row = mysqli_fetch_assoc($borrow)) {
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
        !empty($_POST['totalBook']) && 
        !empty($_POST['borrowDate']) &&
        !empty($_POST['returnDate']) &&
        !empty($_POST['status'])
    ) {
        
        $book = mysqli_real_escape_string($conn, $_POST["book"]);
        $person = mysqli_real_escape_string($conn, $_POST["person"]);
        $totalBook = mysqli_real_escape_string($conn, $_POST["totalBook"]);
        $borrowDate = mysqli_real_escape_string($conn, $_POST["borrowDate"]);
        $returnDate = mysqli_real_escape_string($conn, $_POST["returnDate"]);
        $status = mysqli_real_escape_string($conn, $_POST["status"]);
        $insertBorrow = "INSERT INTO tblborrow(BookId, PersonId, TotalBook, BorrowBook, ReturnBook, status) 
        VALUES ('$book', '$person', $totalBook, '$borrowDate', '$returnDate', '$status')";

        if (mysqli_query($conn, $insertBorrow)) {
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
if ($_GET["action"] === "updateBookQuery") {

    $id = mysqli_real_escape_string($conn, $_POST["borrow_id"]); // Prevent SQL injection

    $updateBorrow = "SELECT * FROM tblborrow WHERE borrow_id = '$id'";
    $updateBorrowQuery = mysqli_query($conn, $updateBorrow);

    if ($updateBorrowQuery) {
        if (mysqli_num_rows($updateBorrowQuery) > 0) {
            $data = mysqli_fetch_assoc($updateBorrowQuery);
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
    if (!empty($_POST['borrow_id']) && 
        !empty($_POST['person']) && 
        !empty($_POST['book']) && 
        !empty($_POST['totalBook']) && 
        !empty($_POST['borrowDate']) &&
        !empty($_POST['returnDate']) &&
        !empty($_POST['status'])
    ) {

    $id = mysqli_real_escape_string($conn, $_POST["borrow_id"]); // Prevent SQL injection
        $book = mysqli_real_escape_string($conn, $_POST["book"]);
        $person = mysqli_real_escape_string($conn, $_POST["person"]);
        $totalBook = mysqli_real_escape_string($conn, $_POST["totalBook"]);
        $borrowDate = mysqli_real_escape_string($conn, $_POST["borrowDate"]);
        $returnDate = mysqli_real_escape_string($conn, $_POST["returnDate"]);
        $status = mysqli_real_escape_string($conn, $_POST["status"]);

        $updateBorrow = "UPDATE tblborrow SET 
                        BookId = '$book',
                        PersonId = '$person',
                        TotalBook = '$totalBook', 
                        BorrowBook = '$borrowDate', 
                        ReturnBook = '$returnDate', 
                        status = '$status' 
                        WHERE borrow_id = '$id'";

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