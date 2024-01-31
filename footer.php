
    <!-- Contact Section -->
    
    
    <div id="contact" class="text-center">
      <div class="container" style="margin-top:-110px;   line-height: 1.5;
 margin-bottom: -40px">
        <div class="section-title center" >
          <h2>Contact us</h2>
          <hr />
          <p>
            You can join our team of developers, teachers or report a bug. You may want to get in touch with us for any reason! We are always available!
          </p>
        </div>
        <div class="col-md-8 col-md-offset-2">
          <div class="col-md-4">
            <div class="contact-item">
              <i class="fa fa-map-marker fa-2x"></i>
              <p>
                Shariati blvd.,<br />
                Mashhad, Kh.Raz Iran
              </p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="contact-item">
              <i class="fa fa-envelope-o fa-2x"></i>
               info@teacherstribe.net <br>
               navid.nasrollahi@yahoo.com

            </div>
          </div>
          <div class="col-md-4">
            <div class="contact-item">
              <i class="fa fa-phone fa-2x"></i>
              <p>
                +98 939 509 5856<br />
                +98 919 343 4434
               </p>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div class="col-md-8 col-md-offset-2">
          <h3>Leave us a message</h3>
          <form action="send_message.php" method="post" name="send_message" id="send_message">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input
                    type="text"
                    name="sender"
                    id="sender"
                    class="form-control"
                    placeholder="Name"
                    required="required"
                  />
             
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input
                    type="text"
                    id="email"
                    name="email"

                    class="form-control"
                    placeholder="Email or Cell number"
                    required="required"
                  />
                  <p class="help-block text-danger"></p>
                </div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" 
                name="message"
                id="message"
                class="form-control"
          
                placeholder="Message"
                required
              > 
              <p class="help-block text-danger"></p>
            </div>
            <div id="success"></div>
            <button type="submit" class="btn btn-default">Send Message</button>
          </form>
          
          <script>
  $(document).ready(function() {
    $('#send_message').submit(function(event) {
      event.preventDefault(); // Prevent default form submission

      // Get form data
      var formData = $(this).serialize();

      // Make AJAX request
      $.ajax({
        url: 'send_message.php',
        type: 'post',
        data: formData,
        success: function(response) {
          $('#ajax-result2').html(response); // Display result in div
        }
      });
    });
  });
</script>
          
          <div id="ajax-result2"></div>


 

 
          
          
          <div class="social">
            <h3>Follow us</h3>
            <ul>
              <li>
                <a href="#"><i class="fa fa-facebook"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-twitter"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-dribbble"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-github"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-instagram"></i></a>
              </li>
              <li>
                <a href="#"><i class="fa fa-linkedin"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
<div id="footer">
      <div class="container">
        <p>
          Copyright &copy; Teacherstribe.net. Designed by
          <a href="http://www.navidnasrollahi.ir" >Navid  Nasr.</a>
        </p>
      </div>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/chat.js"></script>

 
    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>
