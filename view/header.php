<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <base href="http://sandwich.bulton.fr" />

        <?php
        if(!isset($view->vars->pageTitle))
        {
            $view->vars->pageTitle = '';
        }
        ?>
        <title><?php echo $view->vars->pageTitle; ?></title>

        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/global.css">
    </head>
    <body>
        <header>
            <?php
            if($view->file === 'index.php')
            {
                include(__DIR__.'/index_header.php');
            }
            else
            {
                
            }
            ?>
        </header>
        <section class="container-fluid col-xs-10 col-xs-offset-1">
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
