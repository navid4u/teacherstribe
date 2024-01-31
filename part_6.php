
    <div id="testimonials" class="text-center">
    <div class="container">
  <div class="section-title center">
    <h2>Find an online teacher</h2>
    <hr />
    <br />
    <p>Looking for a great learning experience? Want an IELTS writing instructor to improve your score? Fancy an English Speaking class with a qualified teacher?</p>
  </div>
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="row testimonials">
      

    <div class="container" style="display: flex; justify-content: center;  align-items: center; " >
  <div class="row">
    <div class="col-lg-4 col-md-6 col-sm-12">
    <form action="teacher_search.php" method="post" id="teacher-search-form">
  <div class="form-row">
    <div class="form-group">
      <label  >Your Purpose</label>
      <input type="text" class="form-control" id="textbox" placeholder="Enter keywords: e.g. IELTS/ Writing/ Reading / ...">
    </div>
    <div class="form-group">
      <label >What Language?</label>
      <select class="form-control" name="teachlang" id="teachlang">
        <option value="English">English</option>
        <option value="Arabic">Arabic</option>
        <option value="German">German</option>
        <option value="French">French</option>
        <option value="Spanish">Spanish</option>
      </select>
    </div>
    <div class="form-group">
      <button type="submit" class="search-button">
        Search
      </button>
    </div>
  </div>
</form>
    </div>
  </div>
</div> 
<p></p>


<!-- AJAX Div -->
<div id="ajax-result"></div>



      </div>
    </div>
  </div>
</div>
    </div>


    <script>
  // Get the form element
  const form = document.getElementById('teacher-search-form');

  // Add event listener for form submission
  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form submission

    // Create and configure a new XMLHttpRequest object
    const xhr = new XMLHttpRequest();
    xhr.open('POST', form.action, true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Get the form data
    const formData = new FormData(form);

    // AJAX request
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          // Update the content of the AJAX div
          document.getElementById('ajax-result').innerHTML = xhr.responseText;
        } else {
          console.error('AJAX request failed.');
        }
      }
    };

    // Send the form data
    xhr.send(new URLSearchParams(formData));
  });
</script>






    