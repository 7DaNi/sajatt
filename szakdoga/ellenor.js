function ellenoriz() {



var error_4 = 'Teljes nevet meg kell adni!';
var error_8 = 'Felhasználó nevet meg kell adni!';
var error_5 = 'Jelszót meg kell adni!';
var error_6 = 'Jelszót másodszor is meg kell adni!';
var error_9 = 'Telefonszámot meg kell adni!';
var error_1 = 'E-mail címet meg kell adni!';
var error_7 = 'A jelszó minimum 4 karakter legyen!';
var error_3 = 'A két jelszó nem egyezik!';
var error_2 = 'Hibás e-mail cím!';
var error_10 = 'Hibás telefonszám, kérem körzetszámmal együtt adja meg. pl.: 1 233-4444';

if (document.reg.nev.value==''){
document.reg.nev.value="";
alert(error_4);
document.reg.nev.focus();
return false;
}
if (document.reg.user.value==''){
document.reg.user.value="";
alert(error_8);
document.reg.user.focus();
return false;
}
if (document.reg.pw1.value==''){
document.reg.pw1.value="";
alert(error_5);
document.reg.pw1.focus();
return false;
}
if (document.reg.pw2.value==''){
document.reg.pw2.value="";
alert(error_6);
document.reg.pw2.focus();
return false;
}
if (document.reg.telszam.value==''){
document.reg.telszam.value="";
alert(error_9);
document.reg.telszam.focus();
return false;
}
if (document.reg.email.value==''){
document.reg.email.value="";
alert(error_1);
document.reg.email.focus();
return false;
}
if (document.reg.pw1.value==document.reg.pw2.value){
var text2=document.reg.pw1.value; 
var text3=document.reg.pw2.value;

if ((text2.length<=3)){
document.reg.pw1.value="";
alert(error_7);
document.reg.pw1.focus();
return false;
}
if ((text3.length<=3)){
document.reg.pw2.value="";
alert(error_7);
document.reg.pw2.focus();
return false;
}}else{
document.reg.pw1.value="";
alert(error_3);
document.reg.pw1.focus();
return false;
}
if ((document.reg.email.value.indexOf('.')== -1) || 
(document.reg.email.value.indexOf('@')<1)){
document.reg.email.value="";
alert(error_2);
document.reg.email.focus();
return false;
}
if ((document.reg.telszam.value.length<=8)){
document.reg.telszam.value="";
alert(error_10);
document.reg.telszam.focus();
return false;
}}