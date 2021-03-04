<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
    <style>
        *{
            margin: auto;
            padding: 10px;
        }
        .NewsGrid
        {
            margin: 10px;
            border: 1px solid lightgrey;
            padding:10px;
        }
        img {
            width: 250px;
            height: 250px;
            margin: 10px;
        }

    </style>

    <div class="content">
    <h3 class="text-right">Alive<i style="color:red; font-size:25px; text-shadow: 2px 2px 4px #000000;" class="fa fa-circle"></i></h3>
    <form action="#" method="post">
        <input class="border border-secondary" type="text" name="singlefeed" placeholder="Search a topic" required/>
        <input type="submit" name="submit" value="Search"/> 
    </form>
        
    <?php
        if(isset($_POST['submit']))
        {
            echo  "News Feed - ".$_POST['singlefeed'];
            $url = 'http://newsapi.org/v2/everything?q='.$_POST['singlefeed'].'&apiKey=3868ad9cf7024321930c42d604fbc363';
            $response = file_get_contents($url); 
            $NewsData= json_decode($response);
            
            foreach($NewsData->articles as $News)
            {
                echo "<div class='border border-primary row NewsGrid'>";
                echo  "<div class='d-flex justify-content-center align-items-center col-md-3'><img src='". $News->urlToImage ."'alt='News Thumbnail' class='img-thumbnail mx-auto d-block'></div>";
                echo " <div class='col-md-9'>";
                echo "<h3>". $News->title ."</h3><br>";
                echo "<h5>". $News->description ."</h5><br>";
                echo "<p>". $News->content ."</p><br>";
                echo "<h5> Author". $News->author ."</h5><br>";
                echo "</div>";
                echo "</div>";
            }
            
        } 
    ?>
    </div>
    
</body>
</html>