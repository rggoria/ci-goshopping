// Verify Button Disabled
function verify(){
    email = document.getElementById("verify-code");
    submit = document.getElementById('verify-submit');
    if(email.value===""){
        submit.disabled = true;
    } else { 
        submit.disabled = false;
    }
}