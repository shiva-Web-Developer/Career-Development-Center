<style>
    #home-header{
        background: radial-gradient(var(--primary-color), var(--secondary-color));
        background-image: url('<?= base_url() ?>assets/img/profilebg.jpg');    
        background-size: cover;
        background-position: bottom;
        padding: 2rem 1.6rem;
        padding-bottom: 3rem;
        border-radius: 0 0 70px 70px;
    }
    .profile-dp img{
        width: 70px;
        border-radius: 50%;
    }
    #ci_info{
        margin-left: 1rem;
    }
    #ci_info p{
        margin: 0;
    }
    #home-search{
        width: 100%;
        margin-top: 0.6rem;
    }
    #home_search{
        width: 97%;
        padding: 0.6rem 0.8rem;
        border-radius: 30px;
        border: 0;
        box-shadow: 0 0 6px grey;
        outline: 0;
    }
    #services{
        /* background: white; */
    border-radius: 17px;
    margin-top: -27px;
    padding: 0.6rem;
    box-shadow: 0px 4px 12px 1px grey;
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
    background-color: white;
}
#bmi-icon img{
    width: 76px;
    height: auto;
}
#bmi-icon span{
    text-align: center;
    line-height: 1.2;
}
.table-bordered thead th {
    border-bottom-width: 1px!important;
}
.table thead th {
    
    border-bottom: 1px solid #17191a!important;
}
.table-bordered td,.table-bordered th {
    border: 1px solid #1d1e1f!important;
}
th
{
    -webkit-text-stroke: thin;
}
</style>
<main>
    <?php $this->load->view('frontend/first-visit'); ?>
  
    <section class="main-container">
    <div class="flex flex-content-center my-3">
                <div id="bmi-icon">     
                    <img src="<?php echo base_url()?>assets/icon/symptoms.png">
                    <span>Symptoms</span>
                </div>
               
             </div>
             <form id="home-search">
                <div class="form-group">
                    <div class="input-group mt-4 flex-content-center">
                           
                            <select name="home-search" id="home_search">
                             <option value="">Type your symptoms here</option>   
                              <option value=""></option>

                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                <a href="javascript:void(0)" class="btn btn-primary btn-block" >&CirclePlus; Add more symptoms </a>
                </div>
                </form>
     
        
    </section>
</main>