<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Subscription Form</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
        }

        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 50px auto;
        }

        .form-container h2 {
            margin-bottom: 20px;
            color: #3498db;
            font-size: 2em;
        }

        .form-container label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left;
            color: #333;
        }

        .form-container input {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
            transition: border-color 0.3s ease;
        }

        .form-container input:focus {
            border-color: #3498db;
            outline: none;
        }

        .form-container button {
            background-color: #27ae60;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 5px;
            display: block;
            width: 100%;
        }

        .form-container button:hover {
            background-color: #219d53;
        }

        .unsubscribe-section {
            margin-top: 30px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .unsubscribe-section h2 {
            margin-bottom: 20px;
            color: #e74c3c;
            font-size: 1.5em;
        }

        .unsubscribe-section button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border-radius: 5px;
            display: block;
            width: 100%;
        }

        .unsubscribe-section button:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2>Subscription Form</h2>
        <form action="/subscribe" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>

            <label for="phone-number">Phone Number</label>
            <input type="tel" id="phone-number" name="phone-number" required pattern="[0-9]{10}" title="Please enter a valid 10-digit phone number">

            <label for="thapar-rollno">Thapar Roll Number</label>
            <input type="text" id="thapar-rollno" name="thapar-rollno" required>

            <button type="submit">Submit</button>
        </form>

        <div class="unsubscribe-section">
            <h2>Unsubscribe with Unique Code</h2>
            <form action="/unsubscribe" method="POST">
                @csrf
                <label for="unique-code">Phone Number</label>
                <input type="tel" id="phone-number" name="phone-number" required pattern="[0-9]{10}" title="Please enter a valid 10-digit phone number" required>                
                <label for="unique-code">Unique Code</label>
                <input type="text" id="unique-code" name="unique-code" required>

                <button type="submit">Unsubscribe</button>
            </form>
        </div>
    </div>
</body>

</html>
