<!DOCTYPE html>
<html>
<head>
  <title>Lesson Plan Form</title>
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
    <h2>TTEP Teachers' assistant</h2>
 <h3> Lesson Plan Generator </h3>
   
</p>
    <form id="form" method="post" action="/web_app/gpt/engine/lesson_planner_db.php">
      <div class="form-group">
        <label for="listbox1">Select Topic:</label>
        <select id="listbox1" name="listbox1">
          <option value="i want to teach Grammar">Grammar</option>
          <option value="i want to teach Vocabulary">Vocabulary</option>
          <option value="i want to teach Listening">Listening</option>
          <option value="i want to teach Reading">Reading</option>
          <option value="i want to teach Writing">Writing</option>
          <option value="i want to teach Pronunciation">Pronunciation</option>
          <option value="i want to teach Speaking">Speaking</option>
          <option value="i want to teach A point in English">A point in English</option>
        </select>
      </div>
      <div class="form-group">
        <label for="listbox2">Select Level:</label>
        <select id="listbox2" name="listbox2">
          <option value="Absolute beginner">Absolute beginner</option>
          <option value=" and the level of my students is Elementary">Elementary</option>
          <option value=" and the level of my students is Pre-intermediate">Pre-intermediate</option>
          <option value=" and the level of my students is Intermediate">Intermediate</option>
          <option value=" and the level of my students is Upper-intermediate">Upper-intermediate</option>
          <option value=" and the level of my students is Advanced">Advanced</option>
        </select>
      </div>
      <div class="form-group">
        <label>How much time do you have to teach this?</label>
        <div class="radio-group">
          <input type="radio" id="radio1" name="radio" value=" i have 5 minutes">
          <label for="radio1">5 minutes</label>
          <input type="radio" id="radio2" name="radio" value=" i have 10 minutes">
          <label for="radio2">10 minutes</label>
          <input type="radio" id="radio3" name="radio" value=" i have 15 minutes">
          <label for="radio3">15 minutes</label>
          <input type="radio" id="radio4" name="radio" value=" i have 20 minutes">
          <label for="radio4">20 minutes</label>
          <input type="radio" id="radio5" name="radio" value=" i have 25 minutes">
          <label for="radio5">25 minutes</label>
          <input type="radio" id="radio6" name="radio" value=" i have 30 minutes">
          <label for="radio6">30 minutes</label>
          <input type="radio" id="radio7" name="radio" value=" i have 35 minutes">
          <label for="radio7">35 minutes</label>
          <input type="radio" id="radio8" name="radio" value=" i have 40 minutes">
          <label for="radio8">40 minutes</label>
          <input type="radio" id="radio9" name="radio" value=" i have 45 minutes">
          <label for="radio9">45 minutes</label>
          <input type="radio" id="radio10" name="radio" value=" i have 50 minutes">
          <label for="radio10">50 minutes</label>
          <input type="radio" id="radio11" name="radio" value=" i have 60 minutes">
          <label for="radio11">60 minutes</label>
        </div>
      </div>
      <div class="form-group">
        <br>
      <label>What are the key concepts which you want to teach?</label>

	  
       <input type="text" id="textbox3" name="textbox3" placeholder="Textbox 2" hidden value=". This lesson plan should include these/this concept(s): "><br>

  <input type="text" id="textbox4" name="textbox4" placeholder="For example: different ways of looking, a celebtrity lifestyle, parts of body, etc."><br>
  <input type="text" id="textbox2" name="textbox2" value="please include details of what i should do and also bring examples. this html file should also have colors and the table should be neat. " placeholder="Textbox 3" hidden><br>
  <input type="text" id="textbox1" name="textbox1" placeholder="Textbox 4" value="i want a lesson plan for teaching this in my class.
this lesson plan should be in the form of a table (formatted in html) and includes 4 columns: time,activity, objective, example sentences, materials. please include details of what i should do and also bring examples. this html file should also have colors and the table should be neat. Also please put an h1 title above the page which is centered saying: Lesson Plan. " hidden>
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






