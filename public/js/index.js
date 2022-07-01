const formSelect = document.getElementById('form-selector')
const myForms = document.getElementById('my-forms');
const size = document.getElementById("size");
const weight = document.getElementById("weight");
const dimensions = document.getElementById("dimensions");


formSelect.oninput = () => {
    myForms.className = `f-${formSelect.value}`
    if(myForms.className === `f-size` ){
        weight.remove();
        dimensions.remove();
        myForms.style.display = "block"
        myForms.appendChild(size)
    }else if(myForms.className === `f-weight`){
        size.remove();
        dimensions.remove();
        weight.style.display = "block"
        myForms.appendChild(weight);
    }else{
        size.remove();
        weight.remove();
        dimensions.style.display = "block"
        myForms.appendChild(dimensions);
    }
}

/*
const btn = document.getElementById('btn');
btn.addEventListener('click',()=>{
    console.log('clicked');
})
*/

