
<?php 
//echo $_GET['url'];
$uri = explode("/", $_GET['url']);
//echo $uri[0];
    if($uri[0] == "cms"){
        $url_on =  "../";
    } else {
        $url_on = null;
    }
?>

<!doctype html>
<html lang="pt">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Not Found 404</title>
    <!-- Favicons -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= $url_on . IMG . 'favicon.ico' ?>" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link rel="stylesheet" href="<?= $url_on . CSS . '404.css' ?>">

</head>
<body>
    <div class="main">
        <section class="error-404">
            <h1>404</h1>
            <h2>Página não encontrada!</h2>
            <img src="<?= $url_on . IMG . 'not-found.svg' ?>" class="error-404" alt="Not Found 404">
        </div>
    </section>
</div>
</body>
</html>