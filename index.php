<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <title></title>
    </head>
    <body>        
        <!-- bootstrapos szerkezet: https://bootsnipp.com/ keresojebe login kulcsszo, majd a 'Login in a panel' stilust valasztottuk, 
        felesleges kodreszt torolve bemasoltuk a szukseges html-szerkezetet -->
        <div class="container" style="margin-top:30px">
            <!-- col-md-4 class-u div haromszor is kell, hogy meglegyen a 12-es felosztas; kozepso divben a tenyleges tartalom -->
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><h3 class="panel-title"><strong>Sign In </strong></h3></div>
                    <div class="panel-body">
                        <form role="form" method="POST">
                            <div class="form-group">
                                <label for="fname">Username or Email</label>
                                <!-- name es id megadasa -->
                                <input type="email" class="form-control" id="fname" name="fname" placeholder="Enter email">
                                <!-- hibauzenet helye -->
                                <div id="message" style="color:red;"></div>
                            </div>
                            <div class="form-group">
                                <!-- jelszokezelest, beleptetest majd kovetkezo alkalommal vesszuk -->
                                <label for="exampleInputPassword1">Password <a href="#">(forgot password)</a></label>
                                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            </div>
                            <!-- name es id megadasa -->
                            <button type="submit" class="btn btn-sm btn-default" id="sb">Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>

        </div>

        
        <!-- bootstrap nelkuli pelda ora elso felebol -->
        <!--<form method="POST" >
            <input type="text" name="fname" id="fname" />
            <button type="button" name="sb" id="sb">OK</button>
        </form>
        -->
        
        
        <?php
        ?>
        
        
        <!-- jquery CDN: https://code.jquery.com/ ahol uncompressed linkre kattintva a felnyilo layeren masolas majd itt 
beillesztes -->
        <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
   
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-
    Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

        <script>
        // lentebb hasznalt jquery kodok mukodese:
        // blur: https://api.jquery.com/blur/ 
        // post: https://api.jquery.com/jQuery.post/
            
        // kezdeti beallitas: a gomb disabled, mig nem kap megfelelo erteket
        $("#sb").attr("disabled","disabled");
        // ha az input mezo elveszti a focus-t
        $( "#fname" ).blur(function() {
            //alert( "Elhagytad a mezot!" );
            
            // val()-al szedjuk ki a tartalmat az input mezonek;
            $.post( "process.php", { fname: $("#fname").val() }).done(function( data ) {               
               
               var obj = $.parseJSON(data);
               
               // process.php hibauzenetei response ertektol fuggoen a message id-val jelzett divbe  iratodnak ki
               $("#message").html(obj.message);
               
               // nem szoveget irunk, hanem szamot, a process.php valtozoiban tarolt asszociativ tombokbol nyerjuk ki
               // az aktualis valaszt a kodok segitsegevel
               // aposztrof hasznlata !
               if(obj.response == '1'){    
                   // ha az adatbazisban letezo email címet irt be a user, akkor a disabled attributum eltavolitasra kerul
                   // a gombrol, es aktivva valik
                   $("#sb").removeAttr("disabled");
               }else {
                   // lekezeli azt is, ha a user elsore jo email-cimet irt, aztan ismet a mezobe ir
                   // ekkor ujra inaktivva valik a gomb
                   $("#sb").attr("disabled","disabled");
               }               
            });
        });
        
        // JSON, AJAX, jQuery: submitek nelkul kommunikacio a szerverrel
        
        // JSON az Ajax technológiában.
        // Ajax: a weblap teljes újratöltődés nélkül adatot cserél a szerverrel, és ennek hatására frissüljön.
        // Az adat rögtön megjelenik a felhasználó számára, amint megérkezik a valasz a szerverről, anelkul, hogy a submit gombra kattintott volna
        // pl.mint itt is, a user beirja az emailcimet bejelentkezeskor es ez rogton ellenorzesre kerul a szerveren, adatbazison
        
        
        // hibakereses
        // Chrome F12 / Network ful kivalasztasa
        // esemeny kivaltasa jo vagy rossz ertekkel az input mezoben
        // a megjeleno process.php-re kattintva:
        // headers fül: legalso soraban lathato az inputba irt ertek
        // preview ful: hiba helye (ha van)
        // response ful: hiba jellege
        </script>
    </body>
</html>
