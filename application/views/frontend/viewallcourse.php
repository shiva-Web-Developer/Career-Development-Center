<style>
    #home-header {
        /* background: radial-gradient(var(--primary-color), var(--secondary-color));
        background-image: url('<? //= base_url() 
                                ?>assets/img/profilebg.jpg');     */
        background-size: cover;
        background-position: bottom;
        padding: 2rem 1.6rem;
        padding-bottom: 0rem;
        border-radius: 0 0 70px 70px;
    }

    .profile-dp img {
        width: 70px;
        border-radius: 50%;
    }

    #home-search {
        width: 100%;
        margin-top: 0.6rem;
    }

    #home_search {
        width: 97%;
        padding: 0.6rem 0.8rem;
        border-radius: 30px;
        border: 0;
        box-shadow: 0 0 6px grey;
        outline: 0;
    }

    #bmi-icon {
        border-radius: 50%;
        box-shadow: 0 0 6px var(--primary-color);
        height: 120px;
        width: 120px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background: white;
    }

    #bmi-icon img {
        width: 60px;
        height: auto;
    }

    #bmi-icon span {
        text-align: center;
        line-height: 1.2;
    }

    #myInput {
        background-image: url('/css/searchicon.png');
        background-position: 10px 12px;
        background-repeat: no-repeat;
        width: 100%;
        font-size: 16px;
        padding: 12px 20px 12px 40px;
        border: 1px solid #ddd;
        margin-bottom: 12px;
    }

    #myUL {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: none;
    }

    #myUL li a {
        border: 1px solid #ddd;
        margin-top: 1px;
        /* Prevent double borders */
        background-color: #f6f6f6;
        padding: 10px;
        text-decoration: none;
        font-size: 14px;
        color: black;
        display: block;
        width: 321px;
    }

    .col-sm-6 {
        position: relative;
        width: 48%;
        min-height: 1px;
        padding-right: 3px;
        padding-left: 17px;
    }

    .disease-card {
        width: 90%;
        box-sizing: border-box;
    }

    .disease-card div {
        padding: 1rem;
        background: white;
        box-shadow: 0 0 4px grey;
        margin: 0.4rem;
        border-radius: 8px;
    }

    .disease-card div>h6 {
        text-align: center;
        font-weight: 900;
        font-size: 1rem;
        color: var(--text-color);
        height: 20px;
    }

    .disease-card div>a {
        padding: 0.2rem 0.4rem;
        border-radius: 4px;
        font-size: 0.8rem;
        width: fit-content;
        max-width: 68px;
    }

    #myUL li a:hover:not(.header) {
        background-color: #eee;
    }

    h6 {
    line-height: 1.2em;
    height: 2.6em;
    overflow: hidden;
}

    .card-title {
        margin: 0.75rem 0;
        /*min-height: 70px;*/
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #course_img {
        height: auto;
        background-color: white;
    }
</style>
<main>
    <?php $this->load->view('frontend/first-visit'); ?>
    <section id="home-header">
        <div class="flex flex-row space-between flex-column">
            <div class="">
                <svg class="svg-inline--fa fa-arrow-left" onclick="location.href = 'welcome'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path>
                </svg>
            </div>
            <div class="flex flex-row space-around">
                <div class="flex flex-column flex-content-center">
                    <div id="bmi-icon">
                        <img src="<?php echo base_url() ?>assets/icon/books.png">
                        <span>Our<br> Courses</span>
                    </div>

                </div>
            </div>
        </div>
        <div>
            <?= form_open('testdiscreption') ?>
            <div class="form-group">
                <div class="input-group mt-4 flex-content-center">

                    <input type="text" name="home-search" placeholder="Search Course here" id="home_search" onkeyup="myFunction()" title="Search here" autocomplete="off" required>
                    <button type"submit" class="btn btn-block btn-primary col-4 my-2" style="display:none" id="ser">Search</button>


                    <ul id="myUL">
                        <?php
                        foreach ($test as $row) {
                        ?>
                            <li><a href="javascript:void(0)" onclick="searchtest('<?php echo $row['test_name'] ?>')"><?php echo $row['test_name'] ?></a></li>
                        <?php
                        }
                        ?>


                    </ul>
                </div>
            </div>
        </div>
        <?= form_close(); ?>
        </div>
    </section>


    <?php
    $user_id = $_SESSION['UID'];

    $sql2 = "SELECT * FROM `enroll_course` WHERE user_id = $user_id";
    $sql_res = $this->Admin_model->getAllData($sql2);
    if ($sql_res) {
        $course_ids = array();
        foreach ($sql_res as $row) {
            $course_ids[] = $row['course_id'];
        }
    } else {
        $course_ids = array();
    }

    ?>

    <div class="flex flex-wrap space-around pre" style="align-items:stretch;">
        <?php
        foreach ($viewtest as $row) { ?>
            <div class="disease-card pt-1 flex">
                <div class="flex flex-column item-center" >
                    <img class="card-img-top pt-2" src="<?php echo base_url() ?>assets/img/uploads/<?php echo $row['image'] ?>" id="course_img" alt="image">
                    <h6 class="card-title p-1" style="font-size:13px; margin-bottom: .5rem !importent;"><?php echo $row['test_name']; ?></h6>
                    
                    <a href="<?php echo base_url() ?>viewtestdiscreption?name=<?php echo $row['id']; ?>" class="btn btn-primary mt-1 text-light">View</a>

                    <?php
                    if (in_array($row['id'], $course_ids)) {
                        echo '<span style="color:#732626;font-size:10px;">Already Enrolled</span>';
                    }
                    ?>

                </div>
            </div>
        <?php
        } ?>
    </div>


    <br>
    <div class="flex flex-wrap space-around flex-item-center cat" style="display:none">


    </div>
</main>
<script>
    function myFunction() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("home_search");
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";

                $('#myUL').show();

            } else {
                li[i].style.display = "none";

            }
        }
        if (filter == '') {
            $('#myUL').hide();
            $('.pre').show();
            $('.cat').hide();
        }

    }

    function searchtest(name) {
        $('#home_search').val(name);
        $('#myUL').hide();
        $.ajax({
            url: base_url + "getTestName",
            type: 'POST',
            dataType: 'JSON',
            data: {
                name: name,
                csrf_token: csrf_value
            },
            success: function(data) {
                $('.cat').html('<div class="disease-card pt-1"><div class="flex flex-column item-center"><img class="card-img-top pt-2" src="<?php echo base_url() ?>assets/img/uploads/' + data.img + '" alt="image"><h6 class="card-title">' + data.name + '</h6><a href="<?php base_url() ?>viewtestdiscreption?name=' + data.id + '"  class="btn btn-primary mt-1 text-light">View</a></div></div>');
                $('.cat').show();
                $('.pre').hide();
            }


        });
    }
</script>