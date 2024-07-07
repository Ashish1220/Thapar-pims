<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placements</title>
</head>

<body style="background-color: #ADD8E6;">
    <main>
        <section>
            <div>

                <div style="background-color: #CCC; padding: 0 96px;">
                    @foreach($records as $record)
                        
            <?php if ($record->Sender_Email!="Nan"): ?>
                    
                        <div id="{{$record->id}}"> 
                            <section >
                                <div style="background-color: #FAEBD7; margin: 6px 0;">
                                    <h2 style="color: #640000; text-align: center; margin: 3px 0;">Email From: {{ $record->Sender_Email}}</h2>
                                    <h1 style="color: #640000; text-align: center; margin: 3px 0;">Date: {{ $record->Email_recv_date}}</h1>
                                    <section style="display: flex; justify-content: center;">
                                        <div style="margin-top: 20px;"> 
                                            <p><b> Company_name: {{$record->Company_Name}}</b></p>
                                            <p>Subject: {{$record->Email_Subject}}</p>
                                            <a href="read_more/{{$record->id}}"><button style="background-color: #4CAF50; color: white;"></button></a>
                                            <button onclick="erase({{$record->id}})">Delete</button>
                                        </div>
                                    </section>
                                </div>
                            </section>
                        </div>
                        <?php endif; ?>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
</body>

</html>

<script>
    function erase(id){
        var selector=document.getElementById(id);
        selector.style.display='none';
    }
</script>