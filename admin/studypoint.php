<?php
include "header.php";
$topic_title = $class_id = $subject_id = $topic_content = $topic = null;

if (isset($_POST['new']) || isset($_POST['update'])) {
  $topic_title = $_POST['topic_title'];
  $class_id = $_POST['cls'];
  $subject_id = $_POST['subj'];
  $topic_content = $_POST['topic_content'];
  // $isPaid = $_POST['isPaid'];
}


if (isset($_POST['new'])) {
  $sql = "INSERT INTO `topic`(  `class_id`, `subject_id`, `topic_title`, `topic_content` ) VALUES ( '$class_id','$subject_id','$topic_title','$topic_content' )";
  echo "<script>alert('$sql')</script>";
  if (!mysqli_query($conn, $sql)) {
    echo '<script>swal("Status!","Unable to Add New Topic.","error"); </script>';
  } else {
    $topic = mysqli_insert_id($conn);
    echo '<script>swal("Status!","New Topic Added.","success").then(function(){
        window.location="studypoint.php?topic=' . $topic . '";
      }); </script>';
  }
}

if (isset($_POST['update'])) {
  $topic = $_POST['topic'];
  $date = date("Y-m-d h:i:saY-m-d");
  $sql = "UPDATE `topic` SET  `class_id`='$class_id',`subject_id`='$subject_id',`topic_title`='$topic_title',`topic_content`='$topic_content',`update_at`='$date' WHERE topic_id=$topic";
  if (!mysqli_query($conn, $sql)) {
    echo '<script>swal("Status!","Unable to Update.","error"); </script>';
  } else {

    echo '<script>swal("Status!","Updated.","success"); </script>';
  }
}

if (isset($_GET['topic'])) {
  $topic = $_GET['topic'];
  $sql = "SELECT * FROM topic WHERE topic_id=$topic";
  $res = mysqli_query($conn, $sql);
  if (mysqli_num_rows($res) > 0) {
    $row_topic = mysqli_fetch_assoc($res);
    $topic_title = $row_topic['topic_title'];
    $class_id = $row_topic['class_id'];
    $subject_id = $row_topic['subject_id'];
    $topic_content = $row_topic['topic_content'];
  }

}


?>
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <!-- Navbar -->
  <?= include("navBar.php") ?>
  <!-- End Navbar -->
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div
              class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">Students Study Point</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">&nbsp; </p>
              <h4 class="mb-0">&nbsp;</h4>
            </div>
          </div>
          <hr class="primary horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">80%</span>Active Lessions/Topic</p>
          </div>
        </div>
      </div>
    </div>


    <div class="col-md-12 mb-lg-0 mb-4">
      <div class="card mt-4">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Add / Update Topic</h6>
            </div>
            <?php if (isset($topic)) { ?>

            <div class="col-6 text-end">
              <a class="btn bg-gradient-dark mb-0" href="studypoint.php"><i
                  class="material-icons text-sm"></i>New</a>
            </div>

            <?php } ?>
          </div>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div class="col-md-12 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg  ">
                <h6 class="mb-0">All Topic Details</h6>
                <div class="card card-body   card-plain border-radius-lg  "
                  style="overflow-y: scroll;min-height: 300px; max-height: 500px;">

                  <?php
                       $sql = "SELECT * FROM topic order by topic_id desc";
                       $sql = mysqli_query($conn, $sql);
                       if (mysqli_num_rows($sql) > 0) {
                         while ($row_topic = mysqli_fetch_assoc($sql)) {
                           $getClass = "SELECT * FROM `classes` WHERE id=" . $row_topic['class_id'];
                           $getClass = mysqli_query($conn, $getClass);
                           $getClass = mysqli_fetch_assoc($getClass);
                           $getSubject = "SELECT * FROM `subject` WHERE id=" . $row_topic['subject_id'];
                           $getSubject = mysqli_query($conn, $getSubject);
                           $getSubject = mysqli_fetch_assoc($getSubject);
                       ?>
                  <div class="col-md-12 mb-md-0 mb-4 event-item">
                    <p><b>Topic Id: </b><b style="float:right"><?= $row_topic['topic_id'] ?></b></p>
                    <p><b>Topic Title: </b><b style="float:right"><?= $row_topic['topic_title'] ?></b></p>
                    <p><b>Class: </b><b style="float:right"><?= $getClass['class_name']; ?></b></p>
                    <p><b>Subject: </b><b style="float:right"><?= $getSubject['subject_name']; ?></b></p>
                    <div class="col-12 text-end">
                      
                    <button type="button" class="btn bg-gradient-success mb-0" onclick="getTopic(<?= $row_topic['topic_id'] ?>)" data-bs-toggle="modal" data-bs-target="#myModal">Show</button>
                      <a class="btn bg-gradient-primary mb-0"
                        href="studypoint.php?topic=<?= $row_topic['topic_id'] ?>"><i
                          class="material-icons text-sm"></i>update</a>
                    </div>
                  </div>
                  <?php
                         }
                       }
                        ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          <div class="row">
            <div class="col-md-12 mb-md-0 mb-4">
              <div class="card card-body border card-plain border-radius-lg  ">
                <h6 class="mb-0">Topic</h6>
                <form method="post" enctype="multipart/form-data">
                  <div class="mb-3">
                    <label class="form-label">Topic Title</label>
                    <input type="text" name="topic_title" value="<?= $topic_title ?>" class="form-control form-control-lg"
                      placeholder="Title" required>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Select Class</label>
                    <select name="cls" class="form-control form-control-lg" onchange="getSubject(this)"  required>
                      <option value="">select</option>
                      <?php
                            $class_name = "";
                            $sql = "SELECT * FROM `classes` order by class_name";
                            $sql = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($sql)) {
                            ?>
                      <option value="<?= $row['id'] ?>" <?php if ($row['id'] == $class_id)
                                echo "selected  " ?>>
                        <?= $row['class_name'] ?></option>
                      <?php } ?>

                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Select Subject</label>
                    <select name="subj"  id="subj" class="form-control form-control-lg" required>
                      <option value="">select</option>
                      <?php
                            $subject_name = "";
                            $sql = "SELECT * FROM `subject` order by subject_name";
                            $sql = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($sql)) {
                              $cls_sql = "SELECT * from classes where id=" . $row['class_id'];
                              $cls_sql = mysqli_query($conn, $cls_sql);
                              $cls_row = mysqli_fetch_assoc($cls_sql);
                              $class_name = $cls_row['class_name'];
                            ?>
                      <option value="<?= $row['id'] ?>" <?php if ($row['id'] == $subject_id)
                                echo "selected  " ?>>
                        <?= $row['subject_name'] ?> (<?= $class_name ?>)</option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Topic Content</label>
                    <textarea name="topic_content" id="editor" style="width:100%;"
                      required> <?= $topic_content ?></textarea>
                  </div>

                  <!-- <div class="mb-3">
                          <label  class="form-label">Select Subject</label>
                          <select name="isPaid" class="form-control form-control-lg" required  >
                            <option value="" >select</option> 
                            <option value="NO" >NO</option> 
                            <option value="YES" >YES</option> 
                            </select>
                        </div>  -->
                  <div class="mb-3 text-end">
                    <?php if (isset($topic)) { ?>
                    <input type="number" style="display: none;" name="topic" value="<?= $topic ?>" />
                    <a class="btn bg-gradient-dark mb-0" href="studypoint.php"><i
                        class="material-icons text-sm"></i>refresh new</a>

                    <button name="update" class="btn bg-gradient-primary mb-0" href="javascript:;"><i
                        class="material-icons text-sm"></i>Update Topic</button>
                    <?php } else { ?>
                    <button name="new" class="btn bg-gradient-primary mb-0" href="javascript:;"><i
                        class="material-icons text-sm"></i>Add Topic</button>
                    <?php } ?>

                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>



<?php include "footer.php" ?>
<script src="../assets/js/plugins/ck.js"></script>


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" id="modal_content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">please wait...</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       please wait...
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>





<script>
 function getTopic(id) {
        
        if (id == "") {
            return;
        }
        var data = "getTopic=" + JSON.stringify({ id });
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) { 
                $("#modal_content").empty();
                $("#modal_content").append(xhttp.response);
            }
        };
        xhttp.open("POST", "../admin/ajex.php", true);
        xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhttp.send(data);
    }
  </script>













<script>
  // This sample still does not showcase all CKEditor 5 features (!)
  // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
  CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
    // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
    toolbar: {
      items: [
        'exportPDF', 'exportWord', '|',
        'findAndReplace', 'selectAll', '|',
        'heading', '|',
        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
        'bulletedList', 'numberedList', 'todoList', '|',
        'outdent', 'indent', '|',
        'undo', 'redo',
        '-',
        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
        'alignment', '|',
        'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
        'textPartLanguage', '|',
        'sourceEditing'
      ],
      shouldNotGroupWhenFull: true
    },
    // Changing the language of the interface requires loading the language file using the <script> tag.
    // language: 'es',
    list: {
      properties: {
        styles: true,
        startIndex: true,
        reversed: true
      }
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
    heading: {
      options: [
        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
        { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
        { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
        { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
        { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' }
      ]
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
    placeholder: 'Weleome To The Study Point',
    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
    fontFamily: {
      options: [
        'default',
        'Arial, Helvetica, sans-serif',
        'Courier New, Courier, monospace',
        'Georgia, serif',
        'Lucida Sans Unicode, Lucida Grande, sans-serif',
        'Tahoma, Geneva, sans-serif',
        'Times New Roman, Times, serif',
        'Trebuchet MS, Helvetica, sans-serif',
        'Verdana, Geneva, sans-serif'
      ],
      supportAllValues: true
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
    fontSize: {
      options: [10, 12, 14, 'default', 18, 20, 22],
      supportAllValues: true
    },
    // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
    // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
    htmlSupport: {
      allow: [
        {
          name: /.*/,
          attributes: true,
          classes: true,
          styles: true
        }
      ]
    },
    // Be careful with enabling previews
    // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
    htmlEmbed: {
      showPreviews: true
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
    link: {
      decorators: {
        addTargetToExternalLinks: true,
        defaultProtocol: 'https://',
        toggleDownloadable: {
          mode: 'manual',
          label: 'Downloadable',
          attributes: {
            download: 'file'
          }
        }
      }
    },
    // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
    mention: {
      feeds: [
        {
          marker: '@',
          feed: [
            '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
            '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
            '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
            '@sugar', '@sweet', '@topping', '@wafer'
          ],
          minimumCharacters: 1
        }
      ]
    },
    // The "super-build" contains more premium features that require additional configuration, disable them below.
    // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
    removePlugins: [
      // These two are commercial, but you can try them out without registering to a trial.
      // 'ExportPdf',
      // 'ExportWord',
      'CKBox',
      'CKFinder',
      'EasyImage',
      // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
      // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
      // Storing images as Base64 is usually a very bad idea.
      // Replace it on production website with other solutions:
      // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
      // 'Base64UploadAdapter',
      'RealTimeCollaborativeComments',
      'RealTimeCollaborativeTrackChanges',
      'RealTimeCollaborativeRevisionHistory',
      'PresenceList',
      'Comments',
      'TrackChanges',
      'TrackChangesData',
      'RevisionHistory',
      'Pagination',
      'WProofreader',
      // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
      // from a local file system (file://) - load this site via HTTP server if you enable MathType
      'MathType'
    ]
  });
</script>