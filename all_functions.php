<?php 
function displayCard($cardTitle, $value, $btnName, $href) {
    return ("
    <div class='birthday_card'>
        <h2>{$cardTitle}</h2>
        <p>Total: {$value}</p>
        <a href= {$href}><button class='btn btn-info'>{$btnName}</button></a>
    </div>
    ");
};

function displayBirtHdayInfo($name, $birthday) {
    return ("
    <div  class='birthday'>
        <p>{$birthday}</p>
        <h3>{$name}</h3>
    </div>
    ");
};
?>