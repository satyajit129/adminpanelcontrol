<footer class="main-footer">
  <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.5
  </div>
</footer>
</div>

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap JavaScript (jQuery and Popper.js are required dependencies) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"></script>
<!-- ChartJS -->
<script src="assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/dist/js/demo.js"></script>
<!-- table -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#datatable').DataTable({
      searching: true,
      "paging": true,
    });
  });
</script>

<script>
  $(document).ready(function () {
    $('#category-dropdown').on('change', function () {
      var category_id = this.value;
      console.log(category_id);
      $.ajax({
        url: "subcategorydrop.php",
        type: "POST",
        data: {
          category_id: category_id
        },
        cache: false,
        success: function (result) {
          console.log(result);
          $("#sub-category-dropdown").html(result);
        }
      });
    });
  });
</script>

<script>
  $(document).ready(function () {
    $('#category-dropdown-post').on('change', function () {
      var category_id = this.value;
      console.log(category_id);
      $.ajax({
        url: "subcategorydroppost.php",
        type: "POST",
        data: {
          category_id: category_id
        },
        cache: false,
        success: function (result) {
          console.log(result);
          $("#sub-category-dropdown-post").html(result);
        }
      });
    });
  });
</script>
<!-- Summernote JS - CDN Link -->
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
  $('#summernote').summernote({
    placeholder: 'Type Your Discription here ',
    tabsize: 2,
    height: 150
  });
</script>
<!-- //Summernote JS - CDN Link -->

<!-- multiple option selection cdn using select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  $(document).ready(function () {
    $('.js-example-basic-multiple').select2();
  });
</script>
<!-- multiple option selection cdn using select2 -->


<script>
  document.addEventListener("DOMContentLoaded", function () {
    const categoryButtons = document.querySelectorAll(".category-list .btn");

    categoryButtons.forEach(button => {
      button.addEventListener("mouseover", function () {
        const categoryId = this.dataset.categoryId; // Assuming you add data-category-id attribute to your button
        loadSubcategories(categoryId);
      });
    });

    // Function to load and display subcategories
    function loadSubcategories(categoryId) {
      const subcategoryList = document.querySelector(".subcategory-list");

      // You might use AJAX here to fetch subcategories for the given category
      // and populate the subcategoryList with the fetched data

      // For demonstration, let's assume subcategories is an array of subcategory names
      const subcategories = ["Subcategory 1", "Subcategory 2", "Subcategory 3"];

      subcategoryList.innerHTML = ""; // Clear previous content

      subcategories.forEach(subcategory => {
        const subcategoryItem = document.createElement("div");
        subcategoryItem.textContent = subcategory;
        subcategoryList.appendChild(subcategoryItem);
      });

      // Display the subcategory list
      subcategoryList.style.display = "block";
    }
  });

</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['status'])) {
    ?>
    <script>
        swal({
            title: "<?= $_SESSION['status'];?>",
            // text: "You clicked the button!",
            icon: "<?= $_SESSION['status_code'];?>",
            button: "CLILCK",
        });
    </script>
    <?php 
        unset($_SESSION['status']);
    }
?>
</body>

</html>