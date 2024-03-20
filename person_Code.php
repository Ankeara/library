<?php  
include("./connection/conn.php");

// Fetch and preview on page
if($_GET['action'] === "fetchData"){
    $fetchPerson = "SELECT * FROM tblperson";
    $person = mysqli_query($conn,$fetchPerson);
    $data = [];
    while($row = mysqli_fetch_assoc($person)){
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
    if(!empty($_POST['person']) && !empty($_POST['email']) && !empty($_POST['gender']) && !empty($_POST['phonenumber'])  ){
        $person = mysqli_escape_string($conn,$_POST["person"]);
        $email = mysqli_escape_string($conn,$_POST["email"]);
        $gender = mysqli_escape_string($conn,$_POST["gender"]);
        $phonenumber = mysqli_escape_string($conn,$_POST["phonenumber"]);
        $status = mysqli_escape_string($conn,$_POST["status"]);

        $insertPerson = "INSERT INTO tblperson (FullName,Gender,EmailId,MobileNumber,Status) VALUES('$person','$gender','$email','$phonenumber','$status')";
        if(mysqli_query($conn, $insertPerson)){
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
if($_GET["action"] === "updateperson"){
    $id = $_POST["id"];
    $updatePerson = "SELECT * FROM tblperson WHERE id = '$id'";
    $updatePersonQuery = mysqli_query($conn, $updatePerson);
    if(mysqli_num_rows($updatePersonQuery) > 0){
        $data = mysqli_fetch_assoc($updatePersonQuery);
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
if ($_GET["action"] === "updateData") {
    if (!empty($_POST['person']) && !empty($_POST['email']) && !empty($_POST['gender']) && !empty($_POST['phonenumber'])) {
        $id = $_POST['id'];
        $person = mysqli_escape_string($conn, $_POST["person"]);
        $email = mysqli_escape_string($conn, $_POST["email"]);
        $gender = mysqli_escape_string($conn, $_POST["gender"]);
        $phonenumber = mysqli_escape_string($conn, $_POST["phonenumber"]);
        $status = mysqli_escape_string($conn, $_POST["status"]);

        $updatePerson = "UPDATE tblperson SET 
                            FullName = '$person',
                            Gender = '$gender',
                            EmailId = '$email',
                            MobileNumber = '$phonenumber',
                            Status = '$status'
                        WHERE id = '$id'";
                        
        // Execute the query once
        if (mysqli_query($conn, $updatePerson)) {
            echo json_encode([
                "statusCode" => 200,
                "msg" => "Data update successfully"
            ]);
        } else {
            echo json_encode([
                "statusCode" => 500,
                "msg" => "Update data failed!!!"
            ]);
        }
    } else {
        echo json_encode([
            "statusCode" => 400,
            "msg" => "Please fill all the required fields!!!"
        ]);
    }
}


// delete value on database 
if($_GET['action'] === "deletePerson"){
    $id = $_POST['id'];

    $delPerson = "DELETE FROM tblperson WHERE id = '$id'";
    if(mysqli_query($conn, $delPerson)){
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