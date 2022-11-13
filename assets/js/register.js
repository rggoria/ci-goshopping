// Eye Function
document.getElementById("eye1").addEventListener("click",function(){
  var icon =  document.getElementById("psw1");
  if(icon.type=="password"){
    icon.type="text";
    this.classList.add("fa-eye");
    this.classList.remove("fa-eye-slash");
  }else{
    icon.type="password";
    this.classList.add("fa-eye-slash");
    this.classList.remove("fa-eye");
  }
});

document.getElementById("eye2").addEventListener("click",function(){
  var icon =  document.getElementById("psw2");
  if(icon.type=="password"){
    icon.type="text";
    this.classList.add("fa-eye");
    this.classList.remove("fa-eye-slash");
  }else{
    icon.type="password";
    this.classList.add("fa-eye-slash");
    this.classList.remove("fa-eye");
  }
});
