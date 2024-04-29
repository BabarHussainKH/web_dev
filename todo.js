//   const extra = document.getElementById("input-box");
//     document.getElementById("List-container");

// function Add(){
//     const extra = document.getElementById("input-box").value;
//     const fan= document.getElementById("List-container").innerHTML=extra;

//     if(extra== ''){
//         alert("you must enter task");
//     }
//     else{
//         const newele = document.createElement("li");
//         newele.innerHTML= appendChild(fan);
//         extra=" ";
//         }
        
// }
const inputBox = document.getElementById("input-box");
const listContainer = document.getElementById("List-container");

function addTask(){
    if(inputBox.value===""){
        alert("enter task");
    }
    else{
        let li = document.createElement("li");
        li.innerHTML = inputBox.value;
        listContainer.appendChild(li);
        let span = document.createElement("span");
        span.innerHTML= "\u00d7";
        li.appendChild(span);


    }
    inputBox.value = "";

}
listContainer.addEventListener("click",function(e){
    if(e.target.tagName === "LI"){
        e.target.classList.toggle("checked");

    }
    else if (e.target.tagName === "SPAN"){
        e.target.parentElement.remove();
    }
}, false);