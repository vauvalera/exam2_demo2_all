<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
if (isset($arParams['ID_NEWS'])) {
    $arElem = CIBlockElement::GetList(
                Array(),
                Array(
                      "IBLOCK_ID" => $arParams['ID_NEWS'],
                      "PROPERTY_NEWS" => $arResult['ID']),
                false,
                false,
                Array("NAME", "PROPERTY_NEWS"))->Fetch();
    $cp= $this->__component;
    $arResult['NEWS'] = $arElem['NAME'];
    $cp->SetResultCacheKeys(array(
        "NEWS"
     ));

}