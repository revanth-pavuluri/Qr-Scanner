<!DOCTYPE html>
<html>
<head>
	<title>QR Generator</title>

	<script type="text/javascript" src="js/jquery.js"></script>

	<script type="text/javascript" src="js/qrcode.js"></script>

<style type="text/css">
	
	@font-face {
    font-family: wf;
    src: url(fonts/Gilroy-Medium.ttf);
  }
  		*{
  			font-family:wf; 
  			
  		}	
	body{		
		position: absolute;
		width: 100%;
		height: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		margin: 0;
		padding: 0;
	}

	.back{
		width: 300px;
		height: auto;
		background: #24cfaa;

	}
	
	#qrResult{
		background: url("scan.png");
			background-size: cover;
			background-repeat: no-repeat;
			width: 150px;
			height: 177px;
			margin: 0 auto;
			display: flex;
			align-items: center;
			justify-content: center;
	}
	#qrResult img{
		margin-top:-25px;
	}
	.logo{
	
			background-repeat: no-repeat;
			width: 60px;
			height: 60px;
			border-radius: 50%;
			margin: 0 auto;
			transform: translateY(-30px);
			border: solid #fff;
		}
		.title{
			text-align: center;
			font-size: 25px;
			margin-top: -20px;
			letter-spacing: 0.5px;
			
		}
		
		.foot{
			text-align: center;
			font-size: 12px;
			padding-top: 15px;
			padding-bottom: 15px;
			letter-spacing: 3px;
			
		}
		.sub-title{
			color: #aaa;
    		font-size: 16px;
    		text-align: center;
			padding-top: 10px;
			margin-bottom: 10px;
		}

	.box{
		margin: 0 auto;
		width: 270px;
		height: auto;
		background: #fff;
		margin-top: 50px;
		margin-bottom: 20px;
		border-radius: 10px;
	}
	.form{
			width: 350px;
			height: auto;
			padding: 0px 35px 35px 35px;
			border-radius: 10px;
			border: solid #eee;
			
		}
		.tit{
			text-align: center;
			font-size: 28px;
			padding-top: 30px;
			letter-spacing: 0.5px;
		}
		.fields{
			width: 100%;
			padding: 40px 5px 5px 5px;
		}
		.fields input,select{
			width: 90%;
			border: none;
			outline: none;
			background: none;
			font-size: 18px;
			color: #555;
			padding: 5px;
			margin-bottom: 50px;
			border-bottom: solid #eee;
			transition: 0.5s;
		}
		.fields input:focus,select:focus{
			border-bottom: solid #24cfaa;
			transition: 0.5s;	
		}

input:placeholder-shown + .label {
  opacity:0;
  transform: translateY(100%);

}
input:not(:placeholder-shown){
	border: solid 1px #ced4da;
}

input {
  width: 90%;
  padding:10px;
  margin:5px 0;
  border: none;
  border-bottom: 1px solid #ced4da;
  transition: all 0.2s;
  font-size:15px;
  
}

.group {
  position: relative;
  margin-top: 10px;
}

input + .label {
  position: absolute;
  top:-15px;
  left: 10px;
  transition: all 0.2s;
  opacity:1;
  background:white;
  border: 1px solid #ced4da;
  border-width: 0 2px 0 2px;
  padding:0 5px;
  transform: translateY(calc(60% + 5px));
  font-size: 12px;
}


input:focus {
  outline:0;
  
  border-color:#24cfaa;;
}

input:focus + .label {
  border-color:#24cfaa;;

}
.save{
			outline: none;
			border: none;
			cursor: pointer;
			width: 100%;
			height: 50px;
			border-radius: 30px;
			font-size: 20px;
			font-weight: 600;
			color: #fff;
			text-align: center;
			background: #24cfaa;
			letter-spacing: 1px;
			box-shadow: 3px 3px 8px #b1b1b1,-3px -3px 8px #ffffff;
			transition: 0.5s;
		}
		.save:hover{
			background: #2fdbb6;
		}
		.save:active{
			background: #1da88a;
		}
		#logofile img{
			width: 20px;
			height: 20px;
		}
</style>
</head>
<body>

<div class="form">
	<div class="tit">Customize Your QR Card</div>
	<div class="group">
    <input type="text" placeholder="Qr Text/Link" value="" id="qr" onkeyup="generate();" autocomplete="off">
    <label class="label" for="name">Qr Text/Link</label>
  </div>

 <div class="group">
    
    <input hidden="" type="file" accept="image/*" onchange="logo(this.files)" placeholder="Logo" id="file" autocomplete="off">
    <label  for="file">
    <div id="logofile" style="width: 86%;padding: 15px;cursor: pointer; border: dashed #eee;" align="center">Choose a logo or drag it here</div>
    </label>
  </div>
<script type="text/javascript">
var logofile = document.getElementById("logofile");
    logofile.addEventListener("dragover", dragover, false);
    logofile.addEventListener("dragleave", dragleave, false);
    logofile.addEventListener("drop", drop, false);

	function dragleave(e) {
    e.stopPropagation();
    e.preventDefault();
    logofile.style["border-color"] = '#eee';
}

function dragover(e) {
    e.stopPropagation();
    e.preventDefault();
    logofile.style["border-color"] = 'green';
}

function drop(e) {
    e.stopPropagation();
    e.preventDefault();

    var dt = e.dataTransfer;
    var file = dt.files;
    logo(file);
}


	/* image preview */
	function logo(file) {
    logofile.style["border-color"] = '#24cfaa';
    var oFReader = new FileReader();
    oFReader.readAsDataURL(file[0]);
    console.log(file[0]);
    oFReader.onload = function (oFR) {
        var logo = document.getElementById('view');
        logo.style["background"] = 'url('+oFR.target.result+')';
        logo.style["background-size"] = 'cover';
        logofile.innerHTML='<img src="'+oFR.target.result+'"> Click here to edit logo';
    };
}

</script>
  <div class="group">
    <input type="text" placeholder="Title" id="tit" onkeyup="(function(){
				document.getElementById('title').innerHTML=document.getElementById('tit').value;
			})();" autocomplete="off" value="">
    <label class="label" for="name">Title</label>
  </div>
  <div class="group">
    <input type="text" placeholder="Sub Title" id="subtit" onkeyup="(function(){
				document.getElementById('subtitle').innerHTML=document.getElementById('subtit').value;
			})();" autocomplete="off">
    <label class="label" for="name">Sub Title</label>
  </div>
  
<div class="group">
    <input type="text" id="fot" onkeyup="(function(){
				document.getElementById('foot').innerHTML=document.getElementById('fot').value;
			})();" placeholder="Footer" autocomplete="off">
    <label class="label" for="name">Footer</label>
  </div>

  	<div class="group" style="width: 40%;">
    <input type="text" placeholder="Card Size" id="carsiz" onkeyup="(function(){
    			var val = document.getElementById('carsiz').value;
    			var card = document.getElementById('card');
    			val = val.split('*');
				card.style['width']= val[0]*37.8+'px';
				card.style['height']= val[1]*37.8+'px';
			})();" autocomplete="off">
    <label class="label" for="name">Card Size (cm)</label>
  </div>
  <div class="group" style="width: 40%;margin-left: 50%; margin-top: -49px;">
    <input type="text" placeholder="Card Color" id="carcol" onkeyup="(function(){
				document.getElementById('card').style['background']=document.getElementById('carcol').value;
			})();" autocomplete="off">
    <label class="label" for="name">Card Color</label>
  </div>
  <div class="group" style="width: 40%;">
    <input type="text" placeholder="Page Size" autocomplete="off" id="pagsiz" onkeyup="(function(){
    			var val = document.getElementById('pagsiz').value;
    			var page = document.getElementById('page');
    			val = val.split('*');
				page.style['width']= val[0]*37.8+'px';
				page.style['height']= val[1]*37.8+'px';
			})();">
    <label class="label" for="name">Page Size (cm)</label>
  </div>
  <div class="group" style="width: 40%;margin-left: 50%; margin-top: -49px;">
    <input type="text" placeholder="Page Color"  id="pagcol" onkeyup="(function(){
				document.getElementById('page').style['background']=document.getElementById('pagcol').value;
			})();" autocomplete="off">
    <label class="label" for="name">Page Color</label>
  </div>
  <div class="group" style="width: 40%;">
			<label><input type="checkbox" onclick="(function(){
				var loc = document.getElementById('fraper');
				var view = document.getElementById('qrResult');
				if (loc.checked) {
					view.style['background']='url(scan.png)';
				} else {
					view.style['background']='none';
				}
			})();" id="fraper" checked="" style="width: 15%;"> Qr Frame</label>
		</div>
  <div class="group" style="margin-left: 50%;width: 40%;margin-top: -22px;">
			<label><input type="checkbox" onclick="(function(){
				var loc = document.getElementById('logoper');
				var view = document.getElementById('view');
				var logofile = document.getElementById('logofile');
				if (loc.checked) {
					view.style['display']='block';
					logofile.style['display']='block';
				} else {
					view.style['display']='none';
					logofile.style['display']='none';
				}
			})();" id="logoper" checked="" style="width: 15%;"> Logo</label>
		</div>
		<br>
		<button id="download" onclick="takeshot();" class="save">Download</button>

	</div>




<div class="back" id="card">
	
	<div class="box" id="page">
		<div class="logo" id="view" style="background: url(pp.jpg);background-size: cover;"></div>
		<div class="title" id="title">Title goes here</div>
		<div class="sub-title" id="subtitle">Subtitle will be hereSubtitle will be here</div>

<div id="qrResult" style=""></div>

		<div class="foot" id="foot">Contact : 6304779526<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6304779526</div>
</div></div>

<div id="preview"></div>
<script type="text/javascript">
	var qrcode=new QRCode(document.getElementById('qrResult'),{
		width:115,
		height:115,
		correctLevel : QRCode.CorrectLevel.H
	});

function generate(){
	var message=document.getElementById('qr');
	qrcode.makeCode(message.value);
}

</script>
<script src="js/html2canvas.js"></script>
<script type="text/javascript">
        function takeshot() {
            let div = document.getElementById('card');
  
            html2canvas(div,{scale: 2}).then(
                function (canvas) {
                    document.getElementById('preview').appendChild(canvas);
                    var img = canvas.toDataURL();
		    var link = document.createElement('a');
        link.download = 'Qr.png';
        link.href = img;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        delete link;
                })
        }
    </script>
</body>
</html>
