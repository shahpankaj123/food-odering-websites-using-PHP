function validateform(){
    var returnval=true;
    let user = document.forms['myform']['username'].value;
    let pass=document.forms['myform']['password'].value;

    if(user.length<5)
    {
        document.getElementById('error1').innerHTML='*-Username is too Short';
        returnval=false;
    }
    if(pass.length<5)
    {
        document.getElementById('error2').innerHTML='*-Password is too Short';
        returnval=false;
    }
    if(pass.length>15)
    {
        document.getElementById('error2').innerHTML='*-Password is too long';
        returnval=false;
    }
    if(user.length>15)
    {
        document.getElementById('error1').innerHTML='*-Username is too long';
        returnval=false;
    }
    if(!hasNumber(pass)){
        document.getElementById('error2').innerHTML='*-Password must contain Number too';
        returnval=false;

    }
    function hasNumber(str) {
        return /\d/.test(str);
    }


    
    return returnval;
   
}