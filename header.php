 
    <!-- Header -->
    <div id="intro">
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <h1>Teachers' <span class="brand-heading">Tribe</span></h1>
              <p><style>
  h3 span {
    color: orange;
    position: relative;
  }

  h3 span::before {
    content: "";
    height: 30px;
    width: 2px;
    position: absolute;
    top: 50%;
    right: -8px;
    background: #bd53ed;
    transform: translateY(-45%);
    animation: blink 0.7s infinite;
  }

  h3 span.stop-blinking::before {
    animation: none;
  }

  @keyframes blink {
    50% {
      opacity: 0;
    }
  }
</style>

<h3>A lovely approach to <span></span></h3>

<script>
  const dynamicText = document.querySelector("h3 span");
  const words = ["Teaching", "learning", "your career", "education"];

  // Variables to track the position and deletion status of the word
  let wordIndex = 0;
  let charIndex = 0;
  let isDeleting = false;

  const typeEffect = () => {
    const currentWord = words[wordIndex];
    const currentChar = currentWord.substring(0, charIndex);
    dynamicText.textContent = currentChar;
    dynamicText.classList.add("stop-blinking");

    if (!isDeleting && charIndex < currentWord.length) {
      // If condition is true, type the next character
      charIndex++;
      setTimeout(typeEffect, 200);
    } else if (isDeleting && charIndex > 0) {
      // If condition is true, remove the previous character
      charIndex--;
      setTimeout(typeEffect, 100);
    } else {
      // If word is deleted then switch to the next word
      isDeleting = !isDeleting;
      dynamicText.classList.remove("stop-blinking");
      wordIndex = !isDeleting ? (wordIndex + 1) % words.length : wordIndex;
      setTimeout(typeEffect, 1200);
    }
  };

  typeEffect();
</script>
</p> 
<br>
              <a href="#about" class="btn btn-default page-scroll"
                >Learn More!</a
              >
            </div>
          </div>
        </div>
      </div>
    </div>