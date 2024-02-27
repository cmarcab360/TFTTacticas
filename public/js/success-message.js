let x = document.getElementById("success");

//Si existe el elemento con id success, se ejecuta el setTimeout
if(x != null){
    setTimeout(() => {
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }, 3000);
}

