<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<p><b><?=GetMessage("SIMPLECOMP_EXAM2_CAT_TITLE")?></b></p>
<pre>
<?
//print_r($arResult);
?>
</pre>
<ul>
    <?foreach($arResult['AUTHORS'] as $author):?>
        <li>[<?=$author['ID'];?>] - <?=$author['LOGIN']?></li>
        <ul>
        <?foreach($author['ITEMS'] as $item):?>
            <li><?=$item->GetFields()['NAME']?></li>
        <?endforeach;?>
        </ul>
    <?endforeach;?>
</ul>
