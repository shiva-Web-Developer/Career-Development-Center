
<style>
    .clock{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        /* margin-top: 20px; */
    }
    .clock>span{
        font-size: 1.5rem;
    }
    
    .main-container{
        background-image: url('<?= base_url() ?>assets/img/quiz-bg.png');
        height: 100%;
        background-size: cover;
        background-blend-mode: color-dodge;
       
    }
    
    #ques>p{
        text-align: center;
        padding: 0 1.4rem;
        font-size: 20px!important;
    }
    #ans{
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }
    #ans button{
        width: 38%;
        margin: 18px 6%;
          background: white;
        color: black;
        border: 0;
        outline: 0;
        font-size: 0.8rem;
        font-weight: 600;
        padding: 8px 2px;
        box-shadow: 0 0 5px 1px grey;
        border-radius: 20px;
    }
    #myCanvas{
        border: 2px solid #43ccf7;
        border-radius: 50%;
    }
    #ques-container, #quizz-result{
        display: none;
    }
    .ans-btn.active{
        background: #4caf50 !important;
        color: white;
    }
    .container {
	font-family: "Poppins", sans-serif;
	min-width: 100vw;
	min-height:2vh;
	display: flex;
	justify-content: center;
	align-items: center;
	padding: 0 0 2rem 0;
}

.button {
	position: relative;
	font-family: inherit;
	transition: all 0.1s ease-in;
	display: flex;
	gap: 0.65rem;
	cursor: pointer;
	border-radius: 3rem;
	padding: 0.6rem 2rem;;
	background-color: #29a329;
	color: #fff;
	border: none;
	align-items: center;
	font-size: 1.8rem;
	font-weight: 600;
	justify-content: center;
}

.button:hover {
	background-color: #2e77f2;
}

.button:has(input:checked) {
	background-color: #2e77f2;
}

.button:active {
	transform: translateY(0.2rem);
}

.arrow {
	position: relative;
	transition: all 0.4s ease-in-out;
	cursor: pointer;
	width: 0;
	height: 0;
	border-top: 0.8rem solid transparent;
	border-bottom: 0.8rem solid transparent;
	border-left: 1rem solid #fff;
}

    .arrow::after {
        transition: transform 0.4s ease-in-out;
        content: "";
        position: absolute;
        background-color: transparent;
        width: 1.5rem;
        height: 2rem;
        top: -1rem;
    }

    .arrow::before {
        transition: all 0.3s ease-out;
        content: "";
        position: absolute;
        background-color: transparent;
        width: 1rem;
        height: 1.6rem;
        top: -0.8rem;
    }

    .label {
        cursor: pointer;
    }

    .visually-hidden {
        cursor: pointer;
        position: absolute;
        opacity: 0;
    }

    .button:has(input:checked) > .arrow::before {
        transform: translateX(-1rem);
        background: rgb(255, 255, 255);
        background: linear-gradient(
            90deg,
            rgba(255, 255, 255, 1) 30%,
            rgba(46, 119, 242, 1) 30%,
            rgba(46, 119, 242, 1) 70%,
            rgba(255, 255, 255, 1) 70%
        );
    }

    @keyframes back {
        0% {
            transform: translateX(0rem);
        }
        20% {
            transform: translateX(-0.8rem);
        }
        100% {
            transform: translateX(0rem);
        }
    }
    @keyframes slide {
        0% {
            transform: translateX(-1rem);
        }
        to {
            transform: translateX(0rem);
        }
    }
    .move {
        animation-name: slide;
        animation-duration: 0.3s;
    }
    .back {
        animation-name: back;
        animation-duration: 0.4s;
    }
    .content{
        display: flex;
        align-items: center;
        padding: 2rem;
        flex-direction: column;
    }
    .scale-container{
        margin: 1rem 0;
    }
    :root{
        --scale-color: rgb(0 0 0 / 82%);
    }
    #scale{
        width:200px;
        height: 15px;
        display: flex;
        box-sizing: border-box;
        background: linear-gradient(90deg, red 0%, yellow 40%, green 100%);
        color: var(--primary-color);
    }
    #scale .first, #scale .second, #scale .third, #scale .fourth{
        width: 25%;
        border-right: 2px solid var(--primary-color);
        height: 18px;
        text-align: right;
        padding-right: 2px;
        box-sizing: border-box;
        font-size: 12px;
    }
    #scale .first{
        border-left: 2px solid var(--primary-color);
    }
    #scale .first:after, #scale .second:after, #scale .third:after,  #scale .fourth:after, #scale .first:before{
        position: relative;
        bottom: -14px;
        left: 12px;
    }
    #scale .first:after{
        content: '2.5'
    }
    #scale .first:before{
        content: '0';
        left: -21px;
    }
    #scale .second:after{
        content: '5.0'
    }
    #scale .third:after{
        content: '7.5'
    }
    #scale .fourth:after{
        content: '10';
    }
    #scaleVal{
        width: <?= 200*($total_haq/10)+18 ?>px;
        text-align: right;
        height: 20px;
        margin-bottom: 2px;
        color: var(--primary-color);
        font-weight: bold;
        font-size: 14px;
    }
    #scaleVal:after{
        content: ' ';
        color: transparent;
        border-top: 5px solid transparent;
        border-right: 5px solid transparent;
        border-left: 5px solid transparent;
        border-bottom: 5px solid var(--primary-color);    
        position: relative;
        left: -14px;
        bottom: 1px;
    }
        /* CSS of Scale Meter Ends */
    .gauge-meter{
        height: 180px;
        margin: 0 auto;
    }
    :root{
        --gauge_background: white;
    }
    .gauge-container{
        /* background-color: var(--gauge_background); */
        /* box-shadow: 1px 1px 12px 3px #0000007d;
        margin: 2rem 0; */
        border-radius: 8px;
    }
    g.dxg-title text {
        fill: var(--primary-color) !important;
        font-weight: bold !important;
        font-size: 18px !important;
    }
    .dxg-value-indicator path, circle.dxg-spindle-border {
        fill: black !important;
    }
    circle.dxg-spindle-hole {
        fill: #4c4c4c !important;
    }
    circle.dxg-spindle-hole{
        fill: var(--gauge_background) !important;
    }
    .dxg-subvalue-indicator{
        display: none;
    }

    .my-5{
        margin-bottom: 3rem!important;
    }
    .pt-3{
        padding-top: 6rem!important;
    }
    p {
        margin: 11px 0 1em!important;
    }
    .play{
        background-color: var(--primary-color)!important;
    }
    .btn-link{
        font-size: 1.2rem;
    }
</style>
<script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jquery/jquery-2.1.4.min.js"></script>
<script type="text/javascript" defer src="https://ajax.aspnetcdn.com/ajax/globalize/0.1.1/globalize.min.js"></script>
<script type="text/javascript" defer src="https://cdn3.devexpress.com/jslib/15.2.5/js/dx.chartjs.js"></script>
<main class="main" >
    <section class="main-container" id="intro" >
        <div style="margin-top:4rem;" class="my-3"><img src="<?= base_url() ?>assets/icon/cdcquizTime.png" width="125px" height="auto"></div>
        <section class="content p-0" >
            <span style="font-size: 19px;" class="p-3">Hello <?= $_SESSION['name'] ?></span>
            <a class="btn-link">Education Points: <?= $points ?></a>
            <p class="text-center" style="font-style: italic;font-size: 11px;color:#39ac39;font-weight: 900;">Maximum EP is 10</p>
        </section>
        <!--<section class="scale-container">-->
        <!--    <div id="scaleVal">EAQ: <?= $total_haq ?></div>-->
        <!--    <div id="scale">-->
        <!--        <div class="first"></div>-->
        <!--        <div class="second"></div>-->
        <!--        <div class="third"></div>-->
        <!--        <div class="fourth"></div>-->
        <!--    </div>-->
        <!--</section>-->
         <?php
         
                     $total_play=5;

            if($total_play>=4)
            {$_SESSION['haq_in_profile']=$total_haq;
            ?>
            <!-- <section class="scale-container">
                <div id="scaleVal">HAQ: <span style="color:white"><?= $total_haq ?></span></div>
                <div id="scale">
                    <div class="first"></div>
                    <div class="second"></div>
                    <div class="third"></div>
                    <div class="fourth"></div>
                </div>
            </section>  -->
            
            <section class="flex space-around flex-wrap gauge-container">
                <!-- <div class="gauge-meter" id="pi-meter"></div> -->
                <div class="gauge-meter" id="rating-meter"></div>
            </section>
            <?php
            }else{
                ?>
                <!--<section>-->
                <!--<p style="font-size: 12px; color:var(--primary-color)" class="my-3 text-center">Answers to minimum 20 questions are required to know your HAQ</p>-->
                <!--</section>-->
                <!--<a class="btn-link">Your Current HAQ: 0</a>-->
                <?php
            }
        ?>
        <p style="font-size: 12px;" class="my-3 text-center">Improve your Education Awarenees </br>Quotient with the quiz</p>
        <div class="flex flex-column my-2">
            <button class="button" onclick="startPlaying()">
                <span class="arrow"></span>
                <label for="toggle" class="label">Play Quiz</label>
                <input type="checkbox" id="toggle" class="visually-hidden" />
            </button>
        </div>
        <div style="width:100%;" class="my-3">
            <canvas id="line-chart" height="100px"></canvas>
        </div>
        <?php if(sizeof($history)>0){?>
        <div style="width:100%;min-height:26vh;overflow:auto;">
            <table class="points-tbl">
                <thead>
                    <tr>
                        <th class="text-center">Sr.</th>
                        <th class="text-center">Result</th>
                        <th class="text-center">Points Earned</th>
                        <th class="text-center">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 0;
                    $points = $labels = [];
                    foreach($history as $row){
                        $i++;
                        array_push($points, $row['points']);
                        array_push($labels, $i);
                        ?>
                        <tr>
                            <td class="text-center"><?= $i ?></td>
                            <td class="text-center"><?= $row['result'] ?> out of 5</td>
                            <td class="text-center"><?= $row['points'] ?></td>
                            <td class="text-center"><?= date_format(date_create($row['date']),'Y-m-d H:i:s') ?></td>
                        </tr>
                        <?php
                    }   
                    ?>
                </tbody>
            </table>
            <script>
                var temp = '<?= json_encode($points) ?>';
                var dataPoints = JSON.parse(temp); 
                var temp = '<?= json_encode($labels) ?>';
                var dataLabel  = JSON.parse(temp); 
            </script>
        </div>
        <?php } ?>
        
    </section>
    <section class="main-container" style="display:none" id="playarea">
        <div style="margin-top:9rem;"><img src="<?= base_url() ?>assets/icon/cdcquizTime.png" width="125px" height="auto"></div>
        <div class="flex flex-column">
            <div class="flex flex-column" id="ques-container">
                <div class="clock my-2">
                    <canvas id="myCanvas" width="66" height="66"></canvas>
                </div>
                <div id="ques" class="my-1">
                    <p>Which is the rarest blood group ?</p>
                </div>
                <div id="ans">
                    <button>1. AB Positive</button>
                    <button>2. O Negative</button>
                    <button>3. O Positive</button>
                    <button>4. AB Negative</button>
                </div>
                <div class="flex flex-row flex-item-center my-2 flex-content-center">
                    <!-- <i class="fa fa-arrow-left" style="opacity:0.5;"></i> -->
                    <span class="counter mx-2"><span style="font-size:1.2rem;cursor:not-allowed" class="current">1</span>/<span id="noq">5</span></span>
                    <span onclick="nextQuestion()" class="btn btn-primary" style="padding:3px 8px;">Next</span>
                </div>
            </div>
            <div class="flex flex-content-center flex-row" id="quizz-loader">
                <h3>Loading quizz... <i class="fa fa-spin fa-spinner"></i></h3>
            </div>
            <div id="quizz-result">
                <div class="flex flex-content-center flex-column pt-3" id="response">
               
                    <h3>Please wait... Calculating result(s)</h3>
                    <i class="fa fa-spin fa-spinner fa-3x"></i>
                </div>
            </div>
        </div>
    </section>
</main>
<script>
    
    const chart_bdr_color = { 
        "red" : 'rgb(255, 99, 132)',
        "orange" : 'rgb(255, 159, 64)',
        "yellow" : 'rgb(255, 205, 86)',
        "green" : 'rgb(0, 128, 0)',
        "blue" : 'rgb(54, 162, 235)',
        "purple" : 'rgb(88, 17, 155)',
        "grey" : 'rgb(201, 203, 207)'
    };
    const chart_bg_color = {
        "red" : 'rgba(255, 99, 132, 0.6)',
        "orange" : 'rgba(255, 159, 64, 0.6)',
        "yellow" : 'rgba(255, 205, 86, 0.6)',
        "green" : 'rgba(0, 128, 0, 0.6)',
        "blue" : 'rgba(54, 162, 235, 0.6)',
        "purple" : 'rgba(88, 17, 155, 0.6)',
        "grey" : 'rgba(201, 203, 207, 0.6)'
    };
    // <block:setup:1>
    const labels = ['HAQ'];
    const data = {
        labels: [],
        // datasets: [{},{},{}]
        datasets: [{
            data: [],
            labels: 'HAQ',
            fill: true
        }]
    };
    const config = {
        type: 'line',
        data: data,
        options: {
            plugins: {
                legend: {
                    position: 'top',
                    display: false
                },
                title: {
                    display: false,
                },
                
            },
            maintainAspectRatio: true,
            scales: {
                x: [{
                    grid: {
                        display:false
                    }
                }],
                y: [{
                    grid: {
                        display:false
                    }   
                }]
            },
            interaction: {
                mode: 'index'
            },
            animations: {
                tension: {
                    duration: 1000,
                    easing: 'linear',
                    from: 0.2,
                    to: 0.4,
                    loop: true
                }
            }
        }
    };
    window.addEventListener('load', function() {
        var trendsChart = new Chart(
            document.getElementById("line-chart"),
            config
            )
            trendsChart.data.labels = dataLabel;
            trendsChart.data.datasets[0].data = dataPoints;
            trendsChart.data.datasets[0].label = 'Points';
            trendsChart.data.datasets[0].borderColor = chart_bdr_color['#1c6038'];
            trendsChart.data.datasets[0].backgroundColor = chart_bg_color['#1c6038'];
            trendsChart.update();
    }, false);
    
    $(function(){
        $(".gauge-meter").dxCircularGauge({
            rangeContainer: { 
                offset: 1,
                ranges: [
                    { startValue: 0, endValue: 4, color: '#FF0F00' },
                    { startValue: 4, endValue: 7, color: '#FFC300' },
                    { startValue: 7, endValue: 10, color: '#2DD700'}
                ]
            },
            scale: {
                startValue: 0,  endValue: 10,
                majorTick: { tickInterval: 1 },
                label: {
                    format: 'number'
                }
            },
            title: {
                text: '',
                subtitle: '',
                position: 'bottom-center'
            },
            tooltip: {
                enabled: false,
                format: 'number',
                customizeText: function (arg) {
                    return 'Current ' + arg.valueText;
                }
            },
            // subvalueIndicator: {
            //     type: 'textCloud',
            //     format: 'thousands',
            //     text: {
            //         format: 'number',
            //         customizeText: function (arg) {
            //                     return 'Goal ' + arg.valueText;
            //         }
            //     }  
            // },
            value: 0,
            subvalues: [7]
        });
        $("#rating-meter").dxCircularGauge();
        pi = <?= $total_haq ?>;
        $("#rating-meter").dxCircularGauge({
            value: pi,
        });
    });
</script>