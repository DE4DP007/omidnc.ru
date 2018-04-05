<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $templateData */
/** @var @global CMain $APPLICATION */
use \Bitrix\Main\Localization\Loc;
Loc::loadLanguageFile(__FILE__);
?>
<?$APPLICATION->AddChainItem($arResult["PROPERTIES"][Loc::GetMessage("SHORT_TITLE")]['VALUE']);?>