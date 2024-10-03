"use strict"

window.addEventListener('load',init);
let buttonPressed=null;
let wordBank=[];
let buttons2D=[];

function init(){
    let letterButtons=document.getElementsByClassName("letterButton");
    let rows= document.getElementsByClassName("row");
    for(let i=0;i<rows.length;i++){
        buttons2D[i] =rows[i].getElementsByClassName("letterButton");
    }
    //console.log(buttons2D);

    for(let i=0;i<letterButtons.length;i++){
        letterButtons[i].addEventListener('click',pressButton);
        letterButtons[i].addEventListener("dblclick",removePress);
    }
    let bankObj=document.getElementsByClassName("wordBank");
    for(let i=0;i<bankObj.length;i++){
        wordBank[i]=bankObj[i].innerText;
    }
}

function pressButton(){
    
    if(buttonPressed==null | buttonPressed==this){
        this.classList.add("activeButton");
        buttonPressed=this;
    }
    else{
        if(this.value==buttonPressed.value & wordBank.includes(this.value)){
            document.getElementById(this.value).classList.add("found");
            this.classList.add("foundWord");
            buttonPressed.classList.add("foundWord");
            let win=1;
            for(let i=0;i<wordBank.length;i++){
                let wBank=document.getElementsByClassName("wordBank");
                if(!(wBank[i].classList.contains("found"))){
                    win=0
                }
            }
            if(win){
                for(let i=0;i<buttons2D.length;i++){
                    for(let j=0;j<buttons2D[i].length;j++){
                        buttons2D[i][j].removeEventListener('click',pressButton);
                        buttons2D[i][j].removeEventListener("dblclick",removePress);
                    }
                }
                document.getElementById("title").innerHTML="You Win";
                document.getElementById('timer').value="stop";

            }
            /*
            let thisRow;
            let thisCol;
            for(let i=0;i<buttons2D.length;i++){
                if(buttons2D[i].includes(this)){
                    thisRow=i;
                    thisCol=buttons2D[i].includes(this);
                    break;
                }
            }
            let pressRow;
            let pressCol;
            for(let i=0;i<buttons2D.length;i++){
                if(buttons2D[i].includes(this)){
                    pressRow=i;
                    pressCol=buttons2D[i].includes(this);
                    break;
                }
            }
            let activeButton;
            if(thisRow==pressRow){
                if(thisCol>pressCol){
                    
                    while(activeButton!=this){

                    }

                }
            }
            else if(thisCol==pressCol){

            }*/

        }
        
        buttonPressed.classList.remove("activeButton");
        buttonPressed=null;
    }

}

function removePress(){
    if(this.classList.contains("activeButton")){
        this.classList.remove("activeButton");
        buttonPressed=null;
    }
}

