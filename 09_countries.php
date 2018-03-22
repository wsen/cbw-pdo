<?php
    $db_name = 'test';
    //$optionen = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_BOTH);
    require './connect.inc.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>09  countries</title>
		<meta charset="utf-8" />
		<!-- <link href="./styles/global_php_style.css" type="text/css" rel="stylesheet" media="screen" /> -->
        <script src="../../script/jquery-3.3.1.min.js"></script>
		<!-- <script src="http://10.10.56.134/script/jquery-3.3.1.min.js"></script> -->
		<style>
			div {
                border: 1px solid gray;
                width: 80%;
                height: 300px;
                overflow-y: scroll; /* oder auto */
                margin-top: 10px;
            }
            table { border-collapse: collapse; width: 100% }
            th, td { border: 1px solid gray; 
                    padding 3px 5px; }
		</style>

	</head>
	
	<body>
	    <h3>Länder Suche</h3>
        <form>
            <input type="text" id="suche" name="suche" value="" placeholder="Suche" />
        </form>
		<div>
            <table>
                <thead>
                    <tr><th>Name</th><th>Capital</th><th>Domain</th><th>Currency</th><th>Phone</th></tr>
                </thead>
                <tbody id="ausgabe">

                </tbody>

            </table>
        </div>
        <script>
            $('#suche').on('keyup', function(){
                var suche = $('#suche').val();
                if(suche.length > 0) {
                    var myData = { "postStr": suche };  // **
                    $.post("09_suche.php", myData, function(erg, status) {  // ** zuvor nur suche statt myData -> nur 1 Suchsstring ohne ...
                        if(status=="success") {
                            $("#ausgabe").html(erg);
                        }
                    }, "text");
                }            
            });
        </script>
	</body>
</html>
