<?php
session_start();
if(isset($_SESSION["AdminEmail"]) && isset($_SESSION["UserName"])){
include("./includes/header.php");
include("./includes/navbar.php");
?>

<div class="col-sm-12 col-xl-6">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Pills Navs & Tabs</h6>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">Account</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                    type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-light rounded h-100 p-4">
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                                readonly value="<?php echo $_SESSION['AdminEmail']; ?>">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                readonly value="<?php echo $_SESSION['Password']; ?>">
                            <label for="floatingPassword">User name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                                readonly value="<?php echo $_SESSION['UserName']; ?>">
                            <label for="floatingInput">Password</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                Invidunt rebum voluptua lorem eirmod dolore. Amet no sed sanctus lorem ea. Nonumy sit stet sit magna.
                Rebum rebum ipsum clita erat consetetur, sit dolor sit clita et amet. Est et clita dolore takimata, sea
                dolores tempor erat consetetur lorem. Consetetur sea sadipscing dolor et dolores et stet, tempor elitr.
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                Et diam et est sed vero ipsum voluptua dolor et, sit eos justo ipsum no ipsum amet sed aliquyam dolore,
                ut ipsum sanctus et consetetur. Sit ea sit clita lorem ea gubergren. Et dolore vero sanctus voluptua
                ipsum sadipscing amet at. Et sed dolore voluptua dolor eos tempor, erat amet.
            </div>
        </div>
    </div>
</div>

<?php
include("./includes/footer.php");
}else{
    header("Location: ./404.php");
}
?>