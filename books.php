<?php
session_start();
if(isset($_SESSION["AdminEmail"]) && isset($_SESSION["UserName"])){
    include("./includes/header.php");
    include("./includes/navbar.php");
?>

<div class="container-fluid fixed-top">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBook" aria-labelledby="offcanvasNavbarLabel"
        style="width: 650px;">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Book CRUD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="card-body">
                <form method="post" id="InsertBookForm">
                    <div class="row">
                        <div class="col-4 mb-3">
                            <label class="form-label" for="book">Book name :</label>
                            <input type="text" class="form-control" id="book" name="bookName" placeholder="emaple" />
                        </div>
                        <!-- Category select -->
                        <div class="col-4 mb-3">
                            <label for="cate" class="form-label">Category :</label>
                            <select id="cate" class="form-select" name="category">
                                <option value="select">Select Category</option>
                                <?php
                        $categorys = getTable("tblcategory");
                        foreach ($categorys as $category) {
                        ?>
                                <option value="<?= $category['id'] ?>"><?= $category['CategoryName'] ?></option>
                                <?php
                        }
                        ?>
                            </select>
                        </div>
                        <!-- Author select -->
                        <div class="col-4 mb-3">
                            <label for="cate" class="form-label">Author :</label>
                            <select id="cate" class="form-select" name="author">
                                <option value="select">Select Author</option>
                                <?php
                        $authors = getTable("tblauthors");
                        foreach ($authors as $author) {
                        ?>
                                <option value="<?= $author['id'] ?>"><?= $author['author_name'] ?></option>
                                <?php
                        }
                        ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-3">
                            <label class="form-label" for="ISBNNumber">ISBNNumber :</label>
                            <input type="text" class="form-control" id="ISBNNumber" name="ISBNNumber"
                                placeholder="emaple" />
                        </div>
                        <div class="col-4 mb-3">
                            <label class="form-label" for="amount">Amount :</label>
                            <input type="text" class="form-control" id="amount" name="amount" placeholder="emaple" />
                        </div>
                        <div class="col-4 mb-3">
                            <label for="status" class="form-label">Status :</label>
                            <select id="status" class="form-select" name="status">
                                <option>Default select</option>
                                <option value="Active">Active</option>
                                <option value="Unavailable">Unavailable</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <div class="input-file"
                                style="display:block; width: 300px; height: 300px; box-shadow: 0 5px 10px rgba(0,0,0,0.1); position:relative; margin-top: 20px;">
                                <input type="file" class="form-control image" name="bookImg"
                                    style="position:absolute; top: 0; left: 0; border: none; outline: none; width:100%; height:100%; background: transparent; z-index: 100;">
                                <div class="icon-file"
                                    style="z-index: 99; position:absolute; left:50%;top:50%;transform: translate(-50%,-50%);">
                                    <i class="fa-solid fa-cloud-arrow-up text-primary " style="font-size: 35px;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="book"
                                style="display:block; width: 200px; height: 200px; border-radius: 10%; box-shadow: 0 5px 10px rgba(0,0,0,0.1); position:relative; margin-top: 20px;">
                                <img src="./img/add.png" class="preview-img"
                                    style="display:block;margin: 0 auto;  width: 100%; height: 100%; object-fit:cover; border-radius: 10%;"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="saveBook" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid fixed-top">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditBook" aria-labelledby="offcanvasNavbarLabel"
        style="width: 650px;">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Book Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="card-body">
                <form method="post" id="UpdateBookForm">
                    <div class="row">
                        <input type="hidden" name="id" id="id">
                        <div class="col-4 mb-3">
                            <label class="form-label" for="book">Book name :</label>
                            <input type="text" class="form-control" id="book" name="bookName" placeholder="emaple" />
                        </div>
                        <!-- Category select -->
                        <div class="col-4 mb-3">
                            <label for="cate" class="form-label">Category :</label>
                            <select id="cate" class="form-select" name="category">
                                <option value="select">Select Category</option>
                                <?php
                        $categorys = getTable("tblcategory");
                        foreach ($categorys as $category) {
                        ?>
                                <option value="<?= $category['id'] ?>"><?= $category['CategoryName'] ?></option>
                                <?php
                        }
                        ?>
                            </select>
                        </div>
                        <!-- Author select -->
                        <div class="col-4 mb-3">
                            <label for="cate" class="form-label">Author :</label>
                            <select id="cate" class="form-select" name="author">
                                <option value="select">Select Author</option>
                                <?php
                                    $authors = getTable("tblauthors");
                                    foreach ($authors as $author) {
                                    ?>
                                <option value="<?= $author['id'] ?>"><?= $author['author_name'] ?></option>
                                <?php
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-3">
                            <label class="form-label" for="ISBNNumber">ISBNNumber :</label>
                            <input type="text" class="form-control" id="ISBNNumber" name="ISBNNumber"
                                placeholder="emaple" />
                        </div>
                        <div class="col-4 mb-3">
                            <label class="form-label" for="amount">Amount :</label>
                            <input type="text" class="form-control" id="amount" name="amount" placeholder="emaple" />
                        </div>
                        <div class="col-4 mb-3">
                            <label for="status" class="form-label">Status :</label>
                            <select id="status" class="form-select" name="status">
                                <option>Default select</option>
                                <option value="Active">Active</option>
                                <option value="Unavailable">Unavailable</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <div class="input-file"
                                style="display:block; width: 300px; height: 300px; box-shadow: 0 5px 10px rgba(0,0,0,0.1); position:relative; margin-top: 20px;">
                                <input type="hidden" id="old_image" name="old_image">
                                <input type="file" class="form-control image" name="bookImg"
                                    style="position:absolute; top: 0; left: 0; border: none; outline: none; width:100%; height:100%; background: transparent; z-index: 100;">
                                <div class="icon-file"
                                    style="z-index: 99; position:absolute; left:50%;top:50%;transform: translate(-50%,-50%);">
                                    <i class="fa-solid fa-cloud-arrow-up text-primary " style="font-size: 35px;"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col mb-3">
                            <div class="profile"
                                style="display:block; width: 150px; height: 150px; border-radius: 50%; box-shadow: 0 5px 10px rgba(0,0,0,0.1); position:relative; margin-top: 20px;">
                                <img src="./img/add.png" class="preview-img"
                                    style="display:block; width: 100%; height: 100%; object-fit:cover ; border-radius: 50%;"
                                    alt="">
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="EditBook" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Content wrapper -->
<div class="container-xxl flex-grow-1 container-p-y">
    <button class="btn btn-primary mt-2 mb-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBook"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <i class="fa-solid fa-plus"></i> Books
    </button>
    <!-- book Profile -->
    <div class="row">

        <!-- Bordered Table -->
        <div class="cal-5">
            <table class="table table-striped w-100 " id="mybook">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Boook Picture</th>
                        <th>Book name</th>
                        <th>Category</th>
                        <th>Author</th>
                        <th>ISBNNumber</th>
                        <th>Amount</th>
                        <th>Status</th>
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
<a href="./books.php" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
    let tblbook = new DataTable("#mybook");

    // Preview image before insert 
    $("input.image").change(function() {
        var file = this.files[0];
        var url = URL.createObjectURL(file);
        $(this).closest(".row").find(".preview-img").attr("src", url);
    })

    // Fetch data 
    function fetchData() {
        $.ajax({
            url: './book_Code.php?action=fetchData',
            type: 'POST', // Corrected from Type to type
            dataType: 'JSON',
            success: function(response) {
                var data = response.data;
                tblbook.clear().draw();
                $.each(data, function(index, value) {
                    var profileImageSrc = (value.BookImg !== null && value.BookImg !== "") ?
                        './uploads/books/' + value.BookImg : './img/add.png';
                    tblbook.row.add([
                        value.id,
                        '<img src="' + profileImageSrc +
                        '" style="width:100px;height:100px;border:2px solid gray;border-radius: 8px;object-fit:cover;" />',
                        value.BookName,
                        value.CategoryName,
                        value.author_name,
                        value.ISBNNumber,
                        value.Amount,
                        value.status,
                        '<Button type="button" class="btn btn-primary editBookQuery m-2" value="' +
                        value.id +
                        '"><i class="fa-solid fa-pencil"></i> Edit</Button>' +
                        '<Button type="button" class="btn btn-danger deleteBook m-2" value="' +
                        value.id +
                        '"><i class="fa-solid fa-trash"></i> Edit</Button>' +
                        '<input class="delete_image" type="hidden" value="' + value
                        .BookImg + '"/>'
                    ]).draw(false);
                });
            }
        })
    }

    // Insert Book
    // Insert Value to database
    $("#InsertBookForm").on("submit", function(e) {
        $("#saveBook").attr("disabled", "disabled");
        e.preventDefault();
        $.ajax({
            url: './book_Code.php?action=insertData',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                var response = JSON.parse(response);
                if (response.statusCode == 200) {
                    $("#offcanvasBook").offcanvas("hide");
                    $("#saveBook").removeAttr("disabled");
                    $("#InsertBookForm")[0].reset();
                    $(".preview-img").attr("src", "./img/add.png");
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
                    $("#offcanvasBook").offcanvas("hide");
                    $("#saveBook").removeAttr("disabled");
                    $("#InsertBookForm")[0].reset();
                    $(".preview-img").attr("src", "./img/add.png");
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went fdwrong!"
                    });
                } else if (response.statusCode == 401) {
                    $("#offcanvasBook").offcanvas("hide");
                    $("#saveBook").removeAttr("disabled");
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
    $("#mybook").on("click", ".editBookQuery", function() {
        var id = $(this).val();
        $.ajax({
            url: "./book_Code.php?action=updateBookQuery",
            type: "POST",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(response) {
                var data = response.data;
                $("#UpdateBookForm #id").val(data.id);
                $("#UpdateBookForm input[name='bookName']").val(data.BookName);
                $("#UpdateBookForm select[name='category']").val(data.CatId);
                $("#UpdateBookForm select[name='author']").val(data.AuthorId);
                $("#UpdateBookForm input[name='ISBNNumber']").val(data.ISBNNumber);
                $("#UpdateBookForm .preview-img").attr("src", "uploads/books/" + data
                    .BookImg + "");
                $("#UpdateBookForm #old_image").val(data.BookImg);
                $("#UpdateBookForm input[name='amount']").val(data.Amount);
                $("#UpdateBookForm select[name='status']").val(data.status);
                $("#offcanvasEditBook").offcanvas("show");
            }
        })
    });

    // update value to databse
    $("#UpdateBookForm").on("submit", function(e) {
        $("#EditBook").attr("disabled", "disabled");
        e.preventDefault();
        $.ajax({
            url: './book_Code.php?action=updateData',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                var response = JSON.parse(response);
                if (response.statusCode == 200) {
                    $("#offcanvasEditBook").offcanvas("hide");
                    $("#EditBook").removeAttr("disabled");
                    $("#UpdateBookForm")[0].reset();
                    $(".preview-img").attr("src", "./img/add.png");
                    $("#successtoast").toast("show");
                    $("#successMsg").html(response.msg);
                } else if (response.statusCode == 500) {
                    $("#offcanvasEditBook").offcanvas("hide");
                    $("#EditBook").removeAttr("disabled");
                    $("#UpdateBookForm")[0].reset();
                    $(".preview-img").attr("src", "./img/add.png");
                    $("#errortoast").toast("show");
                    $("#errorMsg").html(response.msg);
                } else if (response.statusCode == 400) {
                    $("#offcanvasEditBook").offcanvas("hide");
                    $("#EditBook").removeAttr("disabled");
                    $("#errortoast").toast("show");
                    $("#errorMsg").html(response.msg);
                }
            }
        });
    });

    $("#mybook").on("click", ".deleteBook", function() {
        var id = $(this).val();
        var delete_image = $(this).closest("td").find(".delete_image").val();
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
        swalWithBootstrapButtons.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "./book_Code.php?action=deleteBook",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        id,
                        delete_image
                    },
                    success: function(response) {
                        if (response.statusCode == 200) {
                            fetchData();
                            swalWithBootstrapButtons.fire({
                                title: "Deleted!",
                                text: "Your file has been deleted.",
                                icon: "success"
                            });
                        } else {
                            Swal.fire({
                                icon: "error",
                                title: "Oops...",
                                text: "Something went wrong!"
                            });
                        }
                    }
                });

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            );
        });
    });

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