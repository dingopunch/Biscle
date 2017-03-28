<?php include('includes/header.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<style>
    .center {
        margin: auto;
        width: 60%;
        border: 3px solid #73AD21;
        padding: 10px;
    }
</style>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '297621347273784',
            xfbml      : true,
            version    : 'v2.7'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));





</script>



    <section id="middle">
    	<div class="container">
            <div class="info-sheet">
            	<h2>You have used up all your BisMail today</h2>
                <p class="orange-txt lrgtxt">Consider to upgrade your plan <a href="my-info.php">here</a></p>


                </br>
                </br>
                <div >
                <?php

$add=mysqli_query($con,"Select * from free_share where userId='$userId' and platform='1'");
if(mysqli_num_rows($add)==0) {

    ?>
    <div id="shareBtn"  class="center" style="border: 2px solid blueviolet"><a> <img align="left" style="width: 14% ;margin-right: 1%" src="fbShare.jpg"/><p style="font-size: larger; color: darkslategray" > Earn 500 Bismail For Free By Sharing this Site on FACEBOOK</p></a></div>

                </br>

<?php

}
                $add=mysqli_query($con,"Select * from free_share where userId='$userId' and platform='2'");
                if(mysqli_num_rows($add)==0) {

                ?>
                <div id="twitter" class="center" style="border: 2px solid lightblue"><a href="https://twitter.com/intent/tweet?url=http://biscle.com&text=Biscle- Your Business Circle; via=Biscle"><img align="left" style="width:14%;margin-right: 1%" src="tweet.jpg" /><p style="font-size: larger; color: darkslategray"> Earn 500 Bismail For Free By Sharing this Site on TWITTER</p></a>
</div>

            <?php
}
 ?>


            </div>

            </div>

        </div>
    </section>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Congratulations!</h4>
      </div>
      <div class="modal-body">
        <p>you have earned 500 free bismails using share service.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>


    $(document).ready(function(){
        $("#shareBtn").click(function(){
            FB.ui({
                method: 'share',
                mobile_iframe: true,
                href: 'http://www.biscle.com',
                picture:'http://biscle.com/sharephoto.jpg',
                description:'Biscle is the social network that helps you grow your business. You can find business partners, vendors, suppliers. Also, you can discover potential orders and start building your business connections right away.'
            },  function(response) {
                if (response && !response.error_message) {
                    $.ajax({
                        type: 'POST',
                        url: 'pkil.php',
                        data: {status: 1}
                    }).done(function( msg ) {
                        $('#myModal').modal('show');
                }); }else {

                }
            });
        });
    });



</script>


<script>
    // Performant asynchronous method of loading widgets.js
    window.twttr = (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);

        t._e = [];
        t.ready = function(f) {
            t._e.push(f);
        };

        return t;
    }(document, "script", "twitter-wjs"));
</script>

<script>
    // Wait until twttr to be ready before adding event listeners
    twttr.ready(function (twttr) {
        twttr.events.bind('tweet', function(event) {
            $.ajax({
                type: 'POST',
                url: 'pkil.php',
                data: {status: 2}
            }).done(function( msg ) {
                $('#myModal').modal('show');
                console.log( "Data Saved: " + msg );
            });

        });
    });
</script>

<?php include('includes/footer.php'); ?>