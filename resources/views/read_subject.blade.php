<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333; 
            text-align: center;
            padding: 20px;
        }

        p {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #2c3e50;
        }

        hr {
            border: 0;
            height: 2px;
            background: #3498db;
            margin: 40px 0;
            width: 80%;
        }

        .links {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
            overflow-wrap: break-word;
            word-wrap: break-word;
            word-break: break-word;
            hyphens: auto;
        }

        .links a {
            color: #3498db;
            text-decoration: none;
            display: block;
            margin: 10px 0;
            font-size: 1.2em;
            transition: color 0.3s ease;
        }

        .links a:hover {
            color: #2980b9;
        }

        .email-body {
            background-color:yellow;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
            max-width: 800px;
            margin: 0 auto;
            font-size: 1.2em;
            line-height: 1.6;
            color: #2c3e50;
        }
    </style>
</head>
<body>
    <p>Important Related Links:</p>
    <div class="links">
        <?php
        foreach ($values as $val) {
            echo "<a href='$val'>$val</a><br>";
        }
        ?>
    </div>
    <div class="email-body">
        @php
        echo($records->Email_body);
        @endphp
    </div>
</body>
</html>
