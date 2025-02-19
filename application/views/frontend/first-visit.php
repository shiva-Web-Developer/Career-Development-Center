<style>
    #first-visit{display: none;}
</style>
<?php
     $slides = array(
        array('heading' => 'Career Development Center', 'img' => 'assets/img/CDC 1.jpeg','text'=>'Academic Intensive Unit Care.'),
        array('heading' => 'Career Development Center', 'img' => 'assets/img/CDC 2.jpeg','text'=>'Academic Intensive Unit Care.'),
        array('heading' => 'Career Development Center', 'img' => 'assets/img/CDC 3.jpeg','text'=>'Academic Intensive Unit Care.'),
        array('heading' => 'Career Development Center', 'img' => 'assets/img/CDC 4.jpeg','text'=>'Academic Intensive Unit Care.'),
        array('heading' => 'Career Development Center', 'img' => 'assets/img/CDC 5.jpeg','text'=>'Academic Intensive Unit Care.'),

        // array('heading' => 'Did you know?', 'img' => 'assets/img/4.jpg','text'=>' Timely diagnosis can help prevent complications and reduce the risk of long-term health issues associated with certain diseases.'),
        // array('heading' => 'Health Fact:', 'img' => 'assets/img/5.jpg','text'=>' Many diseases show minimal or no symptoms in the early stages. Regular screenings and check-ups are vital for timely diagnosis and prevention.'),
        // array('heading' => 'Stay one step ahead! ', 'img' => 'assets/img/6.jpg','text'=>'Early diagnosis acts as a powerful tool in preventing disease progression and minimizing health risks.'),
        // array('heading' => 'Did you know? ', 'img' => 'assets/img/7.jpg','text'=>'Early diagnosis not only saves lives but also reduces healthcare costs by preventing complications and advanced-stage treatments.'),
        // array('heading' => 'Knowledge is your shield! ', 'img' => 'assets/img/8.jpg','text'=>'Being proactive with screenings and early diagnosis empowers you to take control of your health and well-being.'),
        // array('heading' => 'Stay vigilant, stay healthy! ', 'img' => 'assets/img/9.jpg','text'=>'Regular health screenings and prompt diagnosis play a crucial role in maintaining overall well-being.'),
         );
    $noq = sizeof($slides);
    $indexes = array_rand($slides, $noq);
  
?>
<section id="first-visit">
    <?php
        $i = 0;
        foreach($indexes as $indx){
            $active1 = $active2 = $active3 = "";
            if($i == 0){
                $active1 = "active";
            }elseif($i == 1){
                $active2 = "active";
            }elseif($i == 2){
                $active3 = "active";
            }
            ?>
            <div class="slide-<?= $i; ?> slide">
                <div class="image">
                    <img src="<?= base_url().$slides[$indx]['img'] ?>">
                </div>
                <div class="heading-container">
                    <h1 class="heading"><?= $slides[$indx]['heading'] ?></h1>
                </div>
                <p class="desc text-justify">
                    <?= $slides[$indx]['text'] ?>
                </p>
                <div class="dot-container">
                    <div class="dott <?//= $active1 ?>"></div>
                    <div class="dott <?//= $active2 ?>"></div>
                    <div class="dott <?//= $active3 ?>"></div>
                </div>
            </div>
            <?php
            $i++;
        }
    ?>
    <div class="controller flex space-between my-2">
        <button class="btn" onclick="$('#first-visit').fadeOut()">Skip</button>
        <button class="btn" onclick="firstVisit('next')">Next</button>
    </div>
</section>