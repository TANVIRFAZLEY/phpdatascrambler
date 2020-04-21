<?php
// dispaly key
function displayKey( $key ) {
    printf( " value= '%s'", $key );
}

//encode
function encodeData( $orginalData, $key ) {
    $orginalKey = "abcdefghijklmnopqrstuvwxyz1234567890";
    $data = '';
    $lenth = strlen( $orginalData );
    for ( $i = 0; $i < $lenth; $i++ ) {
        $currentChar = $orginalData[$i];
        $pos = strpos( $orginalKey, $currentChar );
        if ( $pos !== false ) {
            $data .= $key[$pos];
        } else {
            $data .= $currentChar;
        }

    }
    return $data;

}
//decode
function decodeData( $orginalData, $key ) {
    $orginalKey = "abcdefghijklmnopqrstuvwxyz1234567890";
    $data = '';
    $lenth = strlen( $orginalData );
    for ( $i = 0; $i < $lenth; $i++ ) {
        $currentChar = $orginalData[$i];
        $pos = strpos( $key, $currentChar );
        if ( $pos !== false ) {
            $data .= $orginalKey[$pos];
        } else {
            $data .= $currentChar;
        }

    }
    return $data;

}