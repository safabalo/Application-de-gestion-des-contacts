let form = document.getElementById('forum');
let name = document.getElementById('username');
let password = document.getElementById('Password');
let confpassword = document.getElementById('confPassword');
let regemail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
let regname=  /^[a-zA-Z0-9]+$/;
let regphone = /^[0-9]+$/;
let regaddress = /^[a-zA-Z0-9\s\,\''\-]*$/;

form.addEventListener('submit', (event)=>{
   
    if(!validateform()) {
        event.preventDefault();
    }

})

function validateform(){
    let erreur = true;

    if (name.value.trim() == "") {
        document.getElementById('messagename').innerHTML = "Please fill the userName";
        erreur = false;
    }else if (name.value.match(regname)){
        document.getElementById('messagename').innerHTML = "";
      }else{
        document.getElementById('messagename').innerHTML = "User name invalid ";
        erreur = false;
    } 


    if (password.value == "") {
        document.getElementById('messagepassword').innerHTML ="Please fill the password field";
        erreur =  false;
      
    }else if (password.value == username.value) {
        document.getElementById('messagepassword').innerHTML ="Password cant'be your FirstName or LastName";
        erreur =  false;
      
    }else if ((password.value.length <=6)  ||  (password.value.length >=20)) {
        document.getElementById('messagepassword').innerHTML ="user password should be between 6 to 20 characters ";
        erreur =  false;
    }else{
        document.getElementById('messagepassword').innerHTML =" "
    }

    if (confpassword.value == "") {
        document.getElementById('messageconfPassword').innerHTML ="Enter ConfirmPassword"
        erreur =  false;    
    }else if (password.value!=confpassword.value) {
        document.getElementById('messageconfPassword').innerHTML ="Password does'nt Match"
        erreur =  false;
    }else{
        document.getElementById('messageconfPassword').innerHTML =""
      }
    
    return erreur;


}