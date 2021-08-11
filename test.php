<!DOCTYPE html>
<html>
<head>
    <title>OuiBounce Testing Page</title>

    <!-- Example page base styling -->
    <!-- Don't worry abou this     -->
    <style>
        body {
            background-color: #F0F1F2;
            color: #2E4052;
            min-height: 500px;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            font-family: sans-serif;
        }
    </style>

    <!-- Add the OuiBounce CSS & Font -->
    <link rel="stylesheet" href="./popup/ouibounce.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>

    <!-- Load jQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <!-- Add OuiBounce JS -->
    <script src="./popup/ouibounce.js"></script>
</head>

<body>
<!-- Example page instructions -->
<h1>Try leaving this page to fire OuiBounce</h1>

<!-- OuiBounce Modal -->
<div id="ouibounce-modal">
    <div class="underlay"></div>
    <div class="modal">
        <div class="modal-title">
            <h3>This is a OuiBounce modal!</h3>
        </div>

        <div class="modal-body">
            <p>A doge is an elected chief of state lordship, the ruler of the Republic in many of the Italian city states during the medieval and renaissance periods, in the Italian "crowned republics".</p>
            <p>The word is from a Venetian word that descends from the Latin dux (as do the English duke and the standard Italian duce and duca), meaning "leader", especially in a military context. The wife of a doge is styled a dogaressa. <a href="https://en.wikipedia.org/wiki/Doge" target="blank">[1]</a></p>

            <form>
                <input type="text" placeholder="you@email.com">
                <input type="submit" value="learn more &raquo;">
                <p class="form-notice">*this is a fake form</p>
            </form>
        </div>

        <div class="modal-footer">
            <p>no thanks</p>
        </div>
    </div>
</div>

<!-- Example page JS        -->
<!-- Used to fire the modal -->
<script>

    // if you want to use the 'fire' or 'disable' fn,
    // you need to save OuiBounce to an object
    var _ouibounce = ouibounce(document.getElementById('ouibounce-modal'), {
        aggressive: true,
        timer: 0,
        callback: function() { console.log('ouibounce fired!'); }
    });

    $('body').on('click', function() {
        $('#ouibounce-modal').hide();
    });

    $('#ouibounce-modal .modal-footer').on('click', function() {
        $('#ouibounce-modal').hide();
    });

    $('#ouibounce-modal .modal').on('click', function(e) {
        e.stopPropagation();
    });
</script>
</body>
</html>
