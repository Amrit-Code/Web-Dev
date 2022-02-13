let checkButton = document.getElementById("check").addEventListener("click", checkSame);


function checkSame(e){
    let inputOne = document.getElementById("pass1").value;
    let inputTwo = document.getElementById("pass2").value;
    if(inputOne != inputTwo ){
        e.preventDefault();
        alert("Please enter the same password");
        return false;
    }
}