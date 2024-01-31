<!DOCTYPE html>
<html>
<head>
  <title>Teachers' assistant (Word assistant)</title>
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
 <h2> TTEP Teachers' Word Assistant </h2>
 <h3> Vocabulary Builder! </h3>
   
</p>
    <form id="form" method="post" action="/web_app/gpt/engine/word_assistant_db.php">
      <div class="form-group">
        <label for="listbox1">I want information/examples on</label>
        <select id="listbox1" name="listbox1">
          <option value="i want to have a list of Synonyms and antanyms ">Synonyms and antanyms </option>
          <option value="i want to have an explanation of the etymology and word/expression origin ">Etymology and word/expression origin</option>
          <option value="i want to have a simple definition and examples understandable by students of lower profeciency">A simple definition and examples understandable by students of lower profeciency</option>
          <option value="i want to have a list of Collocations and phrases in which the word/expression is used ">Collocations and phrases in which the word/expression is used</option>
          <option value="i want to have a  list of related words in terms of meaning and an explanation of the differences ">A  list of related words in terms of meaning and an explanation of the differences</option>
          <option value="i want to have  a complete list of synonyms, antonyms, collocations and examples ">A complete list of synonyms, antonyms, collocations and examples</option>
          

        </select>
      </div>
      <div class="form-group" hidden>
        <label for="listbox2">Select Level of the students:</label>
        <select id="listbox2" name="listbox2">
   
          <option value=" and the level of my students is Pre-intermediate. ">Pre-intermediate</option>
          <option value=" and the level of my students is Intermediate. ">Intermediate</option>
          <option value=" and the level of my students is Upper-intermediate. ">Upper-intermediate</option>
          <option value=" please give this information like a dictionary to me. The <h1> title is the exact word itself." selected>Advanced</option>
        </select>
      </div>
      <div class="form-group" hidden>
        <label>How much time do you have to teach this?</label>
        <div class="radio-group">
          <input type="radio" id="radio1" name="radio" value=" .">
          <label for="radio1"> </label>
          

          
 
        </div>
      </div>
      <div class="form-group">
        <br>

        <label>Please type the word, expression or phrase here! </label>

       <input type="text" id="textbox3" name="textbox3" placeholder="Textbox 2"  hidden  value="This information should be about this word: "><br>

  <input type="text" id="textbox4" name="textbox4" placeholder="For example: Put up with..."><br>
  <input type="text" id="textbox2" name="textbox2" value="." placeholder="Textbox 3" hidden><br>
  <input type="text" id="textbox1" name="textbox1" placeholder="Textbox 4" value=" I want this  to be in a neat html format and be presented in a way that is suitable for printing." hidden>
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






