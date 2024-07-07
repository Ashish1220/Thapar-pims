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
            background-color: #f0f0f0; /* Light gray background */
            color: #333; /* Dark gray text color */
            text-align: center;
            padding: 20px;
        }

        p {
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        hr {
            border: 0;
            height: 1px;
            background: #3498db; /* Blue line */
            margin: 20px 0;
        }

        .links {
            background-color: #fff; /* White background for links */
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .links a {
            color: #3498db; /* Blue link color */
            text-decoration: none;
            display: block;
            margin: 5px 0;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .email-body {
            background-color: #f9f9f9; /* Light gray background for email body */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
            max-width: 800px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <p>Important Links:</p>
    <div class="links">
        <?php
        foreach ($values as $val) {
            echo "<a href='$val'>$val</a><br>";
        }
        ?>
    </div>
    <hr>
    <div class="email-body">
        @php
        echo($records->Email_body);
        @endphp
    </div>
</body>
</html>
