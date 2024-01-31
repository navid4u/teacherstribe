<!DOCTYPE html>
<html>
<head>
  <title>Teachers' assistant (free discussion classes)</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <style>
    body {
      background-image: url("/web_app/assets/img/2.jpg");
       background-repeat: no-repeat; /
      font-family: Arial, sans-serif;
      margin: 20;
      padding: 20;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .card {
      background-color: #ffffff;
      opacity: 0.5;
       border-radius: 30px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 30px;
      width: 60%;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }

    .form-group input[type="text"],
    .form-group select {
      width: 90%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      outline: none;
    }

    .form-group textarea {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      outline: none;
      resize: vertical;
    }

    .btn {
      background-color: #007bff;
      border: none;
      color: #ffffff;
      padding: 10px 20px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    .radio-group {
      display: flex;
      flex-wrap: wrap;
    }

    .radio-group input[type="radio"],
    .radio-group label {
      width: 15%;
    }

    .radio-group label {
      display: block;
    }
  </style>
</head>
<body>

  <div class="card">
  <p>
 <h2> TTEP Teachers' Assistant </h2>
 <h3> Materials generator: for a free discussion class </h3>
   
</p>
    <form id="form" method="post" action="/web_app/gpt/engine/discussion_db.php">
      <div class="form-group">
        <label for="listbox1">The purpose of this discussion session is...</label>
        <select id="listbox1" name="listbox1">
          <option value="i want to have a list of questions for a free discussion English class, it is For students to have a free discussion ">For students to have a free discussion </option>
          <option value="i want to have a list of questions for a free discussion English  class, it is To teach certain grammatical points ">To teach certain grammatical points</option>
          <option value="i want to have a list of questions for a free discussion English class, it is To teach vocabulary">To teach vocabulary</option>
          <option value="i want to have a list of questions for a free discussion English class, it is For students to have a free discussion and teach some words and grammar ">All of above</option>
 
        </select>
      </div>
      <div class="form-group">
        <label for="listbox2">Select Level of the students:</label>
        <select id="listbox2" name="listbox2">
   
          <option value=" and the level of my students is Pre-intermediate">Pre-intermediate</option>
          <option value=" and the level of my students is Intermediate">Intermediate</option>
          <option value=" and the level of my students is Upper-intermediate">Upper-intermediate</option>
          <option value=" and the level of my students is Advanced">Advanced</option>
        </select>
      </div>
      <div class="form-group">
        <label>How much time do you have to teach this?</label>
        <div class="radio-group">
          <input type="radio" id="radio1" name="radio" value=" i have 30 minutes">
          <label for="radio1">30 minutes</label>
          <input type="radio" id="radio2" name="radio" value=" i have 45 minutes">
          <label for="radio2">45 minutes</label>
          <input type="radio" id="radio3" name="radio" value=" i have 60 minutes">
          <label for="radio3">60 minutes</label>
          <input type="radio" id="radio4" name="radio" value=" i have 90 minutes">
          <label for="radio4">90 minutes</label>

          
 
        </div>
      </div>
      <div class="form-group">
        <br>

        <label>What are the key concepts which you want to have a discussion about?</label>

       <input type="text" id="textbox3" name="textbox3" placeholder="Textbox 2"  hidden  value="the questions should be about this/these topic(s)"><br>

  <input type="text" id="textbox4" name="textbox4" placeholder="For example: Freedom of scpeech, Teaching youngesters, university education, kids upbringing, etc."><br>
  <input type="text" id="textbox2" name="textbox2" value="put the questions in HTML format with colors tables and everything. the html page should have 4cm of margin from each side, it the page which is mafe should look like an a4 paper which is centered and has simole line boarders.  please make the page appearance neat and ready for prin." placeholder="Textbox 3" hidden><br>
  <input type="text" id="textbox1" name="textbox1" placeholder="Textbox 4" value="I want a list of questions which can be asked and answered in the class. also after a list of 10 questions give me 2 pair work activities which the students can use with the instruction of the teacher" hidden>
  <br>
      </div>
      <div class="form-group">
        <input id="btn-get" class="btn" type="submit" value="Click">
      </div>
    </form>
  </div>

  <p>
    <br>
</p>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>






