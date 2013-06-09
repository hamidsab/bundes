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
  
 $(document).ready(function(){
	$.ajax({
		url:'http://search.twitter.com/search.json?q=%23reichstag&rpp=15&include_entities=true&with_twitter_user_id=true&result_type=mixed',
		type: 'GET',
        dataType: 'jsonp',
        success: function(data) {
        	$.each(data.results, function(index, tweet) {
				addTweet('<img src="'+ tweet.profile_image_url + '"/>' + tweet.text);
			});
		
		}
	});
});

function addTweet(tweet) {
	$("#tweetlist").append("<li>" +  tweet + "</li>").listview('refresh');
}
