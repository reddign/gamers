"use strict"

window.addEventListener('load',init);

let buttonPressed=null;
let wordBank=[];
let letterButtons;


function init(){
    letterButtons=document.getElementsByClassName("letterButton");
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
            
        }
        //logic to see if it is success.
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

