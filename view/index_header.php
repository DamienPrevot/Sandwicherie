    
    <h1 class="col-xs-12 text-center">Sandwicherie TP</h1>
    
    <div class="client col-xs-2 col-xs-offset-10 text-right">
        <p>
        <?php
        $client = $view->vars->client;
        if($client['status'] === CLIENT_CONNU)
        {
            echo 'Bonjour '.$client['nom'].' '.$client['prenom'];
        }
        else {echo '<span id="auth">Identifiez-vous</span>';}
        ?>
        </p>
    </div>
    
    <?php
    /**
     * Get carousel code from http://getbootstrap.com/javascript/#carousel
     */
    ?>
    
    <div id="carousel-example-generic" class="carousel slide col-xs-12" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div
            class="carousel-inner" role="listbox"
            style="width: 100%; height: 600px;"
        >
            <?php
            foreach($view->vars->visuels as $iVisuel => $visuel)
            {
                $class = 'item';
                if($iVisuel === 0) {$class .= ' active';}
                ?>
                <div class="<?php echo $class; ?>">
                    <img
                        src="/assets/img/visuel/<?php echo $visuel['visuel']; ?>"
                        alt="<?php echo $visuel['title']; ?>"
                        style="min-width: 100%;"
                    >
                </div>
                <?php
            }
            ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>