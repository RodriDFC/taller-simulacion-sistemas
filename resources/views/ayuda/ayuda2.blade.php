
<style>
    * {
        box-sizing: border-box;
    }

    /* Position the image container (needed to position the left and right arrows) */
    .container1 {
        position: relative;
    }

    /* Hide the images by default */
    .mySlides1 {
        display: none;
    }

    /* Add a pointer when hovering over the thumbnail images */
    .cursor1 {
        cursor: pointer;
    }

    /* Next & previous buttons */
    .prev1,
    .next1 {
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
    .next1 {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a black background color with a little bit see-through */
    .prev1:hover,
    .next1:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    /* Number text (1/3 etc) */
    .numbertext1 {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* Container for image text */
    .caption-container1 {
        text-align: center;
        background-color: #222;
        padding: 2px 16px;
        color: white;
    }

    .row1:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Six columns side by side */
    .column1 {
        float: left;
        width: 16.66%;
    }

    /* Add a transparency effect for thumnbail images */
    .demo1 {
        opacity: 0.6;
    }

    .active,
    .demo1:hover {
        opacity: 1;
    }
</style>
<h3>Reportes de la Simulacion</h3>
<div class="container1">
    <!-- Full-width images with number text -->
    <div class="mySlides1">
        <div class="numbertext1">1 / 5</div>
        <img src="{{asset('img/manualAyuda/Diapositiva6.JPG')}}" style="width:100%">
    </div>

    <div class="mySlides1">
        <div class="numbertext1">2 / 5</div>
        <img src="{{asset('img/manualAyuda/Diapositiva7.JPG')}}" style="width:100%">
    </div>

    <div class="mySlides1">
        <div class="numbertext1">3 / 5</div>
        <img src="{{asset('img/manualAyuda/Diapositiva8.JPG')}}"  style="width:100%">
    </div>

    <div class="mySlides1">
        <div class="numbertext1">4 / 5</div>
        <img src="{{asset('img/manualAyuda/Diapositiva9.JPG')}}" style="width:100%">
    </div>

    <div class="mySlides1">
        <div class="numbertext1">5 / 5</div>
        <img src="{{asset('img/manualAyuda/Diapositiva10.JPG')}}" style="width:100%">
    </div>


    <!-- Next and previous buttons -->
    <a class="prev1" onclick="plusSlides1(-1)">&#10094;</a>
    <a class="next1" onclick="plusSlides1(1)">&#10095;</a>

    <!-- Image text -->
    <div class="caption-container1">
        <p id="caption1"></p>
    </div>

    <!-- Thumbnail images -->
    <div class="row1">
        <div class="column1">
            <img class="demo1 cursor1" src="{{asset('img/manualAyuda/Diapositiva6.JPG')}}" style="width:100%" onclick="currentSlide1(1)" alt="The Woods">
        </div>
        <div class="column1">
            <img class="demo1 cursor1" src="{{asset('img/manualAyuda/Diapositiva7.JPG')}}" style="width:100%" onclick="currentSlide1(2)" alt="Cinque Terre">
        </div>
        <div class="column1">
            <img class="demo1 cursor1" src="{{asset('img/manualAyuda/Diapositiva8.JPG')}}" style="width:100%" onclick="currentSlide1(3)" alt="Mountains and fjords">
        </div>
        <div class="column1">
            <img class="demo1 cursor1" src="{{asset('img/manualAyuda/Diapositiva9.JPG')}}" style="width:100%" onclick="currentSlide1(4)" alt="Northern Lights">
        </div>
        <div class="column1">
            <img class="demo1 cursor1" src="{{asset('img/manualAyuda/Diapositiva10.JPG')}}" style="width:100%" onclick="currentSlide1(5)" alt="Nature and sunrise">
        </div>
    </div>
</div>


<script>
    var slideIndex1 = 1;
    showSlides1(slideIndex1);

    // Next/previous controls
    function plusSlides1(n) {
        showSlides1(slideIndex1 += n);
    }

    // Thumbnail image controls
    function currentSlide1(n) {
        showSlides1(slideIndex1 = n);
    }

    function showSlides1(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides1");
        var dots = document.getElementsByClassName("demo1");
        var captionText = document.getElementById("caption1");
        if (n > slides.length) {slideIndex1 = 1}
        if (n < 1) {slideIndex1 = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex1-1].style.display = "block";
        dots[slideIndex1-1].className += " active";
        captionText.innerHTML = dots[slideIndex1-1].alt;
    }
</script>
