/*
const appState = {
    easyBoard: [
        ['', '', '', '2', ''],
        ['', '1', '', '', ''],
        ['', '', '2', '', ''],
        ['3', '', '', '3', ''],
        ['1', '', '', '', ''],
    ],
    mediumBoard: [
        ['2', '', '', '9', '', '', '', '5', ''],
        ['1', '', '', '8', '', '11', '', '', '5'],
        ['', '2', '', '', '6', '', '7', '', ''],
        ['', '', '', '', '', '11', '', '10', ''],
        ['', '', '', '7', '', '', '', '', ''],
        ['', '', '', '4', '', '', '', '', ''],
        ['', '', '', '', '', '', '', '3', '6'],
        ['', '9', '', '4', '8', '', '', '', ''],
        ['', '1', '', '', '', '', '', '10', '3'],
    ],
    hardBoard: [
        ['1', '', '', '', '3', '', '5', '', '2'],
        ['', '', '', '', '', '', '8', '5', ''],
        ['7', '4', '', '6', '', '', '', '', ''],
        ['', '', '', '', '', '', '1', '', ''],
        ['', '', '', '', '', '', '', '', '2'],
        ['', '', '4', '', '', '', '', '', ''],
        ['', '', '', '', '', '', '', '', ''],
        ['', '7', '', '', '', '', '3', '', ''],
        ['', '', '', '6', '', '', '', '', '8']
        
        
    ]
    //2 min dey.Bhosri ke bol bhi dei abay microphone set nahi hai mera.Tu gand mra le.
}; // han mein restart krta hu vs code. aata hu.
//let clone = myArray.slice(0);


function init(level) 
{   
    
  //  window.alert(level);
    //main.abort();
    let x = level;
    //x.toString();
    x = x.replace(/\s+/g, '');
    //window.alert((100 + 23).toString() + x.toString() + (100 + 23).toString());
    switch(x){
        case 'easy':
                
                
                main(appState.easyBoard);
                break;
        case 'medium':
            main(appState.mediumBoard);
            break;
        case 'hard':
            main(appState.hardBoard);
            break;
        default: return false;
    }
    
};

*/



function getUrlVars() {
    var vars = {};
    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
        vars[key] = value;
    });
    return vars;
}




function win() {
    var params = getUrlVars();
    // console.log('entered win()');
    // console.log(params);
    var http = new XMLHttpRequest();
    var url = 'level_controller.php?count=1&level='+params['id'];//add here
    http.open('GET', url, true);

    //Send the proper header information along with the request

    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
           // console.log(http.responseText);
        }
    }
    http.send();
}

const appState = {
    easyBoard: [
        ['', '', '', '2', ''],
        ['', '1', '', '', ''],
        ['', '', '2', '', ''],
        ['3', '', '', '3', ''],
        ['1', '', '', '', ''],
    ]
};
let Ecopy = [];
let match_cases = 0;
let met = false;

function for_trial(){
    Ecopy = []; //ch
    match_cases = 0;
    main(appState.easyBoard);
    //history.go(0)
    //location.replace("index.php");
}


function load_save(string_save) {
    var str = string_save.id;
    var res = str.split(" ");
     var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                 // document.getElementById("txtHint").innerHTML = this.responseText;
                 y_load = JSON.parse(this.responseText);
                 load_game_save(y_load,res[2]);
            }
        };
        xmlhttp.open("GET", "load_save.php?time=" + res[0] + "&date=" + res[1] + "&name=" + res[3] + "&case="+res[2], true);
        xmlhttp.send();
    // console.log(res[3]);
}

function clicked_save() {
    var par = getUrlVars();
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("txtHint").innerHTML = this.responseText;
               // console.log(this.responseText);
            }
        };
        xmlhttp.open("GET", "state_controller.php?data=" + JSON.stringify(Ecopy) + "&name=" + par['id'] + "&case=" + match_cases, true);
        xmlhttp.send();
        //console.log(JSON.stringify(Ecopy));
    // console.log('Hello');
}

function load_game_save(x_load,cases_load){
    match_cases = cases_load;
    Ecopy = x_load;
    met = false;
    //console.log(match_cases);
    main(x_load);
    console.log("What you feared is true");
}

function init(x){
    Ecopy = []; //check if the saved stated work perfectly with these two initializers
    match_cases = 0;
    met = false;
    clicked_save();
    main(x);
 // return;
    
}



function main(Board){

    
console.log(match_cases);
let max = Board[0][0].substring(0,2);
function _loadLevel(array) {
   // console.log('Hello');
    let grid =   document.getElementById('grid'); //Pointer to html element

    grid.innerHTML = ''; // Reset everything

    let html = `<tbody>`;

    for (let i = 0; i < array.length; i++) {
        html += "<tr>";
        for (let j = 0; j < array[i].length; j++) {
            
            let currentBlock = array[i][j]; // ['3 right', '', 'left right', '3 left', ''],
            if (currentBlock.length == 0)array[i][j] += '$'; //adding dollar sign to make it a line

        //currentblock.attribute has some bugs which need assistance -> SOLVED
         
            {
                if(_isLine(i,j))html += `<td class ="color${currentBlock.substring(1,3)} ${currentBlock.substring(3)}" data-row="${i}" data-column="${j}"></td>`;
               else{
                
                html += `<td class="color${currentBlock.substring(0,2)} ${currentBlock.substring(2)}"  data-row="${i}" data-column="${j}">${currentBlock.substring(0,2)}</td>`;
                if(max < Board[i][j].substring(0,2))max = currentBlock.substring(0,2);
            }
            }      
        }        
         html += "</tr>"
    }

    html += "</tbody>";


    grid.innerHTML = html;
   
};
let temp1,temp2;

function _isNeighbour (i,j,prev_i,prev_j) {
    
    x = i - prev_i;
    y = j- prev_j;
    if (x === -1 && y === 0) {
        Board[i][j] += ' bottom';
        Board[prev_i][prev_j] += ' top';
      }
    else if (x === 1 && y === 0) {
        Board[i][j] += ' top';
        Board[prev_i][prev_j] += ' bottom';
    }
    else if (x === 0 && y === -1) {
        Board[i][j] += ' right';
        Board[prev_i][prev_j] += ' left';
    }
    else if (x === 0 && y === 1) {
        Board[i][j] += ' left';
        Board[prev_i][prev_j] += ' right';
    }
//}
    
   
 
}
function _isLine(x,y){
   if(Board[x][y].includes('$') ){ 
      return true;
    }
    else return false;
}
function is_empty(x,y){  //  Board[x][y].includes('$')) || 
    if(Board[x][y].length > 3 ){ //cheking if its empty
        return false;                                                      // so that a line can cross 
    }else return true;
}


let mouse_down = false;
let prev_i = 0, prev_j = 0;
let lastBlock = 0;
let first = true;
let matches = false;


function is_sameNum(x,y){
    if(Board[x][y].includes('$'))return true;//Checking if line is passing through an empty block
    else if(lastBlock == Board[x][y].substring(0,2) && !(first)){   //Checking if line matches the same number
       matches = true;
        return true;
    }
    else return false;
}

grid.addEventListener('mousedown', function (event) {
    // Get coordinates of the block when 
    const i = +event.target.getAttribute('data-row');
    const j = +event.target.getAttribute('data-column');

    // Validity Flag
    if(_isLine(i,j) || Board[i][j].length > 3 )return;
    
    // Storing the mouse down block
    lastBlock = Board[i][j];
    
    // Make a copy of the board
    Ecopy = JSON.parse(JSON.stringify(Board));    
    
    first = true;
    matches = false;
   // console.log("Where you pressed!");
    mouse_down = true;
    prev_i = i, prev_j = j; // so if started from the neighbor block, it does not join
});
grid.addEventListener('mousemove', function (event) {
    // Get coordinates of the block                                                                                                                                                                                                                                                                                                                                 
    const i = +event.target.getAttribute('data-row');
    const j = +event.target.getAttribute('data-column');
    if(mouse_down){     //The line does not start after jump
        if(! ( (i-prev_i)<2 && (i-prev_i)>-2 && (prev_j-j)>-2 && (prev_j-j)<2 ) ){
        
        return;
    }
    else if( !( (i-prev_i)==0 || (prev_j-j)==0))return;  //so the line should not start from diagonal after JUMP

}
//create a condition so it cannnot cross a number or another line

    if(mouse_down  && is_empty(i,j)  &&  is_sameNum(i,j)){  //is_same -> when matches same number it stops
     //   console.log("Where you moved!");
        if((prev_i != i || prev_j != j)){
            if(_isLine(i,j))Board[i][j] += lastBlock;  //adds number to the empty block
               
            _isNeighbour(i,j,prev_i,prev_j);    //adds color attribites to the empty block
            
           // console.log(Board[i][j]);
               first = false;   // after the first time, whenever it  matches the same number it will stop
               
                _loadLevel(Board);
            if(matches){
                mouse_down=false;
                console.log("==");
                console.log(max);
                console.log("==");
                console.log(match_cases);
                match_cases++;  //Counting the total lines drawn
            }
        }
        prev_i = i;
        prev_j = j;
        
       }
      
});

grid.addEventListener('mouseup', function (event) {
    // Get coordinates of the block
    const i = +event.target.getAttribute('data-row');
    const j = +event.target.getAttribute('data-column');
   
    
    if(!matches){
      //  console.log("Line up");
        Board = JSON.parse(JSON.stringify(Ecopy));
          _loadLevel(Board);
          console.log(Ecopy);
       
    }else Ecopy = JSON.parse(JSON.stringify(Board)); //Delete if program is not functioning properly
    
    
     if(match_cases == max || match_cases > max ){
        if(met == false){ 
        window.alert("Continue to Main Menu");
        win();
        met = true;
        }
        
       // let x = 1;
       // return true;
//  ADD STUDD HERE
   // let levels_json = loadJSON('/levels_data.json');
    //levelInfo = JSON.parse(response);
         
   // return;
    
   location.replace("levels.php");
      // history.go(0); //uncomment this after the project debugging

    }
  
   

    mouse_down = false;  
    
});

_loadLevel(Board);
}
