/*** PLAY TO EARN */
var ques_tracker = noq = 0; var ques_bank; 
var isQuizzSubmitted = false; 
$(function(){
    
    $.ajax({
        type: "POST",
        url: base_url + "get-data",
        data: {"where":'', "tbl":'questionnaire', "colmn":'',csrf_token:csrf_value}, 	// serializes the form's elements.
        success: function(data){
            
            // el_loader.hide();
            resp = JSON.parse(data);
            ques_bank = resp.data;
            noq = ques_bank.length;
            $("#noq").html(noq);
            if(!resp.error){
                nextQuestion();
                $("#ques-container").fadeIn();
                $("#quizz-loader").fadeOut();
            }else{
            }
        }
    });
});
function nextQuestion(){
    timer = counter;
    
    if(ques_tracker >= noq){
        $("#ques-container").fadeOut();
        $("#quizz-result").fadeIn();
        submitQuizz();
        
        return;
    }
    
    // console.log(ques_bank[ques_tracker]);
    $("#ques").html('<p>'+ques_bank[ques_tracker].ques+'</p>');
    answers = '<button class="ans-btn" id="opt_1-'+ques_tracker+'" onclick="saveAns(1,'+ques_tracker+')">A. '+ques_bank[ques_tracker].option_1+'</button>'
        +'<button class="ans-btn" id="opt_2-'+ques_tracker+'" onclick="saveAns(2,'+ques_tracker+')">B. '+ques_bank[ques_tracker].option_2+'</button>'
        +'<button class="ans-btn" id="opt_3-'+ques_tracker+'" onclick="saveAns(3,'+ques_tracker+')">C. '+ques_bank[ques_tracker].option_3+'</button>'
        +'<button class="ans-btn" id="opt_4-'+ques_tracker+'" onclick="saveAns(4,'+ques_tracker+')">D. '+ques_bank[ques_tracker].option_4+'</button>';
    $("#ans").html(answers);
   
    ques_tracker++;
   
    $(".counter .current").html(ques_tracker);
}

function saveAns(ans, ques){
   
    ques_bank[ques].ans = ans;
    $(".ans-btn").removeClass('active');
    $("#opt_"+ans+"-"+ques).addClass('active');
    //console.log(ques_bank);
}

function submitQuizz(){
  
    if(isQuizzSubmitted){
        return;
    }else{
        isQuizzSubmitted = true;
    }
    answers = JSON.stringify(ques_bank);   
    $.ajax({
        type: "POST",
        url: base_url + "save",
        data: {"fid":'submit-quizz', "answers":answers, csrf_token:csrf_value}, 	// serializes the form's elements.
        success: function(data){
            // el_loader.hide();
            console.log(data);
            var resp = JSON.parse(data);
            if(resp.isSaved == 'false'){
                av_alert('Error',resp.msg,'error');
                location.reload();
            }else{
                rows = '<span class="flex" style="margin: 0px 82px;font-size: 22px;">You Won</span><a class="btn-link" style="margin: 15px 69px;">Education Point:'+resp.point+'</a><span id="res"></span>'+resp.result+' of 5 questions answered correctly</p><button class="btn btn-primary" onClick="history.go(0);">Back</button><button class="btn btn-primary mt-2" onclick="history.go(0);">Play Again</button>';
                msg = resp.result+' out of 5 correct.';
                // av_alert('',msg,'success');
                $("#response").html(rows);
            }
        }
    });
    
}

var canvas = document.getElementById('myCanvas');
var ctx = canvas.getContext('2d');
var x = canvas.width / 2;
var y = canvas.height / 2;
var radius = 28;
var startAngle = -0.5 * Math.PI;
var endAngle = 2 * Math.PI;
var counterClockwise = false;
// ctx.beginPath();
// ctx.arc(x, y, radius, startAngle, endAngle, counterClockwise);
// ctx.lineWidth = 5;

// ctx.font = "28px Arial";
// ctx.fillText("14", x-18, y+11);
// // line color
// ctx.strokeStyle = '#43ccf7';
// ctx.stroke();

counter = 20;
timer = (counter - 0); 

function drawClock(){
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    if(timer < 0){
        timer = counter;
        nextQuestion();
    }
    var k = (counter - (timer-0)) / counter;
    var angleTo = (startAngle + endAngle*k);
    // console.log(k + " : "+angleTo);

    ctx.beginPath();
    ctx.arc(x, y, radius, startAngle, angleTo, counterClockwise);
    ctx.lineWidth = 5;

    ctx.font = "28px Arial";
    if(timer < 10){
        ctx.fillText(timer, x-8, y+11);
    }else{
        ctx.fillText(timer, x-18, y+11);
    }
    if(timer<6){
        ctx.strokeStyle = '#ff000087';
    }else{
        ctx.strokeStyle = '#43ccf7';
    }
    ctx.stroke();
    timer--;
}
function startPlaying(){
    $("#intro").hide();
    $("#playarea").show();
    setInterval(drawClock, 1000);
}

