<?php

namespace NostrDev\Template;

class Template {

    public function main_header(){
        
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Nostr Dev</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
            <style>
                .links{
                    display: flex;
                    flex-direction: row;
                    gap: 25px;
                }
                .links a{
                    text-decoration:none;
                    font-family: Arial, Helvetica, sans-serif;
                    font-weight: bolder;
                    /* margin: 2px; */
                }
                .main-tite{
                    /* border-bottom : 2px solid black; */
                    /* margin-right: 10px; */
                    display: flex;
                    flex-direction: row;
        
                }
            
            </style>
        </head>
        <body>
            
        ';
    }

    public function main_footer(){
        echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/dd021511bc.js" crossorigin="anonymous"></script>
        </body>
        
        </html>';
    }

}