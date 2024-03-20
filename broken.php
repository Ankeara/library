<?php
session_start();
if(isset($_SESSION["AdminEmail"]) && isset($_SESSION["UserName"])){
    include("./includes/header.php");
    include("./includes/navbar.php");
?>

<div class="container-fluid fixed-top">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBroken" aria-labelledby="offcanvasNavbarLabel"
        style="width: 650px;">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Broken View</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="card-body">
                <form method="post" id="InsertBrokenForm">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="cate" class="form-label">People name :</label>
                            <select id="cate" class="form-select" name="person">
                                <option value="select">Select People</option>
                                <?php
                        $personQuery = getTable("tblperson");
                        foreach ($personQuery as $person) {
                        ?>
                                <option value="<?= $person['id'] ?>"><?= $person['FullName'] ?></option>
                                <?php
                        }
                        ?>
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="cate" class="form-label">Book name :</label>
                            <select id="cate" class="form-select" name="book">
                                <option value="select">Select Book</option>
                                <?php
                        $bookQuery = getTable("tblbooks");
                        foreach ($bookQuery as $book) {
                        ?>
                                <option value="<?= $book['id'] ?>"><?= $book['BookName'] ?></option>
                                <?php
                        }
                        ?>
                            </select>
                        </div>
                        <!-- Author select -->
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label" for="broken">Broken book :</label>
                            <input type="text" class="form-control" id="broken" name="broken" placeholder="emaple" />
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label" for="price">Price book :</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="emaple" />
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label" for="broken">Detail :</label>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="detail" id="floatingTextarea2">
                        </div>
                    </div>
                    <button type="submit" id="saveBroken" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid fixed-top">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditBroken" aria-labelledby="offcanvasNavbarLabel"
        style="width: 650px;">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Broken</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="card-body">
                <form method="post" id="UpdateBrokenForm">
                    <input type="hidden" name="id" id="id" placeholder="emaple" />
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label for="cate" class="form-label">People name :</label>
                            <select id="cate" class="form-select" name="person">
                                <option value="select">Select People</option>
                                <?php
                        $personQuery = getTable("tblperson");
                        foreach ($personQuery as $person) {
                        ?>
                                <option value="<?= $person['id'] ?>"><?= $person['FullName'] ?></option>
                                <?php
                        }
                        ?>
                            </select>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="cate" class="form-label">Book name :</label>
                            <select id="cate" class="form-select" name="book">
                                <option value="select">Select Book</option>
                                <?php
                        $bookQuery = getTable("tblbooks");
                        foreach ($bookQuery as $book) {
                        ?>
                                <option value="<?= $book['id'] ?>"><?= $book['BookName'] ?></option>
                                <?php
                        }
                        ?>
                            </select>
                        </div>
                        <!-- Author select -->
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label" for="broken">Broken book :</label>
                            <input type="text" class="form-control" id="broken" name="broken" placeholder="emaple" />
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label" for="price">Price book :</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="emaple" />
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label" for="broken">Detail :</label>
                        <div class="form-floating mb-3">
                            <input class="form-control" type="text" name="detail" id="floatingTextarea2">

                        </div>
                    </div>
                    <button type="submit" id="EditBroken" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Content wrapper -->
<div class="container-xxl flex-grow-1 container-p-y">
    <button class="btn btn-primary mt-2 mb-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBroken"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <i class="fa-solid fa-plus"></i> Broken
    </button>
    <!-- book Profile -->
    <div class="row">
        <!-- Bordered Table -->
        <div class="cal-5">
            <table class="table table-striped w-100 " id="tblbroken">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Person name</th>
                        <th>Book name</th>
                        <th>Broken book</th>
                        <th>Price date</th>
                        <th>Detail broken</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!--/ Bordered Table -->
    </div>
</div>

<!-- Toast container-->
<div class="toast-container p-3" style="position:fixed; top:10px; right:10px; z-index:100;">
    <!-- Success -->
    <div class="toast align-items-center bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true"
        id="successtoast">
        <div class="d-flex">
            <div class="toast-body">
                <strong>Success!!</strong>
                <span id="successMsg"></span>
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="close"></button>
        </div>
    </div>
    <!-- Error -->
    <div class="toast align-items-center bg-danger text-white" role="alert" aria-live="assertive" aria-atomic="true"
        id="errortoast">
        <div class="d-flex">
            <div class="toast-body">
                <strong>Error!!</strong>
                <span id="errorMsg"></span>
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="close"></button>
        </div>
    </div>
</div>
<!-- Toast container-->

<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                &copy; <a href="./dashboard.php">Library Manage</a>, All Right Reserved.
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
                <!--/*** This template is free as long as you keep the footer book’s credit link/attribution link/backlink. If you'd like to use the template without the footer book’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed By <a href="./dashboard.php">Library Manage</a>
                </br>
                Distributed By <a class="border-bottom" href="./dashboard.php">Library Manage</a>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
</div>
<!-- Content End -->


<!-- Back to Top -->
<a href="./borrow.php" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/chart/chart.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Datatable -->
<script src="https://cdn.datatables.net/v/bs5/dt-2.0.0/datatables.min.js"></script>

<!-- Template Javascript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-qFOQ9YFAeGj1gDOuUD61g3D+tLDv3u1ECYWqT82WQoaWrOhAY+5mRMTTVsQdWutbA5FORCnkEPEgU0OF8IzGvA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script>
$(document).ready(function() {
    // Call fetch data
    fetchData();

    // datatable 
    let tblbroken = new DataTable("#tblbroken");

    // Fetch data 
    function fetchData() {
        $.ajax({
            url: './broken_Code.php?action=fetchData',
            type: 'POST', // Corrected from Type to type
            dataType: 'JSON',
            success: function(response) {
                var data = response.data;
                tblbroken.clear().draw();
                $.each(data, function(index, value) {
                    tblbroken.row.add([
                        value.id,
                        value.FullName,
                        value.BookName,
                        value.broken_book,
                        value.price,
                        value.detail_broken,
                        '<Button type="bsutton" class="btn btn-primary editBrokenQuery m-2" value="' +
                        value.id +
                        '"><i class="fa-solid fa-pencil"></i> Edit</Button>'
                    ]).draw(false);
                });
            }
        })
    }

    // Insert Value to database
    $("#InsertBrokenForm").on("submit", function(e) {
        $("#saveBroken").attr("disabled", "disabled");
        e.preventDefault();
        $.ajax({
            url: './broken_Code.php?action=insertData',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                var response = JSON.parse(response);
                if (response.statusCode == 200) {
                    $("#offcanvasBroken").offcanvas("hide");
                    $("#saveBroken").removeAttr("disabled");
                    $("#InsertBrokenForm")[0].reset();
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Signed in successfully"
                    });
                    fetchData();
                } else if (response.statusCode == 500) {
                    $("#offcanvasBroken").offcanvas("hide");
                    $("#saveBroken").removeAttr("disabled");
                    $("#InsertBrokenForm")[0].reset();
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went fdwrong!"
                    });
                } else if (response.statusCode == 401) {
                    $("#offcanvasBroken").offcanvas("hide");
                    $("#saveBroken").removeAttr("disabled");
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!"
                    });
                }
            }
        });
    });

    // fetch data to form update
    $("#tblbroken").on("click", ".editBrokenQuery", function() {
        var id = $(this).val();
        $.ajax({
            url: "./broken_Code.php?action=updateBroken",
            type: "POST",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(response) {
                var data = response.data;
                $("#UpdateBrokenForm #id").val(data.id);
                $("#UpdateBrokenForm select[name='person']").val(data.person_id);
                $("#UpdateBrokenForm select[name='book']").val(data.book_id);
                $("#UpdateBrokenForm input[name='broken']").val(data.broken_book);
                $("#UpdateBrokenForm input[name='price']").val(data.price);
                $("#UpdateBrokenForm input[name='detail']").val(data.detail_broken);
                $("#offcanvasEditBroken").offcanvas("show");
            }
        })
    });

    // update value to databse
    $("#UpdateBrokenForm").on("submit", function(e) {
        $("#EditBroken").attr("disabled", "disabled");
        e.preventDefault();
        $.ajax({
            url: './broken_Code.php?action=updateData',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                var response = JSON.parse(response);
                if (response.statusCode == 200) {
                    $("#offcanvasEditBroken").offcanvas("hide");
                    $("#EditBroken").removeAttr("disabled");
                    $("#UpdateBrokenForm")[0].reset();
                    $("#successtoast").toast("show");
                    $("#successMsg").html(response.msg);
                } else if (response.statusCode == 500) {
                    $("#offcanvasEditBroken").offcanvas("hide");
                    $("#EditBroken").removeAttr("disabled");
                    $("#UpdateBrokenForm")[0].reset();
                    $("#errortoast").toast("show");
                    $("#errorMsg").html(response.msg);
                } else if (response.statusCode == 400) {
                    $("#offcanvasEditBroken").offcanvas("hide");
                    $("#EditBroken").removeAttr("disabled");
                    $("#errortoast").toast("show");
                    $("#errorMsg").html(response.msg);
                }
            }
        });
    });

    // $("#broken").on("click", ".deleteBorrow", function() {
    //     var borrow_id = $(this).val();
    //     const swalWithBootstrapButtons = Swal.mixin({
    //         customClass: {
    //             confirmButton: "btn btn-success",
    //             cancelButton: "btn btn-danger"
    //         },
    //         buttonsStyling: false
    //     });
    //     swalWithBootstrapButtons.fire({
    //         title: "Are you sure?",
    //         text: "You won't be able to revert this!",
    //         icon: "warning",
    //         showCancelButton: true,
    //         confirmButtonText: "Yes, delete it!",
    //         cancelButtonText: "No, cancel!",
    //         reverseButtons: true
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({
    //                 url: "./broken_Code.php?action=deleteBorrow",
    //                 type: "POST",
    //                 dataType: "JSON",
    //                 data: {
    //                     borrow_id
    //                 },
    //                 success: function(response) {
    //                     if (response.statusCode == 200) {
    //                         fetchData();
    //                         swalWithBootstrapButtons.fire({
    //                             title: "Deleted!",
    //                             text: "Your file has been deleted.",
    //                             icon: "success"
    //                         });
    //                     } else {
    //                         Swal.fire({
    //                             icon: "error",
    //                             title: "Oops...",
    //                             text: "Something went wrong!"
    //                         });
    //                     }
    //                 }
    //             });

    //         } else if (
    //             /* Read more about handling dismissals below */
    //             result.dismiss === Swal.DismissReason.cancel
    //         );
    //     });
    // });

});
const alertMsg = $(".alert_msg");

if (alertMsg.length) {
    // Show the alert
    alertMsg.fadeIn();

    // Set a timeout to hide the alert after 5 seconds
    setTimeout(function() {
        alertMsg.fadeOut();
    }, 5000);
}

const alertMsg2 = $(".alert_msg2");

if (alertMsg2.length) {
    // Show the alert
    alertMsg2.fadeIn();

    // Set a timeout to hide the alert after 5 seconds
    setTimeout(function() {
        alertMsg2.fadeOut();
    }, 5000);
}
</script>
</body>

</html>
<?php
}else{
    header("Location: ./index.php");
}
?>