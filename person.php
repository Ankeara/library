<?php
session_start();
if(isset($_SESSION["AdminEmail"]) && isset($_SESSION["UserName"])){
    include("./includes/header.php");
    include("./includes/navbar.php");
?>

<div class="container-fluid fixed-top">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasPerson" aria-labelledby="offcanvasNavbarLabel"
        style="width: 650px;">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Person CRUD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="card-body">
                <form method="post" id="insertPerson">
                    <div class="row">
                        <div class="col-4 mb-3">
                            <label class="form-label" for="person">Person name :</label>
                            <input type="text" class="form-control" id="person" name="person" placeholder="emaple" />
                        </div>
                        <div class="col-4 mb-3">
                            <label for="gender" class="form-label">Gender :</label>
                            <select id="gender" class="form-select" name="gender">
                                <option>Default select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-4 mb-3">
                            <label class="form-label" for="email">Email :</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="emaple" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-3">
                            <label class="form-label" for="phonenumber">Phonenumber :</label>
                            <input id="phonenumber" class="form-control" name="phonenumber" type="number" />
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
                    <button type="submit" id="savePerson" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid fixed-top">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditPerson" aria-labelledby="offcanvasNavbarLabel"
        style="width: 650px;">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Person Edit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="card-body">
                <form method="post" id="updateperson">
                    <div class="row">
                        <div class="col-4 mb-3">
                            <input type="hidden" name="id" id="id">
                            <label class="form-label" for="person">Person name :</label>
                            <input type="text" class="form-control" id="person" name="person" placeholder="emaple" />
                        </div>
                        <div class="col-4 mb-3">
                            <label for="gender" class="form-label">Gender :</label>
                            <select id="gender" class="form-select" name="gender">
                                <option>Default select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-4 mb-3">
                            <label class="form-label" for="email">Email :</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="emaple" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 mb-3">
                            <label class="form-label" for="phonenumber">Phonenumber :</label>
                            <input id="phonenumber" class="form-control" name="phonenumber" type="number" />
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
                    <button type="submit" id="updatePersonBtn" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Content wrapper -->
<div class="container-xxl flex-grow-1 container-p-y">
    <button class="btn btn-primary mt-2 mb-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasPerson"
        aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <i class="fa-solid fa-plus"></i> Person
    </button>
    <!-- category Profile -->
    <div class="row">

        <!-- Bordered Table -->
        <div class="cal-5">
            <table class="table table-striped w-100 " id="tblperson">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Person name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Phonenumber</th>
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
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
    let tblcategory = new DataTable("#tblperson");

    // Foreach value on database to page
    function fetchData() {
        $.ajax({
            url: './person_Code.php?action=fetchData',
            type: 'POST', // Corrected from Type to type
            dataType: 'JSON',
            success: function(response) {
                var data = response.data;
                tblcategory.clear().draw();
                $.each(data, function(index, value) {
                    tblcategory.row.add([
                        value.id,
                        value.FullName,
                        value.Gender,
                        value.EmailId,
                        value.MobileNumber,
                        value.Status,
                        '<Button type="button" class="btn btn-primary editPerson m-2" value="' +
                        value.id +
                        '"><i class="fa-solid fa-pencil"></i> Edit</Button>' +
                        '<Button type="button" class="btn btn-danger deletePerson m-2" value="' +
                        value.id +
                        '"><i class="fa-solid fa-trash"></i> Edit</Button>'
                    ]).draw(false);
                });
            }
        })
    }

    // Insert Value to database
    $("#insertPerson").on("submit", function(e) {
        $("#savePerson").attr("disabled", "disabled");
        e.preventDefault();
        $.ajax({
            url: './person_Code.php?action=insertData',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                var response = JSON.parse(response);
                if (response.statusCode == 200) {
                    $("#offcanvasPerson").offcanvas("hide");
                    $("#savePerson").removeAttr("disabled");
                    $("#insertPerson")[0].reset();
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
                    $("#offcanvasPerson").offcanvas("hide");
                    $("#savePerson").removeAttr("disabled");
                    $("#insertPerson")[0].reset();
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!"
                    });
                } else if (response.statusCode == 400) {
                    $("#offcanvasPerson").offcanvas("hide");
                    $("#savePerson").removeAttr("disabled");
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
    $("#tblperson").on("click", ".editPerson", function() {
        var id = $(this).val();
        $.ajax({
            url: "./person_Code.php?action=updateperson",
            type: "POST",
            dataType: "JSON",
            data: {
                id: id
            },
            success: function(response) {
                var data = response.data;
                $("#updateperson #id").val(data.id);
                $("#updateperson input[name='person']").val(data.FullName);
                $("#updateperson select[name='gender']").val(data.Gender);
                $("#updateperson input[name='email']").val(data.EmailId);
                $("#updateperson input[name='phonenumber']").val(data.MobileNumber);
                $("#updateperson select[name='status']").val(data.Status);
                $("#offcanvasEditPerson").offcanvas("show");
            }
        })
    });

    // update value to databse
    $("#updateperson").on("submit", function(e) {
        $("#updatePersonBtn").attr("disabled", "disabled");
        e.preventDefault();
        $.ajax({
            url: './person_Code.php?action=updateData',
            type: 'POST',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                var response = JSON.parse(response);
                if (response.statusCode == 200) {
                    $("#offcanvasPerson").offcanvas("hide");
                    $("#updatePersonbtn").removeAttr("disabled");
                    $("#updateperson")[0].reset();
                    $("#successtoast").toast("show");
                    $("#successMsg").html(response.msg);
                } else if (response.statusCode == 500) {
                    $("#offcanvasPerson").offcanvas("hide");
                    $("#updatePersonbtn").removeAttr("disabled");
                    $("#updateperson")[0].reset();
                    $("#errortoast").toast("show");
                    $("#errorMsg").html(response.msg);
                } else if (response.statusCode == 400) {
                    $("#offcanvasPerson").offcanvas("hide");
                    $("#updatePersonbtn").removeAttr("disabled");
                    $("#errortoast").toast("show");
                    $("#errorMsg").html(response.msg);
                }
            }
        });
    });

    // delete value on databse 
    $("#tblperson").on("click", ".deletePerson", function() {
        var id = $(this).val();
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
                    url: "./person_Code.php?action=deletePerson",
                    type: "POST",
                    dataType: "JSON",
                    data: {
                        id
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