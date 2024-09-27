const studentPos = new Vector2(16 *6, 16 *5);
const input = new Input();
const update = () =>{
    if(input.direction == DOWN){
        studentPos.y += 1;
        studentPos.frame = 0;
    }
    if(input.direction == UP){
        studentPos.y -= 1;
        studentPos.frame = 6;
    }
    if(input.direction == LEFT){
        studentPos.y += 1;
        studentPos.frame = 9;
    }
    if(input.direction == RIGHT){
        studentPos.y += 1;
        studentPos.frame = 3;
    }
}