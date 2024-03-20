<?php
session_start();
if(isset($_SESSION["AdminEmail"]) && isset($_SESSION["UserName"])){
    if (isset($_GET['login']) && $_GET['login'] == "success" && !isset($_SESSION['login_shown'])) {
        echo '<div class="alert_msg2 show">
        <i class="bi bi-check-lg"></i>
            <span class="fa-solid fa-circle-check text-success"></span>
            <span class="msg" text-success >Success: Sign In successfully</span>
        </div>';
        $_SESSION['login_shown'] = true;
    }
include("./includes/header.php");
include("./includes/navbar.php");
?>

<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <img src="./img/book (1).png" alt="" style="width: 45px; height: 45px;">
                <div class="ms-3">
                    <p class="mb-2">Total Book</p>
                    <h6 class="mb-0"><?php 
                         $query = "SELECT COUNT(*) AS BookCount FROM tblbooks";
                         $result = $conn->query($query);
             
                         // Check if the query was successful
                         if ($result) {
                             $row = $result->fetch_assoc();
                             echo $row['BookCount'];
                         } else {
                             echo "Error executing query: " . $conn->error;
                         }                   
                    ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <img src="./img/group.png" alt="" style="width: 45px; height: 45px;">
                <div class="ms-3">
                    <p class="mb-2">Total People</p>
                    <h6 class="mb-0"><?php 
                         $query = "SELECT COUNT(*) AS Person FROM tblperson";
                         $result = $conn->query($query);
             
                         // Check if the query was successful
                         if ($result) {
                             $row = $result->fetch_assoc();
                             echo $row['Person'];
                         } else {
                             echo "Error executing query: " . $conn->error;
                         }                   
                    ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <img src="./img/user.png" alt="" style="width: 45px; height: 45px;">
                <div class="ms-3">
                    <p class="mb-2">Today Author</p>
                    <h6 class="mb-0"><?php 
                         $query = "SELECT COUNT(*) AS authors FROM tblauthors";
                         $result = $conn->query($query);
             
                         // Check if the query was successful
                         if ($result) {
                             $row = $result->fetch_assoc();
                             echo $row['authors'];
                         } else {
                             echo "Error executing query: " . $conn->error;
                         }                   
                    ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <img src="./img/list.png" alt="" style="width: 45px; height: 45px;">
                <div class="ms-3">
                    <p class="mb-2">Total Category </p>
                    <h6 class="mb-0"><?php 
                         $query = "SELECT COUNT(*) AS category FROM tblcategory";
                         $result = $conn->query($query);
             
                         // Check if the query was successful
                         if ($result) {
                             $row = $result->fetch_assoc();
                             echo $row['category'];
                         } else {
                             echo "Error executing query: " . $conn->error;
                         }                   
                    ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                <img src="./img/book (2).png" alt="" style="width: 45px; height: 45px;">
                <div class="ms-3">
                    <p class="mb-2">Total Return Book </p>
                    <h6 class="mb-0">14</h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">

                <div class="ms-3">
                    <p class="mb-2">Total Issue Book</p>
                    <h6 class="mb-0">34</h6>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->


<!-- Detail book Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Book detail</h6>
            <a href="">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Book name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $books = getBook("tblbooks");
                        foreach ($books as $book) {
                            ?>
                    <tr>
                        <td><?= $book['BookName'] ?></td>
                        <td><?= $book['author_name'] ?></td>
                        <td><?= $book['CategoryName'] ?></td>
                        <td><?= $book['status'] ?></td>
                        <td><a class="btn btn-sm btn-primary" href="./book_detail.php?id=<?= $book['id'] ?>">Detail</a>
                        </td>
                    </tr>
                    <?php 
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Detail book End -->

<!-- Borrow Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Borrow detail</h6>
            <a href="">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Person</th>
                        <th scope="col">Book name</th>
                        <th scope="col">Total</th>
                        <th scope="col">Borrow date</th>
                        <th scope="col">Return book</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $borrows = getBorrow("tblborrow");
                        foreach ($borrows as $borrow) {
                            ?>
                    <tr>
                        <td><?= $borrow['FullName'] ?></td>
                        <td><?= $borrow['BookName'] ?></td>
                        <td><?= $borrow['TotalBook'] ?></td>
                        <td><?= $borrow['BorrowBook'] ?></td>
                        <td><?= $borrow['ReturnBook'] ?></td>
                        <td><?= $borrow['status'] ?></td>
                        <td><a class="btn btn-sm btn-primary"
                                href="./borrow_detail.php?borrow_id=<?= $borrow['borrow_id'] ?>">Detail</a></td>
                    </tr>
                    <?php 
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Borrow End -->

<!-- Return Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Return detail</h6>
            <a href="">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Book name</th>
                        <th scope="col">Author</th>
                        <th scope="col">Category</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $returns = getReturn("tblreturn");
                        foreach ($returns as $return) {
                            ?>
                    <tr>
                        <td><?= $return['FullName'] ?></td>
                        <td><?= $return['BookName'] ?></td>
                        <td><?= $return['returnDate'] ?></td>
                        <td><?= $return['status'] ?></td>
                        <td><a class="btn btn-sm btn-primary"
                                href="./return_detail.php?id=<?= $return['id'] ?>">Detail</a></td>
                    </tr>
                    <?php 
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Return End -->
<?php
include("./includes/footer.php");
}else{
    header("Location: ./404.php");
}
?>