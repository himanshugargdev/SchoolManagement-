<?php echo '<link href="fee.css" rel="stylesheet">'; ?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    
    <title></title>

</head>
<body> 
<?php 
include "header.php"; 
?>
   <?php 
echo '<style>'; 
include "assets/css/fee.css"; 
echo '</style>'
?>

    <div class="student_fee">
        <div class="fee">
            <h2 style="display:flex;align-items:center;justify-content:center;
            padding: 20px;linear-gradient:">Fee Structure 2022-2023</h2><hr />
            <div class="fee_info">
                <div id="fee_menu">
                    <ul>
                        <li> Sr.No. </li>
                        <li> Class </li>
                        <li> Admission Fee </li>
                        <li> Annual Fee </li>
                        <li> Tution Fee Monthly </li>
                    </ul>
                </div>
                <hr />
                <div id="fee_value">
                    <ul>
                        <li>1</li>
                        <li>Pre. Nursery</li>
                    </ul>
                    <ul class="fee_format">
                        <li>2</li>
                        <li>LKG</li>
                    </ul>

                    <ul>
                        <li>3</li>
                        <li>UKG</li>
                    </ul>

                    <ul class="fee_format">
                        <li>4</li>
                        <li>1st</li>
                    </ul>

                    <ul>
                        <li>5</li>
                        <li>2nd</li>
                    </ul>

                    <ul class="fee_format">
                        <li>6</li>
                        <li>3rd</li>
                    </ul>

                    <ul>
                        <li>7</li>
                        <li>4th</li>
                    </ul>
                    <ul class="fee_format">
                        <li>8</li>
                        <li> 5th</li>
                    </ul>
                    <ul>
                        <li>9</li>
                        <li>6th</li>
                    </ul>
                    <ul class="fee_format">
                        <li>10</li>
                        <li>7th</li>
                    </ul>
                    <ul>
                        <li>11</li>
                        <li>8th</li>
                    </ul>
                    <ul class="fee_format">
                        <li>12</li>
                        <li>9th</li>
                    </ul>
                    <ul>
                        <li>13</li>
                        <li>10th</li>
                    </ul>
                </div>

            </div>
            <div class="fee_footer">
                     <?php 
                  include "footer.php"; 
                        ?>
              </div>
        </div>
        
    </div>

</body>
</html>
