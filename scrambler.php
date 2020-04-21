<?php
    require_once "functions.php";

    $task = "encode";
    if ( isset( $_GET['task'] ) && $_GET['task'] != "" ) {
        $task = $_GET['task'];
    }
    $key = "abcdefghijklmnopqrstuvwxyz1234567890";
    if ( 'key' == $task ) {
        $keyOrginal = str_split( $key );
        shuffle( $keyOrginal );
        $key = join( '', $keyOrginal );
    } elseif ( isset( $_POST['key'] ) && !empty( $_POST['key'] ) ) {
        $key = $_POST['key'];
    }

    $scrambledData = '';
    if ( 'encode' == $task ) {
        $data = $_POST['data'] ?? '';
        if ( $data != '' ) {
            $scrambledData = encodeData( $data, $key );
        }
    }
    if ( 'decode' == $task ) {
        $data = $_POST['data'] ?? '';
        if ( $data != '' ) {
            $scrambledData = decodeData( $data, $key );
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/milligram/1.3.0/milligram.css">
    <style>
    #data,
    #result {
        height: 200px;
    }

    body {
        padding-top: 50px;
    }

    .menu-btn {
        margin-bottom: 50px;
    }

    .menu-btn a {
        display: inline-block;
        background: #9B4DCA;
        padding: 8px 30px;
        color: #fff;
        font-size: 18px;
        font-weight: 700;
        text-transform: uppercase;
        margin-right: 10px;
        transition: .3s;
    }

    .menu-btn a:hover {
        background: #000;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <h2>Data Scrambler</h2>
                <p>Use this application to scramble your data</p>
                <div class="menu-btn">
                    <a href="/data/scrambler.php?task=encode">Encode</a>
                    <a href="/data/scrambler.php?task=decode">Decode</a>
                    <a href="/data/scrambler.php?task=key">Generate Key</a>

                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="column column-60 column-offset-20">
                <form action="scrambler.php<?php if ( 'decode' == $task ) {echo "?task=decode";}?>" method="POST">
                    <label for="key">Generate Key</label>
                    <input type="text" name="key" id="key" <?php displayKey( $key );?>>
                    <label for="data">Data</label>
                    <textarea name="data" id="data" cols="50"
                        rows="10"><?php if ( isset( $_POST['data'] ) ) {echo $_POST['data'];}?></textarea>
                    <label for="result">Result</label>
                    <textarea name="result" id="result" cols="50" rows="10"><?php echo $scrambledData; ?></textarea>

                    <button class="button button-large" type="submit">DO IT FOR ME</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>