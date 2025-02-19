// @author Ankit Verma
var onForm;
let splash;
$(function(){
    splash = $("#splash-screen");
    $(".ui.dropdown").dropdown();
})
$(function(){
    const returning = localStorage.getItem('returning');
    if(!returning){
        localStorage.setItem('returning', true);
        $('#first-visit').fadeIn();
    }
    setTimeout(splash.fadeOut(), 1000);
})

// SLIDE SHOW JS BEGINS
slidecount = 0;
function firstVisit(control){
    if(control == 'next'){
        if(slidecount == 2){
            slidecount = 0;
            $('#first-visit').fadeOut();
        }else{
            slidecount++;
        }
    }else{
        if(slidecount == 0){
            slidecount = 2;
        }else{
            slidecount--;
        }
    }
    $("#first-visit .slide").hide();
    $("#first-visit .slide-"+slidecount).show(); 
}

let slideIndex = 0;
let timeoutId = null;
const slides = document.getElementsByClassName("mySlides");
const dots = document.getElementsByClassName("dot");
      
showSlides();
function currentSlide(index) {
    slideIndex = index;
    showSlides();
}
function plusSlides(step) {
    if(step < 0) {
        slideIndex -= 2;

        if(slideIndex < 0) {
            slideIndex = slides.length - 1;
        }
    }
    showSlides();
}
function showSlides() {
    for(let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
    dots[i].classList.remove('active');
    }
    slideIndex++;
    if(slideIndex > slides.length) {
    slideIndex = 1
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].classList.add('active');
    if(timeoutId) {
        clearTimeout(timeoutId);
    }
    timeoutId = setTimeout(showSlides, 5000); // Change image every 5 seconds
}



// SLIDESHOW JS ENDS
function user_password()
{
   var newpass=$('#newpassword').val();
   var cpass=$('#confirmpassword').val();
    if(cpass=='')
    {
        $('#errorcpass').html(''); 
    }
        else
        {
           if(newpass==cpass)
        {
            $('#errorcpass').html(''); 
            $("#save").removeAttr('disabled');
        }
        else{
            $('#errorcpass').html('Confirm Password Not Match');
            $("#save").prop("disabled", true);
        }
     }
  
  
}
function user_confirmpassword()
{
    var newpass=$('#newpassword').val();
    var cpass=$('#confirmpassword').val();
    if(newpass==cpass)
    {
       $('#errorcpass').html('');
       $("#save").removeAttr('disabled');
    }
    else{
        $('#errorcpass').html('Confirm Password Not Match');
        $("#save").prop("disabled", true);
    }
}