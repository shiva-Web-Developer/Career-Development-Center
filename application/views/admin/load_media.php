<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidebar');?>
<style>
    .gallery{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        align-content: space-around;
    }
    .gallery>div{
        width: 240px;
        padding: 1rem;
        margin: 1rem;
        border: 1px solid;
        border-radius: 8px;
        
    }
    .gallery div>img{
        width: 100%;
        height: auto;
    }
</style>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Media Gallery</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Media Gallery</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card card-primary">   
                
                <div class="gallery">
                    <?php
                    // Directory containing the images
                    $directory = 'images/';
            
                    // Get all files with specific extensions (in this case, images)
                    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');
                    $files = scandir($directory);
                    $fileDetails = array();
                    
                    foreach ($files as $file) {
                        $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                        if (in_array(strtolower($file_extension), $allowed_extensions)) {
                            // Get the file's last modification time
                            $filePath = $directory . $file;
                            $modificationTime = filemtime($filePath);
            
                            // Store file details with modification time in an array
                            $fileDetails[$filePath] = $modificationTime;
                        }
                    }
        
                    arsort($fileDetails);
                    
                    foreach ($fileDetails as $filePath => $modificationTime) {
                        $file_extension = pathinfo($file, PATHINFO_EXTENSION);
                        if (in_array(strtolower($file_extension), $allowed_extensions)) {
                            // Display the images
                            echo '<div>
                                <img src="' . base_url($filePath) . '" alt="' . basename($filePath) . '">
                                <div>
                                    <button onclick="copyToClipboard(\'' . base_url($filePath) . '\')">Copy Link</button>
                                </div>
                            </div>';
                        }
                    }
                    ?>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <script>
        function copyToClipboard(text) {
            const el = document.createElement('textarea');
            el.value = text;
            document.body.appendChild(el);
            el.select();
            document.execCommand('copy');
            document.body.removeChild(el);
            alert('Image link copied to clipboard: ' + text);
        }
    </script>