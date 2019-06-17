<style>
    * {
        box-sizing: border-box;
    }

    /* Position the image container (needed to position the left and right arrows) */
    .container3 {
        position: relative;
    }

    /* Hide the images by default */
    .mySlides3 {
        display: none;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor3 {
        cursor: pointer;
    }

    /* Next & previous buttons */
    .prev3,
    .next3 {
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
    .next3 {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev3:hover,
    .next3:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext3 {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* Container for image text */
    .caption-container3 {
        text-align: center;
        background-color: #222;
        padding: 2px 16px;
        color: white;
    }

    .row3:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Six columns side by side */
    .column3 {
        float: left;
        width: 16.66%;
    }

    /* Add a transparency effect for thumnbail images */
    .demo3 {
        opacity: 0.6;
    }

    .active,
    .demo3:hover {
        opacity: 1;
    }
</style>
<h3>Edicion Habitaciones y servicios</h3>
<div class="container3">
    <!-- Full-width images with number text -->
    <div class="mySlides3">
        <div class="numbertext3">1 / 6</div>
        <img src="{{asset('img/manualAyuda/Diapositiva17.JPG')}}" style="width:100%">
    </div>

    <div class="mySlides3">
        <div class="numbertex3">2 / 6</div>
        <img src="{{asset('img/manualAyuda/Diapositiva18.JPG')}}" style="width:100%">
    </div>

    <div class="mySlides3">
        <div class="numbertext3">3 / 6</div>
        <img src="{{asset('img/manualAyuda/Diapositiva19.JPG')}}"  style="width:100%">
    </div>

    <div class="mySlides3">
        <div class="numbertext3">4 / 6</div>
        <img src="{{asset('img/manualAyuda/Diapositiva20.JPG')}}" style="width:100%">
    </div>

    <div class="mySlides3">
        <div class="numbertext3">5 / 6</div>
        <img src="{{asset('img/manualAyuda/Diapositiva21.JPG')}}" style="width:100%">
    </div>

    <div class="mySlides3">
        <div class="numbertext3">6 / 6</div>
        <img src="{{asset('img/manualAyuda/Diapositiva22.JPG')}}" style="width:100%">
    </div>


    <!-- Next and previous buttons -->
    <a class="prev3" onclick="plusSlides3(-1)">&#10094;</a>
    <a class="next3" onclick="plusSlides3(1)">&#10095;</a>

    <!-- Image text -->
    <div class="caption-container3">
        <p id="caption3"></p>
    </div>

    <!-- Thumbnail images -->
    <div class="row3">
        <div class="column3">
            <img class="demo3 cursor3" src="{{asset('img/manualAyuda/Diapositiva17.JPG')}}" style="width:100%" onclick="currentSlide3(1)" alt="The Woods">
        </div>
        <div class="column3">
            <img class="demo3 cursor3" src="{{asset('img/manualAyuda/Diapositiva18.JPG')}}" style="width:100%" onclick="currentSlide3(2)" alt="Cinque Terre">
        </div>
        <div class="column3">
            <img class="demo3 cursor3" src="{{asset('img/manualAyuda/Diapositiva19.JPG')}}" style="width:100%" onclick="currentSlide3(3)" alt="Mountains and fjords">
        </div>
        <div class="column3">
            <img class="demo3 cursor3" src="{{asset('img/manualAyuda/Diapositiva20.JPG')}}" style="width:100%" onclick="currentSlide3(4)" alt="Northern Lights">
        </div>
        <div class="column3">
            <img class="demo3 cursor3" src="{{asset('img/manualAyuda/Diapositiva21.JPG')}}" style="width:100%" onclick="currentSlide3(5)" alt="Nature and sunrise">
        </div>
        <div class="column3">
            <img class="demo3 cursor3" src="{{asset('img/manualAyuda/Diapositiva22.JPG')}}" style="width:100%" onclick="currentSlide3(6)" alt="Nature and sunrise">
        </div>
    </div>
</div>


<script>
    var slideIndex3 = 1;
    showSlides3(slideIndex3);

    // Next/previous controls
    function plusSlides3(n) {
        showSlides3(slideIndex3 += n);
    }

    // Thumbnail image controls
    function currentSlide3(n) {
        showSlides3(slideIndex3 = n);
    }

    function showSlides3(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides3");
        var dots = document.getElementsByClassName("demo3");
        var captionText = document.getElementById("caption3");
        if (n > slides.length) {slideIndex3 = 1}
        if (n < 1) {slideIndex1 = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex3-1].style.display = "block";
        dots[slideIndex3-1].className += " active";
        captionText.innerHTML = dots[slideIndex3-1].alt;
    }
</script>
