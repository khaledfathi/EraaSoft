/*GLOBAL*/
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
//category section 
const requestAddCategoryButton = document.querySelector('#requestAddCategoryButton'); 
const categoryName = document.querySelector('#categoryName'); 
//to server 
const data = document.querySelector('#data'); 
var requestBody = {
    section:'' , 
    data:{},
};

/*FUNCTIONS*/
//---Nav Functions 
function showSelectedNav(toShow , listCount=4){
    if (!toShow) return []; 
    let option =[];
    let selectBit = 1 << (Number(toShow)-1);
    for (let i=0; i<listCount ; i++ ){
       option.push ( 1& (selectBit >> i) ? true : false);  
    }
    return option; 

}

function navSelectedAction (selected){
    for (let i in selected){
        (selected[i]) ? selected[i]='block' : selected[i]='none'; 
    }
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

function navSelectedStyle(selected){
    if (selected.tagName == 'LI'){
        for (let i of ul.children ){
            i.classList.remove('navSelected'); 
        }
        selected.classList.add ('navSelected'); 
    }
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
//
/***********/
postData = async (url , data)=>{
    const resp = await fetch(url , {
        method : 'POST', 
        credenital : 'same-origin', 
        headers : {
            'Content-Type': 'application/json'
        },
        body : JSON.stringify(data)
    });
    try{
        const resData = await resp.text(); 
        return resData; 
    }catch (error){
        console.log('ERROR : ' , error); 

    }
}


//*EVENTS*/
//---OnLoad Events
window.addEventListener('load', ()=>{
    requestBody['section']='onload'; 
    postData('db.php' , requestBody).then ((response)=>{
        console.log(response); 
    }); 
}); 


//---Nav Events
ul.addEventListener('click' , (event)=>{
    navSelectedAction(showSelectedNav(event.target.value));
    navSelectedStyle(event.target); 
});

//---Category Events
addCategoryButton.addEventListener('click' , ()=>{
    addCategoryAction(); 
});

requestAddCategoryButton.addEventListener('click', ()=>{
//aaaaaaaaaaaaaaaa
    //reques 
    requestBody.section='category'; 
    requestBody.data.action='create'; 
    requestBody.data.categoryName= categoryName.value ; 
    //response
    postData('db.php' , requestBody).then((response)=>{
        response = JSON.parse(response); 
        if (response.state){
            alert (response.data.msg); 
            addCategoryFields.style.display='none';
        }else{
            alert (response.data.msg); 
        }

    }); 
})

//---Course Events
addCourseButton.addEventListener('click' , ()=>{
    addCourseAction(); 
});
//---Students Events
addStudentsButton.addEventListener('click' , ()=>{
    addStudentAction(); 
});

