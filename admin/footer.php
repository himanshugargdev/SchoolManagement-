

<!--   Core JS Files   -->
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4="
  crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.13.1/datatables.min.js"></script>


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


  function getSubject(event) {
        var cls = event.value;
        if (cls == "") {
            return;
        }
        var data = "getSubject=" + JSON.stringify({ cls });
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                var data = JSON.parse(xhttp.response);
                $("#subj").empty();
                $("#subj").append(`<option value=''>select</option>`)
                for (key in data) {
                    $("#subj").append(`<option value='${data[key].id}'>${data[key].subject_name}</option>`)
                }
            }
        };
        xhttp.open("POST", "../admin/ajex.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send(data);
    }

</script>
</body>

</html>