$(document).ready(function(){

    $('#menu').click(function(){
        $(this).toggleClass('fa-times');
        $('.navbar').toggleClass('nav-toggle');
    });

    $(window).on('scroll load',function(){

        $('#menu').removeClass('fa-times');
        $('.navbar').removeClass('nav-toggle');

        if($(window).scrollTop() > 60){
            $('header').addClass('header-active');
        }else{
            $('header').removeClass('header-active');
        }

        $('section').each(function(){

            let top = $(window).scrollTop();
            let height = $(this).height();
            let offset = $(this).offset().top - 200;
            let id = $(this).attr('id');

            if(top >= offset && top < offset + height){
                $('.navbar ul li a').removeClass('active');
                $('.navbar').find(`[href="#${id}"]`).addClass('active');
            }

        });

    });

})
   function restrictAlphabets(e) {
             var x = e.which || e.keycode;
             if ((x >= 48 && x <= 57))
                 return true;
             else
                 return false;
         }
$(document).ready(function(){
    $('btn2').click(function(){
        $(this).toggleClass('fa-moon');
    })
})

function myFunction() {
    var element = document.body;
    element.classList.toggle("dark-theme");
 }

 function calculateBmi() {
     
    var weight = document.bmiForm.weight.value
    var height = document.bmiForm.height.value
    if(weight > 0 && height > 0){	
    var finalBmi = weight/(height/100*height/100)
    document.bmiForm.bmi.value = finalBmi
    if(finalBmi < 18.5){
    document.bmiForm.meaning.value = "That you are too thin."
    }
    if(finalBmi > 18.5 && finalBmi < 25){
    document.bmiForm.meaning.value = "That you are healthy."
    }
    if(finalBmi > 25){
    document.bmiForm.meaning.value = "That you are overweight."
    }
    }
    else{
    alert("Please Fill in everything correctly")
    }
    }
