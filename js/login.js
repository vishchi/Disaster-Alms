var forgotlink=document.getElementById('forgotlink');
var loginlink=document.getElementById('loginlink');
var loginsection=document.getElementById('login');
var forgotsection=document.getElementById('forgot');
forgotlink.onclick=function()
{
    loginsection.style.display="none";
    forgotsection.style.display="block";
    
};
loginlink.onclick=function()
{
    loginsection.style.display="block";
    forgotsection.style.display="none";
};