<?php
switch($_GET['menu']){
    default : include "inc_ub/home.php"; break;
	case home : include "inc_ub/home.php"; break;
    case news : include "inc_ub/news.php"; break;
    case tourism : include "inc_ub/tourism.php"; break;
	case hotels : include "inc_ub/hotels.php"; break;
	case guest_book : include "inc_ub/guest_book.php"; break;
    case logout : include "logout.php"; break;    
}
?>