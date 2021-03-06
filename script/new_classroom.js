//creates the class code from the class name
function generateClassCode(){
    var cname = document.getElementById("classname").value;
    var str = "";
    if(cname.length < 6){
        document.getElementById("error").innerHTML("Classroom name too short! It must be at least 6 characters long");
        console.log("Ciao pietro, questo e' un errore");
    }
    else {
        if (cname.search(" ") != -1) {
            str += cname.slice(0, 3);
            str += cname.slice(cname.search(" ") + 1, cname.search(" ") + 4);
        }
        else {
            if (cname.length > 16) {
                cname = cname.slice(0, 16);
            }
            str += cname;
        }
        str += Math.floor(Math.random() * 10);
        str += Math.floor(Math.random() * 10);
        while (str.search(" ") != -1) {
            str = str.replace(" ", ""); //to make sure the classcode has no spaces in it
        }
        document.getElementById("classcode").value = str;
    }
}

