
<style>
 
.chat ul {
  margin: 0px;
  padding: 0px;
  list-style: none;
}

.comeup {
       position: relative;
    top: -200px;
}
.message-left .message-time {
  display: block;
  font-size: 12px;
  text-align: left;
  padding-left: 30px;
  padding-top: 4px;
  color: #ccc;
  font-family: Courier;
}

.message-right .message-time {
  display: block;
  font-size: 12px;
  text-align: right;
  padding-right: 20px;
  padding-top: 4px;
  color: #ccc;
  font-family: Courier;
}

.message-left {
  text-align: left;
  margin-bottom: 16px;
}

.message-left .message-text {
  max-width: 80%;
  display: inline-block;
  background: #fff;
  padding: 15px;
  font-size: 14px;
  color: #999;
  border-radius: 30px;
  font-weight: 100;
  line-height: 1.5em;
}

.message-right {
  text-align: right;
  margin-bottom: 16px;
}

.message-right .message-text {
  line-height: 1.5em;
  display: inline-block;
  background: #5ca6fa;
  padding: 15px;
  font-size: 14px;
  color: #fff;
  border-radius: 30px;
  line-height: 1.5em;
  font-weight: 100;
  text-align: left;
}

.chat {
  border-radius: 30px;
  padding: 20px;
  background: #f5f7fa;
}

.chat-container {
  height: 400px;
  overflow-y: scroll;
  padding-right: 16px;
}

.spinme-right {
  display: inline-block;
  padding: 15px 20px;
  font-size: 14px;
  border-radius: 30px;
  line-height: 1.25em;
  font-weight: 100;
  opacity: 0.2;
}

.spinme-left {
  display: inline-block;
  padding: 15px 20px;
  font-size: 14px;
  color: #ccc;
  border-radius: 30px;
  line-height: 1.25em;
  font-weight: 100;
  opacity: 0.2;
}

.spinner {
  margin: 0;
  width: 30px;
  text-align: center;
}

.spinner > div {
  width: 10px;
  height: 10px;
  border-radius: 100%;
  display: inline-block;
  -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
  animation: sk-bouncedelay 1.4s infinite ease-in-out both;
  background: rgba(0,0,0,1);
}

table {
      width: 100%;
    }

    td {
      padding: 10px;
    }

    img {
      max-width: 100%;
      height: auto;
    }

    @media screen and (max-width: 600px) {
      td {
        display: block;
        width: 100%;
      }
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      background-color: #ccc;
      color: #fff;
      text-decoration: none;
      font-weight: bold;
      border-radius: 5px;
      margin-right: 10px;
    }

    .download-button {
      background-color: #4CAF50;
    }

    .view-button {
      background-color: #0099ff;
    }
 
.spinner .bounce1 {
  -webkit-animation-delay: -0.32s;
  animation-delay: -0.32s;
}

.spinner .bounce2 {
  -webkit-animation-delay: -0.16s;
  animation-delay: -0.16s;
}

@-webkit-keyframes sk-bouncedelay {
  0%,
  80%,
  100% {
    -webkit-transform: scale(0)
  }
  40% {
    -webkit-transform: scale(1.0)
  }
}

@keyframes sk-bouncedelay {
  0%,
  80%,
  100% {
    -webkit-transform: scale(0);
    transform: scale(0);
  }
  40% {
    -webkit-transform: scale(1.0);
    transform: scale(1.0);
  }
}



</style>
<!-- About Section -->
    <div id="about"  >
      <div class="container " >
        <div class="section-title text-center center "  >
        
          <h2>Teachers' Tribe portal </h2>
          <hr />
        </div>
        <div class="row">
          <div class="col-md-4">
            

            <div class="img-responsive" >



            <div id="wrapper">
  <div class="chat">
    <div class="chat-container">
      <div class="chat-listcontainer">

        <ul class="chat-message-list">
        </ul>

      </div>
    </div>
  </div>
</div>


          </div>



          </div>
          <div class="col-md-4">
            <div class="about-text">
              <h4>What is it we all talk about?</h4>
              <p>
              Get your own portal right away!
Our ABSOLUTELY free plan is designed to help language teachers manage their students, sessions, tuitions, and plans with ease. With our user-friendly platform, teachers can easily add projects, set reminders, and schedule appointments on their calendar to keep track of all their tasks and responsibilities.


              </p>
              <p>
              Our system allows you to manage your classes efficiently and effectively. You can easily track your students' progress and performance, view their attendance records, and communicate with them through our messaging system. You can also create and manage different tuition plans to suit your students' needs and preferences.
              </p> 

<a href="web_app/register" class="register-button  " >Sign Up</a>
<a href="web_app/login" class="register-button "  >Login</a>
<p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="about-text">
              <h4>What We Do?</h4>
              <p>
              We will basically provide you with an all-in-one application to record every single thing about your classes in. You will also be able to be in touch with other teachers and use their experiences.
              </p>
             <strong> Our services: </strong> <br>
              <ul>
                <li>An admin page for everything related to your classes</li>
                <li>A personal website for you as a teacher</li>
                <li>A dashboard/portal for your students</li>
                <li>A community of teachers</li>
              </ul>
              <br>
</p> <p>  <div style="margin-bottom:20px" >   <a class="button download-button text-center" href="app.apk">Download Android App</a> </div>
</p> <div>  <p> <a class="button view-button" href="web_app/login">View the Web Application</a> </div>
</p>


    

















        


        
      </div>
    </div>
    <div id="content">
      
</div>

<div id="loadedContent"></div>

<script src="js/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $("#loadContent").click(function(e) {
      e.preventDefault(); // Prevent the default link behavior

      // Make an AJAX request to load the content
      $.ajax({
        url: "join.php", // Replace "your-content-url" with the actual URL to load the content from
        method: "GET",
        success: function(response) {
          $("#loadedContent").html(response); // Insert the loaded content into the "loadedContent" div
        },
        error: function() {
          console.error("Failed to load content."); // Handle any errors that occur during the AJAX request
        }
      });
    });
  });
</script>



               
            </div>
          </div>
        </div>
