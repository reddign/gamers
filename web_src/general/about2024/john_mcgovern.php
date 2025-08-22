<body>
<?php
    $pageName = "John McGovern's Webpage";
    require "../../includes/functions.php";
    require "../../includes/head.php";
    require "../../includes/navbar.php";
?>
<div class="buttons">
    <a href="SEteam2024.php"><button class="button button2">Go Back!</button></a> 
</div>
<main>

    <section id="John McGovern's Bio">
        <div class="bio-title">John McGovern</div>
        <br>
        <div id="bio">John McGovern is majoring in Computer Science and has a minor in Graphic Design. He plans to graduate in 2026.</div>
        <canvas style="background-color: #000000;" height="600" width="800">
        </canvas>
        <script>

const canvas = document.querySelector("canvas");
const context = canvas.getContext("2d");

let x=200;
let y=200;
let r=20;
let paddlew=10;
let paddleh=200;
let FPS=120;
let xvelocity=1;
let yvelocity=1;

function ball(){
    context.fillStyle = "White";
    context.beginPath();
    context.arc(x,y,r,0,2*Math.PI);
    context.closePath();
    context.fill();
}
function clear(){
    context.fillStyle="Black";
    context.fillRect(0,0,canvas.width,canvas.height);
}

function updateBall(){
    x=x+(2*xvelocity);
    y=y+(2*yvelocity);
    if(x+r>canvas.width){
        xvelocity *= -1;
        score+=1;
    }
    else if(x-r<0){
        xvelocity *= -1;
        lives-=1;
    }
    if(y+r>canvas.height || y-r<0){
        yvelocity *= -1;
    }
}

function animate(){
    clear();
    ball();

    updateBall();
}
window.setInterval(animate,1000/FPS);
        </script>
    </section>
</main>
</body>
<?php
    require "../../includes/footer.php";
?>
