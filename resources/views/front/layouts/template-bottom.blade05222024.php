<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="single_footer">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Simply dummy text</a></li>
                        <li><a href="#">The printing and typesetting </a></li>
                        <li><a href="#">Standard dummy text</a></li>
                        <li><a href="#">Type specimen book</a></li>
                    </ul>
                </div>
            </div><!--- END COL -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single_footer single_footer_address">
                    <h4>Page Link</h4>
                    <ul>
                        <li><a href="#">Lorem Ipsum</a></li>
                        <li><a href="#">Simply dummy text</a></li>
                        <li><a href="#">The printing and typesetting </a></li>
                        <li><a href="#">Standard dummy text</a></li>
                        <li><a href="#">Type specimen book</a></li>
                    </ul>
                </div>
            </div><!--- END COL -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single_footer single_footer_address">

                    <p class="text-black">Developed and supported by: Datta Consulting Group (DCG)</p>
                </div>
                <div class="social_profile">
                    <ul>
                        <li><a class="btn-outline-success" href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div><!--- END COL -->
        </div><!--- END ROW -->
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <p class="copyright">Copyright © Datta Consulting Group, 2015-2024 <a
                        href="https://www.dattaconsultinggroup.com/contact.php"> <b class="text-primary">DCG</b> </a>
                </p>
            </div><!--- END COL -->
        </div><!--- END ROW -->
    </div><!--- END CONTAINER -->
</div>
<button type="button" class="btn btn-success btn-floating btn-lg" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>
<script type="text/javascript">
    //Get the button
    let mybutton = document.getElementById("btn-back-to-top");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction();
    };

    function scrollFunction() {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    mybutton.addEventListener("click", backToTop);

    function backToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }


    let myToggle = document.getElementById("toggle");
    let sidebarContact = document.getElementById("sidebar-contact");
    myToggle.addEventListener("click",addToggle)

    function addToggle(){
        sidebarContact.classList.toggle("active");
        myToggle.classList.toggle("active");
    }

</script>

