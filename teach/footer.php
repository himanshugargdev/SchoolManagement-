<footer class="footer py-4  ">
  <div class="container-fluid">
    <div class="row justify-content-center justify-content-lg-end">

      <div class="col-lg-6">
        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
          <li class="nav-item">
            <a href="https://https://crsu.ac.in/" class="nav-link text-muted" target="_blank">CRSU</a>
          </li>
          <li class="nav-item">
            <a href="https://https://crsu.ac.in/" class="nav-link text-muted" target="_blank">CRSU</a>
          </li>
          <li class="nav-item">
            <a href="https://https://crsu.ac.in/" class="nav-link text-muted" target="_blank">CRSU</a>
          </li>
          <li class="nav-item">
            <a href="https://https://crsu.ac.in/" class="nav-link pe-0 text-muted" target="_blank">CRSU</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>

<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>


<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
      damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }



  $(document).ready(function () {
    $(".d-tbl").DataTable();
  });
</script>
</body>


</html>