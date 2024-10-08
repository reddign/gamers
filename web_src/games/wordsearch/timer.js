
//(function(){

let interval=null;
window.addEventListener('load',init);

/*
This sets up the interval
*/
async function init(){
    const delay = ms => new Promise(res => setTimeout(res, ms));
    await delay(5000);
    interval=window.setInterval(updateTimer,1000);

}
/*
This Function takes the time, and reduces it by 1 unless the time is 0
*/
function updateTimer(){
    
    let timer=document.getElementById("timer");
    if(timer.value=="stop"){
        window.clearInterval(interval);
    }
    let time=timer.innerHTML;
    let timeArr=time.split(":");
    let mins=parseInt(timeArr[0]);
    let secs=parseInt(timeArr[1]);
    let totalSecs=secs+(mins*60);
    if(totalSecs<=0){
        window.clearInterval(interval);
        let buttons=document.getElementsByClassName('letterButton');
        for(let i=0;i<buttons.length;i++){
            buttons[i].removeEventListener("dblclick",removePress);
            buttons[i].removeEventListener('click',pressButton);
        }
    }
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


//})();