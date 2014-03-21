// JavaScript Document
function ellenoriz() {
//var error_2 = 'Legyen szíves e-mail címet megadni!\n\n';
//var error_3 = 'Érvényes E-mai címet kell adnia!\n\n';
//var error_4 = 'A jelszót meg kell adnia!\n\n';
//var error_5 = 'A jelszót másodszor is meg kell adnia, a hibaszűrés érdekében!\n\n';
//var error_6 = 'Maximum 8 és minimum 5 db., kisbetűs,ékezet nélküli karaktert használjon legyenszíves!\n\n';
//var error_7 = 'Nem egyeznek a jelszavak!\n\n';
/*if(elsőhiba){
	$error = $error."első_hibaüzenet";
}

if(másodikhiba){
	$error = $error."második_hibaüzenet";
}

if(harmadikhiba)

stb...

alert($error);

ha egyik if sem teljesül, akkor nincs hiba, így az alertnek akkor nem szabad lefutnia

az if sorozat előtt hozod létre az $error változót, és egy üres stringre inicializálod

$error = "";

aztán az alertet egy ifbe rakod, melynek feltétele ez: $error === ""

vagyis ennek tagadása

csak akkor fusson le az alert, ha az $error    nem egy üres string*/
var error='';
if (document.reg.email.value==''){
//document.reg.email.value="";
error = error+'Legyen szíves e-mail címet megadni!\n\n';
//alert(error_2);
//document.reg.email.focus();
return false;
}
if ((document.reg.email.value.indexOf('.')== -1) || 
(document.reg.email.value.indexOf('@')<1)){
//document.reg.email.value="";
//alert(error_3);
//var error_2 ='Érvényes E-mai címet kell adnia!\n\n';
error +='Érvényes E-mai címet kell adnia!\n\n';
//document.reg.email.focus();
return false;
}

if (document.reg.pw1.value==''){
//document.reg.pw1.value="";
//alert(error_4);
error=error+'A jelszót meg kell adnia!\n\n';
//document.reg.pw1.focus();
return false;
}
if (document.reg.pw2.value==''){
//document.reg.pw2.value="";
//alert(error_5);
error=error+'A jelszót másodszor is meg kell adnia, a hibaszűrés érdekében!\n\n';
//document.reg.pw2.focus();
return false;
}
if (document.reg.pw1.value==document.reg.pw2.value){
var ervenyes="abcdefghijklmnopqrsutvwyzx";
var text2=document.reg.pw1.value; 
var text3=document.reg.pw2.value;

if ((text2.length<=4)||(text2.length>=9)){
//document.reg.pw1.value="";
//alert(error_6);
error=error+'Maximum 8 és minimum 5 db., kisbetűs,ékezet nélküli karaktert használjon legyenszíves!\n\n';
//document.reg.pw1.focus();
return false;
}
if ((text3.length<=4)||(text3.length>=9)){
//document.reg.pw2.value="";
//alert(error_6);
error=error+'Maximum 8 és minimum 5 db., kisbetűs,ékezet nélküli karaktert használjon legyenszíves!\n\n';
//document.reg.pw2.focus();
return false;
}


for (var ie=0;ie<text2.length;ie++){ 
if (ervenyes.indexOf(text2.charAt(ie)) == -1)
{
//document.reg.pw1.value="";
//alert(error_6);
error=error+'Maximum 8 és minimum 5 db., kisbetűs,ékezet nélküli karaktert használjon legyenszíves!\n\n';
//document.reg.pw1.focus();
return false;
}
}

for (var ie=0;ie<text3.length;ie++){ 
if (ervenyes.indexOf(text3.charAt(ie)) == -1)
{
//document.reg.pw2.value="";
error=error+'Maximum 8 és minimum 5 db., kisbetűs,ékezet nélküli karaktert használjon legyenszíves!\n\n';
//alert(error_6);
//document.reg.pw2.focus();
return false;
}
}}else{
//document.reg.pw1.value="";
error=error+'Nem egyeznek a jelszavak!\n\n';
//alert("Nem egyeznek a jelszavak!");
//document.reg.pw1.focus();
return false;
} 
if(error!='')
{alert(error);
return false;}
return true;
}