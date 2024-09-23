<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Webcam Stream</title>
    <style>
        #video {
            width: 100%;
            max-width: 640px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Running</h1>
    <!--<img id="video" src="image.php" alt="Live Stream">-->

    <script>
        async function refreshImage() {
            try {
                const response = await fetch('image.php?' + new Date().getTime()); 
                if (response.ok) {
                    const blob = await response.blob(); 
                    const img = document.getElementById('video');
                    img.src = URL.createObjectURL(blob); 
                } else {
                    console.error('Failed to fetch image:', response.statusText);
                }
            } catch (error) {
                console.error('Error fetching image:', error);
            }
        }

    
        setInterval(refreshImage, 30);
    </script>
</body>
</html>
