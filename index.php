<?php 
$curl = curl_init('https://api.nasa.gov/planetary/apod?api_key=gw06J6fJXu06hUn49kIwj5bmTN6AunVT90LkV5oZ');
curl_setopt($curl, CURLOPT_CAINFO, __DIR__ . DIRECTORY_SEPARATOR . 'cert.cer');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($curl);
if($data === false) {
    var_dump(curl_error($curl));
} else {
    if(curl_getinfo($curl, CURLINFO_HTTP_CODE)=== 200) {
        $data = json_decode($data, true);
        //var_dump($data);    
    }
};
$url = $data['url'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta >
    <link rel="icon" type="image/png" href="img/nasa_logo.png" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://meyerweb.com/eric/tools/css/reset/reset.css">
    <link rel="stylesheet" href="style/style.css">
    <title>A.P.O.D</title>
</head>
<body>
    <header>
        <h1>Astronomy picture of the Day</h1>
    </header>
    <main>
    <div id="grid-container"> 
        <section id="left-pannel">    
            <h2>Hi, today is the <?= $data['date']?> (UTC/GMT -5) and this is the Astronomy picture of the day! </h2>
            <h3>You are looking at <?=$data['title'] ?></h3>
            <div id="explanation">
                <span>Some explanations about the picture:</span>
                <p><?= $data['explanation'] ?></p>
            </div>  
        </section>
        <section id="right-pannel">
            <?php if($data["media_type"] === "image") {
                include 'page/image.php';
                }
                else if($data["media_type"]=== "video") {
                    include 'page/video.php';
                }
            ?>
        </section>
    </div>
    </main>
    <footer class="footer">
        <nav class="links">
            <ul>
                <li><a href="https://www.nasa.gov/" target="_blank">NASA</a></li>
                <li><a href="https://api.nasa.gov/" target="_blank">NASA Open APIs</a></li>
                <li><a class="red-links" href="https://www.instagram.com/astronomypicturesdaily/?hl=fr" target="_blank">Instagram</a></li>
                <li><a class="red-links" href="https://www.youtube.com/user/APODVideos" target="_blank">Youtube</a></li>
            </ul>
        </nav>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.0/gsap.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>