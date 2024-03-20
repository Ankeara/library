   <!-- Footer Start -->
   <div class="container-fluid pt-4 px-4">
       <div class="bg-light rounded-top p-4">
           <div class="row">
               <div class="col-12 col-sm-6 text-center text-sm-start">
                   &copy; <a href="#">Your Site Name</a>, All Right Reserved.
               </div>
               <div class="col-12 col-sm-6 text-center text-sm-end">
                   <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
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

   <!-- Template Javascript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
       integrity="sha512-qFOQ9YFAeGj1gDOuUD61g3D+tLDv3u1ECYWqT82WQoaWrOhAY+5mRMTTVsQdWutbA5FORCnkEPEgU0OF8IzGvA=="
       crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script src="js/main.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
   <script>
$(document).ready(function() {
    // Preview image before insert 
    $("input.image").change(function() {
        var file = this.files[0];
        var url = URL.createObjectURL(file);
        $(this).closest(".row").find(".preview-img").attr("src", url);
    })

    // Insert Value to database
    $("#saveAuthor").click(function() {
        var eThis = $(this);
        var formAuthor = eThis.closest("form.insertForm");
        var formData = new FormData(formAuthor[0]);
        $.ajax({
            url: 'author_Code.php',
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            dataType: 'json',
            beforeSend: function() {

            },
            success: function(data) {

            }
        });
    })
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