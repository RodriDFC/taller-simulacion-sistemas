<style>
    * {
        box-sizing: border-box;
    }

    /* Position the image container (needed to position the left and right arrows) */
    .container2 {
        position: relative;
    }

    /* Hide the images by default */
    .mySlides2 {
        display: none;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor2 {
        cursor: pointer;
    }

    /* Next & previous buttons */
    .prev2,
    .next2 {
        cursor: pointer;
        position: absolute;
        top: 40%;
        width: auto;
        padding: 16px;
        margin-top: -50px;
        color: white;
        font-weight: bold;
        font-size: 20px;
        border-radius: 0 3px 3px 0;
        user-select: none;
        -webkit-user-select: none;
    }

    /* Position the "next button" to the right */
    .next2 {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev2:hover,
    .next2:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext2 {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* Container for image text */
    .caption-container2 {
        text-align: center;
        background-color: #222;
        padding: 2px 16px;
        color: white;
    }

    .row2:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Six columns side by side */
    .column2 {
        float: left;
        width: 16.66%;
    }

    /* Add a transparency effect for thumnbail images */
    .demo2 {
        opacity: 0.6;
    }

    .active,
    .demo2:hover {
        opacity: 1;
    }
</style>
<h3>Analisis Habitaciones y servicios</h3>
<div class="container2">
    <!-- Full-width images with number text -->
    <div class="mySlides2">
        <div class="numbertext2">1 / 5</div>
        <img src="{{asset('img/manualAyuda/Diapositiva11.JPG')}}" style="width:100%">
    </div>

    <div class="mySlides2">
        <div class="numbertext2">2 / 5</div>
        <img src="{{asset('img/manualAyuda/Diapositiva12.JPG')}}" style="width:100%">
    </div>

    <div class="mySlides2">
        <div class="numbertext2">3 / 5</div>
        <img src="{{asset('img/manualAyuda/Diapositiva13.JPG')}}"  style="width:100%">
    </div>

    <div class="mySlides2">
        <div class="numbertext2">4 / 5</div>
        <img src="{{asset('img/manualAyuda/Diapositiva14.JPG')}}" style="width:100%">
    </div>

    <div class="mySlides2">
        <div class="numbertext2">5 / 5</div>
        <img src="{{asset('img/manualAyuda/Diapositiva15.JPG')}}" style="width:100%">
    </div>

    <div class="mySlides2">
        <div class="numbertext2">5 / 5</div>
        <img src="{{asset('img/manualAyuda/Diapositiva16.JPG')}}" style="width:100%">
    </div>


    <!-- Next and previous buttons -->
    <a class="prev2" onclick="plusSlides2(-1)">&#10094;</a>
    <a class="next2" onclick="plusSlides2(1)">&#10095;</a>

    <!-- Image text -->
    <div class="caption-container2">
        <p id="caption2"></p>
    </div>

    <!-- Thumbnail images -->
    <div class="row2">
        <div class="column2">
            <img class="demo2 cursor2" src="{{asset('img/manualAyuda/Diapositiva11.JPG')}}" style="width:100%" onclick="currentSlide2(1)" alt="The Woods">
        </div>
        <div class="column2">
            <img class="demo2 cursor2" src="{{asset('img/manualAyuda/Diapositiva12.JPG')}}" style="width:100%" onclick="currentSlide2(2)" alt="Cinque Terre">
        </div>
        <div class="column2">
            <img class="demo2 cursor2" src="{{asset('img/manualAyuda/Diapositiva13.JPG')}}" style="width:100%" onclick="currentSlide2(3)" alt="Mountains and fjords">
        </div>
        <div class="column2">
            <img class="demo2 cursor2" src="{{asset('img/manualAyuda/Diapositiva14.JPG')}}" style="width:100%" onclick="currentSlide2(4)" alt="Northern Lights">
        </div>
        <div class="column2">
            <img class="demo2 cursor2" src="{{asset('img/manualAyuda/Diapositiva15.JPG')}}" style="width:100%" onclick="currentSlide2(5)" alt="Nature and sunrise">
        </div>
        <div class="column2">
            <img class="demo2 cursor2" src="{{asset('img/manualAyuda/Diapositiva16.JPG')}}" style="width:100%" onclick="currentSlide2(6)" alt="Nature and sunrise">
        </div>
    </div>
</div>


<script>
    var slideIndex2 = 1;
    showSlides2(slideIndex2);

    // Next/previous controls
    function plusSlides2(n) {
        showSlides2(slideIndex2 += n);
    }

    // Thumbnail image controls
    function currentSlide2(n) {
        showSlides2(slideIndex2 = n);
    }

    function showSlides2(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides2");
        var dots = document.getElementsByClassName("demo2");
        var captionText = document.getElementById("caption2");
        if (n > slides.length) {slideIndex2 = 1}
        if (n < 1) {slideIndex1 = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex2-1].style.display = "block";
        dots[slideIndex2-1].className += " active";
        captionText.innerHTML = dots[slideIndex2-1].alt;
    }
</script>
