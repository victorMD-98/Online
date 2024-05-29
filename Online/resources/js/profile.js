addEventListener("DOMContentLoaded", (eve) => {
    backImg();
    profImg();

});

function backImg () {
    let imp1 = document.querySelector("#my-file-input");
    //console.log(imp1);
    imp1.addEventListener("change",function(event){
        const file = event.target.files[0];
        if(file){
        document.getElementById('backForm').submit();
    }})
}

function profImg () {
    let imp2 = document.querySelector("#my-file-input2");
    //console.log(imp1);
    imp2.addEventListener("change",function(event){
        const file = event.target.files[0];
        if(file){
        document.getElementById('profForm').submit();
    }})
}