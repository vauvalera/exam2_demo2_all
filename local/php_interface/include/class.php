<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

AddEventHandler("main", "OnBuildGlobalMenu", Array("MyClass", "OnBuildGlobalMenu"));
class MyClass
{
    function OnBuildGlobalMenu(&$aGlobalMenu, &$aModuleMenu)
    {
        global $USER;
        /*if($USER->IsAdmin())
            return;*/
        if(in_array(5, $arGroups = CUser::GetUserGroup($USER->getID()))) {
            unset($aGlobalMenu['global_menu_desktop']);
            foreach($aModuleMenu as $key => $menu) {
             if ((in_array($menu['parent_menu'], ['global_menu_services', 'global_menu_settings'])) || $menu['items_id'] === 'menu_iblock') {
                        unset($aModuleMenu[$key]);
                    }
            }
        }
        
    }
}
?>