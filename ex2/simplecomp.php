<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Простой компонент");
?><?$APPLICATION->IncludeComponent(
	"simplecomp.exam-materials", 
	".default", 
	array(
		"COMPONENT_TEMPLATE" => ".default",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"ID_NEWS" => "1",
		"ID_IBLOCK_AUTHOR" => "UF_AUTHOR_TYPE",
		"ID_AUTHOR" => "AUTHOR",
		"PRODUCTS_IBLOCK_ID" => "2"
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>