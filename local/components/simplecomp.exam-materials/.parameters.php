<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentParameters = array(
	"PARAMETERS" => array(
        "PRODUCTS_IBLOCK_ID " => array(
			"NAME" => GetMessage("SIMPLECOMP_EXAM2_CAT_IBLOCK_ID"),
			"TYPE" => "STRING",
		),
        "ID_NEWS" => array(
			"NAME" => GetMessage("SIMPLECOMP_EXAM2_ID_NEWS"),
			"TYPE" => "STRING",
		),
        "ID_IBLOCK_AUTHOR" => array(
			"NAME" => GetMessage("SIMPLECOMP_EXAM2_ID_IBLOCK_AUTHOR"),
			"TYPE" => "STRING",
		),
        "ID_AUTHOR" => array(
			"NAME" => GetMessage("SIMPLECOMP_EXAM2_ID_AUTHOR"),
			"TYPE" => "STRING",
		),
        "CACHE_TIME"  =>  Array("DEFAULT"=>36000000),
	),
);