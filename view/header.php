<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="http://sandwich.bulton.fr" />

        <title><?php echo $view->pageTitle; ?></title>

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <header>
            
        </header>
        <section class="container">
            <div class="row">
                <?php
                foreach($view->errors as $texte)
                {
                    if($texte === false)
                    {
                        continue;
                    }
                    
                    echo '<div class="alert alert-danger"><p>'.$texte.'</p></div>';
                }
