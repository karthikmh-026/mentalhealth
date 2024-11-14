
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Contact Us Page Design using Html CSS</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <style>
        body {
    font-family: 'Roboto', sans-serif;
    background-color: #f9f9f9;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
  }
  
  #section-wrapper {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 700px;
    margin-top:-2%;
  }
  
  .form-wrap {
    margin-bottom: 20px;
  }
  
  .form-title {
    text-align: center;
    font-size: 24px;
    margin-bottom: 20px;
  }
  
  .form-fields {
    margin-bottom: 20px;
  }
  
  .form-group {
    margin-bottom: 15px;
  }
  
  .entrytitle{
    width: 100%;
    padding: 10px;
    border: none;
    border-bottom: 1px solid #ddd;
    font-size: 16px;
  }
  .dailyentry {
    width: 100%;
    padding: 10px;
    border: none;
    border-bottom: 1px solid #ddd;
    font-size: 16px;
    height:350px;
  }
  
  .entrytitle::placeholder,
  .dailyentry::placeholder {
    color: #aaa;
  }
  
  .submit-button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #4caf50;
    border: none;
    color: white;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
  }
  
  .submit-button:hover {
    background-color: #45a049;
  }
  
    </style>
</head>
<body style="background-color:white">
    <section id="section-wrapper">    
            <div class="form-wrap">
                <form action="joda.php" method="POST">
                    <h2 class="form-title">My Personal Journal</h2>   
                    <div class="form-fields">
                        <div class="form-group">
                            <input type="text" class="entrytitle" name="entrytitle" placeholder="Name of entry ✏️">
                        </div>
                        
                        <div class="form-group">
                            <textarea type="text" class="dailyentry" name="dailyentry" row="10" column="5" placeholder="What's on your mind today? 💭"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="entrydate" name="entrydate" value="<?php echo date('Y-m-d'); ?>" readonly>
                    </div>
                    <input type="submit" value="submit" name="submit" class="submit-button">
                </form>
            </div>
        </div>
    </section>
</body>
</html>

</body>
</html>