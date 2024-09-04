<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-xs-12">
                <div class="single_footer">
                    <h4>Services</h4>
                    <ul>
                        <li><a href="<?= url('/contact') ?>" target="_blank">Consulting</a></li>
                        <li><a href="mailto:contact@glycomicsworkbench.org">Feedback</a></li>
                    </ul>
                </div>
            </div><!--- END COL -->
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="single_footer single_footer_address">
                    <h4>Page Link</h4>
                    <ul>
                        <li><a href="<?= url('/') ?>">Home</a></li>
                        <li><a href="<?= url('/about') ?>">About</a></li>
                        <li><a href="<?= url('/databases') ?>">Databases</a></li>
                        <li><a href="<?= url('/tools') ?>">Tools</a></li>
                        <li><a href="<?= url('/portals') ?>">Portals</a></li>
                        <li><a href="<?= url('/info-links') ?>">Info Links</a></l>
                        <li><a href="<?= url('/contact') ?>">Contact</a></l>
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
                        href="https://www.dattaconsultinggroup.com/contact.php" target="_blank"> <b style="color:#F58220">DCG</b> </a>
                </p>
            </div><!--- END COL -->
        </div><!--- END ROW -->
    </div><!--- END CONTAINER -->
</div>
<button type="button" class="btn btn-success btn-floating btn-lg" id="btn-back-to-top">
    <i class="fas fa-arrow-up"></i>
</button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove();
        });
    }, 4000);
    $("form.quickContact").submit(function(e){
        e.preventDefault();
        $("#msg").html('');
        var token = $("input[name=_token]").val(); // The CSRF token
        var fullname = $("input[name=fullname]").val();
        var email = $("input[name=email]").val();
        var message = $("textarea[name=message]").val();

        $.ajax({
            type:'POST',
            url:'<?= url('/quickcontact') ?>',
            dataType: 'json',
            data:{_token: token, fullname:fullname, email:email, message:message},
            success:function(data){
                if(data.status){
                    $("form.quickContact").trigger("reset");
                    $("#msg").html(data.msg);
                }
            }
        });
    });



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


    let searchButton = document.querySelector("#searchButton");
    searchButton.addEventListener("click", showSearchBar);


    // Click Function to change the display value of the input
    function showSearchBar() {
        let popup = document.getElementById("search");
        if (popup.style.display == "none") {
            popup.style.display = "block";
        } else {
            popup.style.display = "none";
        }
    }

</script>

