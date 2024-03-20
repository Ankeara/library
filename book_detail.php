<?php
session_start();
if(isset($_SESSION["AdminEmail"]) && isset($_SESSION["UserName"])){
    include("./includes/header.php");
    include("./includes/navbar.php");

    ?>

<?php 
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $books = getBookDetail($id);
        foreach ($books as $book) {
            ?>
<div class="row">
    <div class="card mb-4">
        <h5 class="card-header">Book Details</h5>
        <!-- Account -->
        <form id="formAccountSettings" method="POST" onsubmit="return false">
            <div class="card-body">
                <div class="d-flex align-items-start align-items-sm-center gap-4">
                    <img src="./uploads/books/<?= $book['BookImg'] ?>" alt="user-avatar" class="d-block rounded"
                        height="100" width="100" id="uploadedAvatar" />
                    <div class="button-wrapper">
                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <input type="file" id="upload" class="account-file-input" hidden
                                accept="image/png, image/jpeg" />
                        </label>
                        <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                        </button>
                        <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                    </div>
                </div>
            </div>
            <hr class="my-0" />
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="firstName" class="form-label">Book Name</label>
                        <input class="form-control" type="text" id="book" name="book" value="<?= $book['BookName'] ?>"
                            autofocus />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="lastName" class="form-label">Author Name</label>
                        <input class="form-control" type="text" name="author" id="author"
                            value="<?= $book['author_name'] ?>" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="email" class="form-label">Category</label>
                        <input class="form-control" type="text" id="category" name="category"
                            value="<?= $book['CategoryName'] ?>" placeholder="category" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="organization" class="form-label">ISBNNumber</label>
                        <input type="text" class="form-control" id="ISBNNumber" name="ISBNNumber"
                            value="<?= $book['ISBNNumber'] ?>" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="organization" class="form-label">Amount</label>
                        <input type="text" class="form-control" id="Amount" name="Amount"
                            value="<?= $book['Amount'] ?>" />
                    </div>
                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="country">status</label>
                        <select id="status" name="status" class="select2 form-select">
                            <option value="<?= $book['status'] ?>"><?= $book['status'] ?></option>
                        </select>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                    <button type="reset" class="btn cancel-btn btn-outline-secondary">Cancel</button>
                </div>
            </div>
        </form>
        <!-- /Account -->
    </div>
</div>
<?php } } ?>


<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                &copy; <a href="#">Your Site Name</a>, All Right Reserved.
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">
                <!--/*** This template is free as long as you keep the footer category’s credit link/attribution link/backlink. If you'd like to use the template without the footer category’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                Designed By <a href="#">Library Manage</a>
                </br>
                Distributed By <a class="border-bottom">Library Manage</a>
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
    $('.account-image-reset').click(function() {
        // Reset the image source
        $('#uploadedAvatar').attr('src', './img/user (3).png');
    });

    $('.cancel-btn').click(function() {
        // Reset all input fields within the form to null or empty string
        $('#formAccountSettings input[type="text"]').val('');
        $('#formAccountSettings select').val('');
    });
});
</script>
</body>

</html>
<?php
}else{
    header("Location: ./index.php");
}
?>