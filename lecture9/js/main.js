//ul 
const ul = document.querySelector('#ulNav'); 
//divs 
const searchDiv = document.querySelector('#searchDiv') ; 
const categoryDiv = document.querySelector('#categoryDiv'); 
const coursesDiv = document.querySelector('#coursesDiv'); 
const studentsDiv = document.querySelector('#studentsDiv');
//add buttons
const addCourseButton= document.querySelector('#addCourseButton');
const addCategoryButton= document.querySelector('#addCategoryButton');
const addStudentsButton= document.querySelector('#addStudentsButton');
//add fields divs
const  addCategoryFields= document.querySelector('#addCategoryFields');
const  addCourseFields= document.querySelector('#addCourseFields');
const  addStudentsFields= document.querySelector('#addStudentsFields');


/*FUNCTIONS*/
//---Nav Functions 
function showSelectedNav(toShow , listCount=4){
    if (!toShow) return []; 
    let option =[];
    let selectBit = 1 << (Number(toShow)-1);
    for (let i=0; i<listCount ; i++ ){
       option.push ( 1& (selectBit >> i) ? 'block' : 'none');  
    }
    return option; 

}

function navSelectedAction (selected){
    if (selected.length){
        searchDiv.style.display=selected[0];
        categoryDiv.style.display=selected[1];
        coursesDiv.style.display=selected[2];
        studentsDiv.style.display=selected[3];
    }
    addCategoryFields.style.display='none';
    addCourseFields.style.display='none';
    addStudentsFields.style.display='none';
}


//---Search Functions 
//---Category Functions
function addCategoryAction(){
    addCategoryFields.style.display='block'; 
}
//---Courses Functions 
function addCourseAction(){
    addCourseFields.style.display='block'; 
}
//---Courses Functions 
function addStudentAction(){
    addStudentsFields.style.display='block'; 
}

//---Students Functions 

//*EVENTS*/
//---Nav Events
ul.addEventListener('click' , (event)=>{
    navSelectedAction(showSelectedNav(event.target.value)); 
});

//---Category Events
addCategoryButton.addEventListener('click' , ()=>{
    addCategoryAction(); 
});
//---Course Events
addCourseButton.addEventListener('click' , ()=>{
    addCourseAction(); 
});
//---Course Events
addStudentsButton.addEventListener('click' , ()=>{
    addStudentAction(); 
});
