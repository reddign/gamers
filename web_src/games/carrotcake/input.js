const studentPos = {
    x: 16 * 6,
    y: 16 * 5,
    frame: 0
};
const input = new Input();

const update = () =>{
    if(input.direction == DOWN){
        studentPos.y += 1;
        studentPos.frame = 0; //frame for the down direction
    }
    if(input.direction == UP){
        studentPos.y -= 1;
        studentPos.frame = 6; //frame for up direction
    }
    if(input.direction == LEFT){
        studentPos.x -= 1; //should affect the x-coordinate (fingers crossed)
        studentPos.frame = 9; //frame for left direction
    }
    if(input.direction == RIGHT){
        studentPos.x += 1;
        studentPos.frame = 3; //frame for the right direction
    }
};