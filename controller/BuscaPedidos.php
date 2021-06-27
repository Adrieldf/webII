<?php

include_once("../dao/PgDaoFactory.php");

$pagina = @$_POST['pagina'];

$pgDaoFactory = new PgDaoFactory();

$dao = $pgDaoFactory->getPedidoDao();

echo $dao->getPedidoJSON($pagina);