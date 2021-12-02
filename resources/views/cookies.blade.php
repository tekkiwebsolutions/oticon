<style>
	#cookiePopup {
		background: linear-gradient(to bottom,rgba(30,30,30,.95) 0,rgba(0,0,0,.95) 100%);
		font-family: Arial,Helvetica,sans-serif;
		font-size: 10pt;
		left: 0;
		line-height: 1.5;
		margin: 0;
		padding: 3px;
		position: fixed;
		width: 100%;
		z-index: 9999;
		bottom: 0px;
		opacity: 1;
	}
	#cookiePopup p{
        float: left;
        margin: 4px 0 0 20px;
        padding: 0;
        color: #fff;
	}
	#cookiePopup button{
		background-color: #36bf2d;
		border-bottom: 1px solid #222;
		border-radius: 5px;
		color: #fff!important;
		cursor: pointer;
		display: inline-block;
		float: right;
		font-weight: 700;
		line-height: 1;
		margin-right: 20px;
		margin-top: 2px;
		padding: 5px 10px 6px;
		position: relative;
		text-decoration: none;
		text-shadow: 0 -1px 1px #222;
		border: 0;
	}
</style>
 

<div id="cookiePopup">
  <p>
  Oticon uses cookies to provide necessary website functionality, improve your experience and analyze our traffic. By using our website, you agree to our <a href="#" style="color: #31a8f0;">Privacy Policy</a>  and our cookies usage.</p>
 <button id="acceptCookie">Agree!</button> 
</div>

<script type="text/javascript">
// set cookie according to you
var cookieName= "CodingStatus";
var cookieValue="Coding Tutorials";
var cookieExpireDays= 30;
// when users click accept button
let acceptCookie= document.getElementById("acceptCookie");
acceptCookie.onclick= function(){
    createCookie(cookieName, cookieValue, cookieExpireDays);
}
// function to set cookie in web browser
 let createCookie= function(cookieName, cookieValue, cookieExpireDays){
  let currentDate = new Date();
  currentDate.setTime(currentDate.getTime() + (cookieExpireDays*24*60*60*1000));
  let expires = "expires=" + currentDate.toGMTString();
  document.cookie = cookieName + "=" + cookieValue + ";" + expires + ";path=/";
  if(document.cookie){
    document.getElementById("cookiePopup").style.display = "none";
  }else{
    alert("Unable to set cookie. Please allow all cookies site from cookie setting of your browser");
  }
 }
// get cookie from the web browser
let getCookie= function(cookieName){
  let name = cookieName + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
// check cookie is set or not
let checkCookie= function(){
    let check=getCookie(cookieName);
    if(check==""){
        document.getElementById("cookiePopup").style.display = "block";
    }else{        
        document.getElementById("cookiePopup").style.display = "none";
    }
}
checkCookie();
</script> 