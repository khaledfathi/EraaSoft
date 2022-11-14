const img = document.querySelector('#img'); 
const photo = document.querySelector('#photo'); 


photo.onchange = ()=>{
    img.src = URL.createObjectURL(photo.files[0]);
}