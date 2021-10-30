// JavaScript Document
var mydate=new Date();
var year=mydate.getYear();   
if (year < 1000) year+=1900;
var day=mydate.getDay();
var month=mydate.getMonth();
var daym=mydate.getDate(); 
var Gio = mydate.getHours(); 
var Phut = mydate.getMinutes();
if(Gio<10){
	Gio="0"+Gio;
}
if(Phut<10){
	Phut="0"+Phut;}
if (daym<10) daym="0"+daym;
var dayarray=new Array("Chủ Nhật","Thứ 2"," Thứ 3","Thứ  4","Thứ 5","Thứ 6","Thứ 7"); 
var montharray=new Array("01","02","03","04","05","06","07","08","09","10","11","12");
document.write(dayarray[day]+", "+daym+" Tháng "+montharray[month]+" Năm "+year);