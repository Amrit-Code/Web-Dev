postB = document.getElementById("post").addEventListener("click", checkentry);
resetB = document.getElementById("reset").addEventListener("click",clearFeilds);
function checkentry (e){

    let field1 = document.getElementById("title");
    let field2 = document.getElementById("entry");

    if(field1.value == "" && field2.value == ""){
        e.preventDefault();
        field1.style.border = "1px solid red";
        field2.style.border = "1px solid red";
    }else if(field1.value == ""){
        e.preventDefault();
        field1.style.border = "1px solid red";
        field2.style.border = "none";
    }else if(field2.value == ""){
        e.preventDefault();
        field2.style.border = "1px solid red";
        field1.style.border = "none";
    }
}

function clearFeilds(e){
    e.preventDefault();
    let field1 = document.getElementById("title");
    let field2 = document.getElementById("entry");
    field1.value = "";
    field2.value = "";
}