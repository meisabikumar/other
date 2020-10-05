
<?php
// $servername = "216.10.249.126";
// $username = "ncetmons_ark";
// $password = "";
// $dbname = "ncetmons_monsterminds";

//$servername = "103.53.41.210";
//$username = "ncetmmhh_ark";
//$password = "";
//$dbname = "ncetmmhh_monsterminds";





// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$phone = $_POST['phone'];
$message = $_POST['message'];

$sql = "INSERT INTO contact (name,  email, subject, phone, message)
VALUES ('$name', '$email', '$subject', '$phone', '$message')";

if (mysqli_query($conn, $sql)) {
    //echo "New record created successfully";

    $to = "ark@ncetmonsterminds.com";
    $subject = "Contact";
    $headers = "From: ark@ncetmonsterminds.com";
    $message = '
    Name: '.$name.'
    Email: '.$email.'
    subject: '.$subject.'
    phone: '.$phone.'
    message: '.$message.'';


    if (mail($to, $subject, $message, $headers)){
        //echo "sucess mail  at ark@ncetmonsterminds.com";
        ?>
        <!DOCTYPE html>
        <html>
        <head><!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
            <title></title>
            <style>
                @import url('https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Roboto:300,400,500,700');
                body, html {
                    background: #000;
                }
                .container{
                    margin-top: 200px;

                }


                h1 {
                    color: #EEE;
                    text-shadow: -1px -2px 3px rgba(17, 17, 17, 0.3);
                    text-align: center;
                    font-family: "Monsterrat", sans-serif;
                    font-weight: 900;
                    text-transform: uppercase;
                    font-size: 60px;
                    margin-bottom: -5px;
                }

                h1 underline {
                    border-top: 5px solid rgba(26, 188, 156, 0.3);
                    border-bottom: 5px solid rgba(26, 188, 156, 0.3);

                }

                h2 {

                    font-size: 45px;
                    margin-top: 40px;
                    margin-left: 16px;
                    font-family: 'Roboto', sans-serif;
                    font-weight: 400;
                    font-style: normal;

                    color: #EEE;
                    text-align: center;
                    word-spacing: 4px;
                }
                h3 {
                    margin-left: 16px;
                    font-family: "Lato", sans-serif;
                    font-weight: 600;
                    color: #EEE;
                    text-align: center;

                }

            </style>
        </head>
        <body>


            <div class="container">
                <div class="row justify-content-centre">
                    <div class="col-lg-12">
                        <h1><underline>Thank you! <?php echo "$name"; ?></underline></h1>
                        <p><h2>Subject : <?php echo "$subject"; ?></h2></p>
                        <p> <h3>We Recived your Query <strong>We will contact you Shortly</h3></p>
                        <p><h3>For further Inquiry feel free to Contact Us. </h3>  </p>

                        <p><h3><a class="btn btn-primary btn-sm" href="index.html" role="button">Continue to homepage</a></h3></p>      
                    </div>
                </div>
            </div>


        </body>
        </html>

        <?php
    }
    else {
        echo "not send";
    }
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
