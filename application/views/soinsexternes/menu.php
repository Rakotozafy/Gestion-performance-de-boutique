<!doctype html>
<html>
    <head>
        <title>Soins Externe</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 4px;
            }
        </style>
    </head>
    <body style="background-color: #ddd">
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav text-right">
                        <li><a href="#"><span class="glyphicon glyphicon-th"></span>&nbsp;T.D.B</a></li>
                        <li><a href="<?php echo site_url('Consultation') ?>"><span class="glyphicon glyphicon-align-center"></span>&nbsp;Consultation</a></li>
                        <li><a href="<?php echo site_url('Certificatmedical') ?>"><span class="glyphicon glyphicon-copyright-mark"></span>&nbsp;Certificat Medical</a></li>
                        <li><a href="<?php echo site_url('Hebergement') ?>"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Hebergement</a></li>
                        <li class="active"><a href="<?php echo site_url('Soinsexterne') ?>"><span class="glyphicon glyphicon-saved"></span>&nbsp;Soins externes</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-cog"></span>&nbsp;Paramètres</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div style="background-color:#f8f8f8;">
        <div class="cadre row" style="margin-top:-18px;">
            <div class="col-sm-2 colist-group" style="padding-bottom:5px;">
                <li class="list-group-item">Analyse</li>
                <li class="list-group-item">Banque de sang</li>
                <li class="list-group-item">Echographie</li>
                <li class="list-group-item">Radio</li>
            </div>
            <div class="col-sm-10 colist-group" id="content-page">
            </div>
        </div>    
    </div>        
    </body>
</html>