<link rel="icon" href="https://i2.wp.com/makitweb.com/wp-content/uploads/2016/02/cropped-sitelogo.png?fit=32%2C32&#038;ssl=1" sizes="32x32" />
<link rel="icon" href="https://i2.wp.com/makitweb.com/wp-content/uploads/2016/02/cropped-sitelogo.png?fit=192%2C192&#038;ssl=1" sizes="192x192" />
<link rel="apple-touch-icon-precomposed" href="https://i2.wp.com/makitweb.com/wp-content/uploads/2016/02/cropped-sitelogo.png?fit=180%2C180&#038;ssl=1" />
<meta name="msapplication-TileImage" content="https://i2.wp.com/makitweb.com/wp-content/uploads/2016/02/cropped-sitelogo.png?fit=270%2C270&#038;ssl=1" />
<meta name="viewport" content="width=device-width, initial-scale=1.0"><!doctype html>
<html>
    <head>
        <title>Take screenshot of webpage with Html2Canvas</title>
        <meta http-equiv='content-language' content='en-gb'>
        <script type="text/javascript" src="js/html2canvas.js"></script>
       
    </head>
    <body>
        <h1>Take screenshot of webpage with html2canvas</h1>
        <div class="container" id='container' >
            <img src='scan.png' width='100' height='100'>
            <img src='pp.jpg' width='100' height='100'>
            <img src='pp.jpg' width='100' height='100'>
        </div><br/>
        <input type='button' id='but_screenshot' value='Take screenshot' onclick='screenshot();'><br/>

        <!-- Script -->
        <script type='text/javascript'>
            function screenshot(){
                html2canvas(document.body).then(function(canvas) {
           
                    document.body.appendChild(canvas);
                });
            }
        </script>

    </body>
</html>
