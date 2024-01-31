 
 
 <style>
 .fade-in {
    opacity: 0;
    animation: fadeIn 2.5s ease-in-out forwards;
}

.scroll-animation {
    opacity: 0;  /* Removed initial opacity */
    transform: translateY(20px);
    transition: opacity 2s ease-in-out, transform 2s ease-in-out;
    
}
@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}
</style>

<?php 

include("config.php"); 
include("nav.php");

?>
<span id="first-part" class="fade-in">

<?php 
 include("header.php"); 
 ?> 
 </span>
 <span id="second-part" class="scroll-animation">
 <?php 
include("part_1.php");
?> 
</span>
<?php
 include("part_3.php");
 include("part_7.php");

include("part_4.php");
//include("part_5.php");
include("part_6.php");
 
include("footer.php");

?>
  
 <script>
 document.addEventListener("DOMContentLoaded", function () {
    // Add scroll event listener
    window.addEventListener("scroll", function () {
        // Calculate the position of the second part
        const secondPart = document.getElementById("second-part");
        const position = secondPart.getBoundingClientRect().top;

        // Check if the second part is in the viewport
        if (position < window.innerHeight) {
            secondPart.classList.add("scroll-animation");
            secondPart.style.opacity = 1; // Set opacity to 1 when the class is added
        }
    });

    // Trigger the fade-in animation for the first part on page load
    const firstPart = document.getElementById("first-part");
    firstPart.classList.add("fade-in");
});

</script>