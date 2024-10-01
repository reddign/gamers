
//(function(){

let interval=null;
window.addEventListener('load',init);

async function init(){
    const delay = ms => new Promise(res => setTimeout(res, ms));
    await delay(5000);
    interval=window.setInterval(updateTimer,1000);

}

function updateTimer(){
    let timer=document.getElementById("timer");
    let time=timer.innerHTML;
    let timeArr=time.split(":");
    let mins=parseInt(timeArr[0]);
    let secs=parseInt(timeArr[1]);
    let totalSecs=secs+(mins*60);
    if(totalSecs<=0)
        window.clearInterval(interval);
    else{
        totalSecs-=1;
    }
    if(totalSecs%60<10){
        timer.innerHTML=(Math.floor(totalSecs/60))+":0"+(totalSecs%60);
    }
    else{
        timer.innerHTML=(Math.floor(totalSecs/60))+":"+(totalSecs%60);
    }
}

function stopTimer(){
    window.clearInterval(interval);
}

//})();