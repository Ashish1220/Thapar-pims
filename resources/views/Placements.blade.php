<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placements</title>
    <style>
        body {
            background-color: #ADD8E6; /* Light blue background */
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .email-container {
            background-color: #CCC; /* Light gray container */
            padding: 20px 50px;
            border-radius: 10px;
            width: 80%; /* Adjust width as needed */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto; /* Center horizontally with margin */
        }

        .email-item {
            background-color: #FAEBD7; /* Beige email item */
            margin: 10px 0;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .email-item h2 {
            color: #640000; /* Dark red heading */
            text-align: center;
            margin: 5px 0;
        }

        .email-item h1 {
            color: #640000; /* Dark red date */
            text-align: center;
            margin: 5px 0;
        }

        .email-item p {
            margin-bottom: 10px;
        }

        .email-item a {
            background-color: #4CAF50; /* Green button */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
        }

        .email-item a:hover {
            background-color: #45a049; /* Darker green hover effect */
        }

        .opportunities-heading {
            background-color: #3498db; /* Blue background for heading */
            color: white;
            font-size: 2em;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
            width: 80%; /* Match width with email-container */
            margin: 20px auto 10px; /* Center horizontally with top and bottom margin */
        }
    </style>
</head>

<body>
    <main>
        <section class="opportunities-heading">
            <h2>OPPORTUNITIES FOR 4TH YEAR STUDENTS</h2>
        </section>

        <section>
            <div class="email-container">
                @foreach($records as $record)
                <?php if ($record->Sender_Email != "Nan"): ?>
                <div class="email-item" id="{{$record->id}}">
                    <h2>Email From: {{ $record->Sender_Email}}</h2>
                    <h1>Date: {{ $record->Email_recv_date}}</h1>
                    <div> <p><b>Company Name: {{$record->Company_Name}}</b></p>
                    <p>Subject: {{$record->Email_Subject}}</p>
                    <a href="read_more/{{$record->id}}">Read More</a>
                </div>
                </div>
                <?php endif; ?>
                @endforeach
            </div>
        </section>
    </main>
</body>

</html>
