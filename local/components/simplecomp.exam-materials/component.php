<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Loader,
	Bitrix\Iblock;

if(!Loader::includeModule("iblock"))
{
	ShowError(GetMessage("SIMPLECOMP_EXAM2_IBLOCK_MODULE_NONE"));
	return;
}
global $USER;

if(intval($arParams["PRODUCTS_IBLOCK_ID"]) > 0 && $USER->IsAuthorized())
{
	$rsUsers = CUser::GetList(($by="ID"), ($order="desc"), array('ID' => $USER->GetID()), array('SELECT' => array($arParams['ID_IBLOCK_AUTHOR'])) )->Fetch();
	$users = CUser::GetList(($by="ID"), ($order="desc"), array('!ID' => $USER->GetID(), $arParams['ID_IBLOCK_AUTHOR'] =>  $rsUsers[$arParams['ID_IBLOCK_AUTHOR']]), array('FIELDS' => array('ID', 'LOGIN')));
	$arResult["AUTHORS"] = array();
	$author_id = [];
	while ($user = $users->Fetch()) {
		$arResult["AUTHORS"][] = $user;
		$author_id[] = $user['ID'];
	}

	//iblock elements
	$arSelectElems = array (
		"ID",
		"IBLOCK_ID",
		"NAME",
		"PROPERTY_".$arParams['ID_AUTHOR'],
	);
	$arFilterElems = array (
		"IBLOCK_ID" => $arParams["ID_NEWS"],
		//"PROPERTY_".$arParams['ID_AUTHOR'] => $author_id,
		"ACTIVE" => "Y"
	);
	$arSortElems = array (
			"NAME" => "ASC"
	);
	
	$rsElements = CIBlockElement::GetList($arSortElems, $arFilterElems, false, false, $arSelectElems);
		while($arElement = $rsElements->GetNextElement())
		{
			foreach ($arResult["AUTHORS"] as &$author) {
			if (!in_array( $USER->GetID(), $arElement->GetProperties()[$arParams['ID_AUTHOR']]['VALUE']) && $arElement->GetFields()['PROPERTY_AUTHOR_VALUE'] == $author['ID']) {
					$author['ITEMS'][] = $arElement;	

			}
			}

		}
		//echo '<pre>'; print_r($arResult["AUTHORS"]); echo '</pre>';
	
	
	
}
$this->AddIncludeAreaIcon(
    array(
        'URL'   => "/bitrix/admin/iblock_element_admin.php?IBLOCK_ID=".$arParams["PRODUCTS_IBLOCK_ID"]."&type=products&lang=ru&find_el_y=Y",
        'SRC'   => $this->GetPath().'/images/znak.gif',
        'TITLE' => "ИБ в админке",
		 "IN_PARAMS_MENU" => true,
	)
);
$this->SetResultCacheKeys(array("AUTHORS"));
$this->includeComponentTemplate();	
?>