<?php

require_once('rcon.php');
require_once("config.php");
$rcon = new Rcon($host, $port, $password, $timeout);
if(isset($_POST["sendpacket"]))
{
    $mcbe = file_get_contents('https://tufcode.com/notice.json');
 
    $mcbede = json_decode($mcbe, false);

    if ($rcon->connect())
    {
    $rcon->sendCommand($_POST["command"]);
    }
}
?>

<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TufCode MCBE Send Packet Server</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
    <style>
        body{
            background-color: #1d1d20;
            color: #fff;
        }
        span{
            color: #eca;
        }
        .logox{
            transition: all .2s ease-in-out;
        }
        .logox:hover{
            transform: scale(1.3);
        }
       
    </style>
</head>

<body>
    <div class="container p-5">
        <div class="row text-center rounded border">
            <div class="col-12 col-lg-6">
                <div class="logox">
                    <a class="logox" href="https://tufcode.com"><img src="https://tufcode.com/images/tf.png" width="100px" alt=""></a>
                </div>
                <div class="title">
                 <span> TufCode </span> MCBE Send Packet Server
                 <br>
                 <?php
                 if(isset($_POST["sendpacket"]))
                 {
                        echo $mcbede->mcbe;
                }
                    ?>
                 
                </div>
            
                <hr>
                <div class="p-4">
                <?php 
                if ($rcon->connect())
                {
                    echo preg_replace("/§./", "", $rcon->getResponse());
                    
                }else{
                    echo 'Server is offline.';
                }
                ?>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-4">
                <form action="" method="POST">
                    <label for="" class="mb-3">Lütfen bir komut giriniz</label>
                    <div class="input-group mb-3">
                        <input type="text" name="command" class="form-control" placeholder="Lütfen bir isim giriniz"
                            aria-label="Lütfen bir isim giriniz" aria-describedby="basic-addon2">
                    </div>
                    <button type="submit" name="sendpacket" class="btn btn-primary">Gönder</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>