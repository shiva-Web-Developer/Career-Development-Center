<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="theme-color" content="#309c3e" />

    <link rel="manifest" href="<?= base_url('assets/manifest.json') ?>">

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/icon/icon.png') ?>">
    <title><?= $title ?></title>
    <?php $this->load->view('frontend/common/css.php'); ?>
    <script type="text/javascript">
        var csrf_value = '<?= $this->security->get_csrf_hash(); ?>';
        var csrf_token = '<?= $this->security->get_csrf_token_name(); ?>';
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2PR20MVKHC"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-2PR20MVKHC');
    </script>
</head>
<body>
    <?php $this->load->view('frontend/common/header.php'); ?>
    <?= $content ?>
    
    <?php 
        $exception = array('login','signup');
        if(!in_array($page,$exception)){
            $this->load->view('frontend/common/footer.php'); 
        } 
    ?>
</body>
    <?php
        $this->load->view('frontend/common/js.php'); 
    ?>
</html>