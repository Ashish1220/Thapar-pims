<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/css/index.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0; /* Light gray background */
            text-align: center;
        }
        
        .navbar {
            background-color: #3496db; /* Updated color for navbar */
            overflow: hidden;
            display: flex;
            justify-content: space-between; /* Align items horizontally */
            align-items: center; /* Center items vertically */
            padding: 10px 30px; /* Padding adjusted */
        }
        
        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 17px;
            padding: 14px 16px;
        }
        
        .navbar a:hover {
            background-color: #2980b9; /* Darker blue hover effect */
        }
        
        .subscribe-button {
            background-color: #27ae60; /* Green button */
            color: white;
            border: none;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .subscribe-button:hover {
            background-color: #219d53; /* Darker green hover effect */
        }
        
        .main-screen {
            background-color: #3498db; /* Blue background for main screen */
            color: white;
            padding: 100px 0;
            width: 100%; /* Full width */
        }
        
        .main-screen h1 {
            font-size: 5em;
            margin: 20px 0;
            transition: opacity 1s ease-in-out;
        }
        
        .main-screen p {
            font-size: 1.5em;
            margin: 20px 0;
        }
        
        .main-screen .view-opportunities {
            margin-top: 20px;
        }
        
        .main-screen .view-opportunities button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #2ecc71; /* Green button */
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        
        .main-screen .view-opportunities button:hover {
            background-color: #27ae60; /* Darker green hover effect */
        }
        
        .about-section {
            padding: 50px 20px;
            background-color: #fff; /* White background */
        }
        
        .about-section p {
            font-size: 1.2em;
            line-height: 1.6;
            text-align: left;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .developer-info {
            margin-top: 50px;
            background-color: #f9f9f9; /* Light gray developer info background */
            padding: 20px;
        }
        
        .developer-info h2 {
            margin-bottom: 20px;
        }
        
        .developer-info p {
            font-size: 1.1em;
            line-height: 1.6;
            text-align: left;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .developer-info a {
            color: #3498db; /* Blue link */
            text-decoration: none;
            font-weight: bold;
            display: inline-block;
            margin-top: 10px;
        }
        
        .developer-info a img {
            vertical-align: middle;
            margin-left: 10px;
        }
        
        .developer-info a:hover {
            text-decoration: underline;
        }
        
        .content {
            padding: 20px;
        }
    </style>
    <title>Internship Opportunities</title>
</head>
<body>
    <div class="navbar">
        <div>
            <a href="#home">Home</a>
            <a href="#about">About Us</a>
        </div>
        <a href="subscribe" class="subscribe-button">Subscribe</a>
    </div>
    
    <div class="main-screen" id="home">
        <h1 id="dynamic-text">THAPAR-PIMS</h1>
        <div class="view-opportunities">
            <a href="/data"><button>VIEW OPPORTUNITIES</button></a>
        </div>
        <p>Thapar Internship Placement Management System</p>
    </div>
    
    <div class="about-section" id="about">
        <p>This is Thapar PIMS (Placement Internship Management System), designed to help students not miss any internship opportunities. Thapar PIMS captures all important emails related to internships and presents them on this portal. Subscribed users can even receive notifications on their personal WhatsApp contacts, ensuring they stay informed about upcoming opportunities.</p>
    </div>

    <div class="developer-info">
        <h2>About the Developer</h2>
        <p>Ashish Verma, <br>Thapar Institute of Engineering and Technology.</p>
        <p>Connect with me on LinkedIn: <a href="https://www.linkedin.com/in/ashish-verma-563397227" target="_blank">Ashish Verma <img src="https://upload.wikimedia.org/wikipedia/commons/c/ca/LinkedIn_logo_initials.png" alt="LinkedIn Logo" height="25"></a></p>
    </div>

    <div class="content">
        <p>Explore and find the best internship opportunities.</p>
    </div>

    <script>
        function changeText() {
            var textElement = document.getElementById('dynamic-text');
            var textArray = ['THAPAR-PIMS', 'KEEPS YOU UPDATED','SUBSCRIBE FOR NOTIFICATIONS!'];
            var currentIndex = 0;

            setInterval(function() {
                textElement.style.opacity = '0';
                setTimeout(function() {
                    currentIndex = (currentIndex + 1) % textArray.length;
                    textElement.textContent = textArray[currentIndex];
                    textElement.style.opacity = '1';
                }, 500); 
            }, 2000); 
        }

        changeText();
    </script>
</body>
</html>
