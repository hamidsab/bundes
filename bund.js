var myImage= new Array(); 
myImage[0]="1.jpg";       
myImage[1]="2.jpg";
myImage[2]="3.jpg";
myImage[3]="4.jpg"; 
myImage[4]="5.jpg";
myImage[5]="6.jpg"
var ImageCnt = 0;

function next(){
    ImageCnt++;
    document.getElementById("whiteBox").style.background = 'url(' + myImage[ImageCnt] + ')';
  }

  function BHnav()
  {
  document.location.href ='index.html';
  }
  function BMnav()
  {
  document.location.href ='map3.html';
  }
  function BAnav()
  {
  document.location.href ='about.html';
  }
  function BCnav()
  {
  document.location.href ='contact.html';
  }
  function BPnav()
  {
  document.location.href ='picture.html';
  }
  
 
