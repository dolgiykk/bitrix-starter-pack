<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
	die();
}
?>
<main class="main main--no-indent pb-0" role="main">
    <table border="1">
        <? foreach ($arResult['LIST_ITEMS'] as $listItem): ?>
            <tr>
                <? foreach ($listItem as $item): ?>
                    <td><?= $item ?></td>
                <? endforeach; ?>
            </tr>
        <? endforeach; ?>
    </table>
    <div style="float: left">
    <?php
    $APPLICATION->IncludeComponent(
        "bitrix:main.pagenavigation",
        "",
        [
            "PAGE_WINDOW" => $arParams['PAGE_WINDOW'],
            "NAV_OBJECT" => $arResult['NAV'],
            "SEF_MODE" => "N"
        ],
        false
    );
    ?>

    <form action="" method="post">
        <select name="LIST_ITEM_ID">
            <option value="0">Не выбрано</option>
            <? foreach ($arResult['LIST_ITEMS'] as $listItem): ?>
                <option value="<?= $listItem['ID'] ?>"><?= $listItem['VALUE'] ?></option>
            <? endforeach; ?>
        </select>
        <input type="text" name="NEW_VALUE">
        <button type="submit" name="ACTION" value="CREATE">Добавить</button>
        <button type="submit" name="ACTION" value="DELETE">Удалить</button>
        <button type="submit" name="ACTION" value="UPDATE">Обновить</button>
    </form>
    </div>
</main>
