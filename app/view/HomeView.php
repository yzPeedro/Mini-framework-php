<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300;0,500;1,700&display=swap" rel="stylesheet">

    <style>
        body{
            margin: 0;
            padding: 0;
        }

        #main{
            margin: 20% auto;
            width: 50%;
            text-align: center;
            font-family: 'Merriweather Sans', sans-serif;
        }
 
        p{
            font-size: 12px;
        }

        a{
            color: #ae76e3;
            text-decoration: none;
        }
        
        a:hover{
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- 
        #
        # $view_param[]
        #
    -->

    <div id="main">
        <h1>Welcome to Main Page!</h1>
        <span>This <b>Mini-Framework</b> was created by <a target="_blank" href="<?= $view_param['create_by'] ?>">Pedro Pessoa</a></span>
        <p>
            This project is open source, so you can collaborate <a href="https://github.com/yzPeedro/Mini-framework-php">here</a>
            <br><br>
            Thanks for appreciate
        </p>
    </div>
</body>
</html>
    
    