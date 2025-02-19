<?php
    $footer = array(
        array('text'=>'Home', 'page'=>'index', 'class' => 'fa fa-home-lg'),
        array('text'=>'Play & Earn', 'page'=>'load-games', 'class' => 'fa fa-money-check-alt'),
        array('text'=>'Refer & Earn', 'page'=>'refer-earn', 'class' => 'fa fa-link'),
        array('text'=>'Road Map', 'page'=>'road-map', 'class' => 'fa fa-road'),
        array('text'=>'PA Test','page'=>'Test','class'=>'fa fa-tachometer'),
        array('text'=>'Profile', 'page'=>'profile', 'class' => 'fa fa-user')
    );
?>

<footer >
    <div class="flex space-between" style="padding-bottom:15px;">
        <?php
        foreach($footer as $row){
            if($row['page'] == $page){
                $active = 'active';
            }else{
                $active = "";
            }
            if($row['page'] == 'index'){$row['page'] = '';}
            ?>
            <div class="flex flex-column flex-item-center">
                <a style="" href="<?= base_url().$row['page'] ?>" class="<?= $active; ?>"><i class="<?= $row['class'] ?>"></i></a>
                <span><?= $row['text'] ?></span>
            </div>
            <?php
        }
        ?>
    </div>
</footer>


