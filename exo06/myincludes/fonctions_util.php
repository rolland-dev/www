<?php
function protect_montexte($param) {

    $param = trim($param);
    $param = stripslashes($param);
    $param = htmlspecialchars($param);
    return $param;

}

function createMenuLi($href, $txt){

    $str = '<li class="nav-item">';
    $str .= '<a class="nav-link" href="'.$href.'">'.$txt.'</a>';
    $str .= '</li>';

    return $str;
}


function writeArticles($all){

    file_put_contents('data/blog_data_alt.php',"<?php\n\$tmpArray = ".var_export($all, true).";");
 
}


