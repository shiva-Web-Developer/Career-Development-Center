<style>
    #home-header{
        /* background: radial-gradient(var(--primary-color), var(--secondary-color));
        background-image: url('<?= base_url() ?>assets/img/profilebg.jpg');     */
        background-size: cover;
        background-position: bottom;
        padding: 1rem 1.6rem;
        padding-bottom: 0rem;
        border-radius: 0 0 70px 70px;
    }
    .profile-dp img{
        width: 70px;
        border-radius: 50%;
    }
    #ci_info{
        margin-left: 7rem;
    }
    #ci_info p{
        margin: 0;
        font-size: 24px;
    }
    #home-search{
        width: 100%;
        margin-top: 0.6rem;
    }
    #bmi-icon{
    border-radius: 50%;
    box-shadow: 0 0 4px black;
    height: 120px;
    width: 120px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    background: white;
}
#bmi-icon img{
    width: 60px;
    height: auto;
}
#bmi-icon span{
    text-align: center;
    line-height: 1.2;
}
</style>
<main style="overflow: hidden;">
    <?php $this->load->view('frontend/first-visit'); ?>
    <section id="home-header">
    <div class="flex flex-row space-between flex-column">
            <div class="">
                <svg class="svg-inline--fa fa-arrow-left" onclick="location.href = 'welcome'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path>
                </svg>
            </div>
            <div class="flex flex-row">
                <div class="flex flex-column flex-content-center" id="ci_info">
                <div id="bmi-icon">     
                    <img src="<?php echo base_url()?>assets/icon/service4.png">
                    <span>Nearby Labs</span>
                </div>
                   
                </div>
            </div>
        </div>
        
    </section>
</br>
<?php
    $indianStates = array(
    array('state' => 'Arunachal Pradesh'),
    array('state' => 'Assam'),
    array('state' => 'Bihar'),
    array('state' => 'Chhattisgarh'),
    array('state' => 'Goa'),
    array('state' => 'Gujarat'),
    array('state' => 'Haryana'),
    array('state' => 'Himachal Pradesh'),
    array('state' => 'Jammu and Kashmir'),
    array('state' => 'Jharkhand'),
    array('state' => 'Karnataka'),
    array('state' => 'Madhya Pradesh'),
    array('state' => 'Maharashtra'),
    array('state' => 'Manipur'),
    array('state' => 'Kerala'),
    array('state' => 'Meghalaya'),
    array('state' => 'Mizoram'),
    array('state' => 'Nagaland'),
    array('state' => 'Odisha'),
    array('state' => 'Punjab'),
    array('state' => 'Rajasthan'),
    array('state' => 'Sikkim'),
    array('state' => 'Tamil Nadu'),
    array('state' => 'Telangana'),
    array('state' => 'Tripura'),
    array('state' => 'Uttar Pradesh'),
    array('state' => 'Uttarakhand'),
    array('state' => 'West Bengal'),
    array('state' => 'Andaman and Nicobar Islands'),
    array('state' => 'Chandigarh'),
    array('state' => 'Dadra and Nagar Haveli'),
    array('state' => 'Daman and Diu'),
    array('state' => 'Lakshadweep'),
    array('state' => 'National Capital Territory of Delhi'),
    array('state' => 'Puducherry'),
);
?>
    <form>
        <div class="form-row">
                <div class="col">
                    <datalist id="suggestions">
                            <?php
                            foreach($indianStates as $row){
                                ?>
                                <option value="<?= $row['state']?>"><?= $row['state']?></option>
                                <?php
                            }
                            ?>
                    </datalist>
                <input  autoComplete="on" list="suggestions"class="form-control" autocomplete="off" placeholder="Enter a Location"/> 
                </div>
                    <div class="col">
                        <select name="" id="" class="form-control" style="height: 39px;">
                                <option value="10">10 KM</option>
                                <option value="20">20 KM</option>
                                <option value="30">30 KM</option>
                                <option value="40">40 KM</option>
                                <option value="50">50 KM</option>
                        </select>
                     </div>
        
    </div>
    <br>
    <button type="button" class="btn btn-primary btn-block" style="width: 101px;margin-left: 136px;">Search</button>
    <br>
        <div class="form-row">
            <div class="col-12">
                    <div class="card text-white  mb-3" style="max-width:27rem;">
                <div class="card-header bg-primary"><span style="font-size: 13px;">Number Of Test Centers:</span></div>
                <div class="card-body">
                
                </div>
                </div>
            </div>
            <div class="col-12" style="max-width:27rem;">
            <iframe src="" height="200" width="100%" title="Iframe Example"></iframe>
            </div>
            
        </div>
        
</form>
        
</main>
<script>

</script>