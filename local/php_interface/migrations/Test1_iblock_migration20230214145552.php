<?php

namespace Sprint\Migration;

class Test1_iblock_migration20230214145552 extends Version
{
    protected $description = 'Migration for iblock with code "Test1"';

    protected $moduleVersion = '4.2.4';

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $helper->Iblock()->saveIblockType([
            'ID' => 'test',
            'SECTIONS' => 'Y',
            'EDIT_FILE_BEFORE' => '',
            'EDIT_FILE_AFTER' => '',
            'IN_RSS' => 'N',
            'SORT' => '500',
            'LANG' => [
                'ru' => [
                    'NAME' => 'Test',
                    'SECTION_NAME' => '',
                    'ELEMENT_NAME' => '',
                ],
                'en' => [
                    'NAME' => 'Test',
                    'SECTION_NAME' => '',
                    'ELEMENT_NAME' => '',
                ],
            ],
        ]);
        $iblockId = $helper->Iblock()->saveIblock([
            'IBLOCK_TYPE_ID' => 'test',
            'LID' => [
                0 => 's1',
            ],
            'CODE' => 'Test1',
            'API_CODE' => 'Test1',
            'REST_ON' => 'N',
            'NAME' => 'Test1',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'LIST_PAGE_URL' => '#SITE_DIR#/test/index.php?ID=#IBLOCK_ID#',
            'DETAIL_PAGE_URL' => '#SITE_DIR#/test/detail.php?ID=#ELEMENT_ID#',
            'SECTION_PAGE_URL' => '#SITE_DIR#/test/list.php?SECTION_ID=#SECTION_ID#',
            'CANONICAL_PAGE_URL' => '',
            'PICTURE' => null,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
            'RSS_TTL' => '24',
            'RSS_ACTIVE' => 'Y',
            'RSS_FILE_ACTIVE' => 'N',
            'RSS_FILE_LIMIT' => null,
            'RSS_FILE_DAYS' => null,
            'RSS_YANDEX_ACTIVE' => 'N',
            'XML_ID' => null,
            'INDEX_ELEMENT' => 'Y',
            'INDEX_SECTION' => 'Y',
            'WORKFLOW' => 'N',
            'BIZPROC' => 'N',
            'SECTION_CHOOSER' => 'L',
            'LIST_MODE' => '',
            'RIGHTS_MODE' => 'S',
            'SECTION_PROPERTY' => 'N',
            'PROPERTY_INDEX' => 'N',
            'VERSION' => '1',
            'LAST_CONV_ELEMENT' => '0',
            'SOCNET_GROUP_ID' => null,
            'EDIT_FILE_BEFORE' => '',
            'EDIT_FILE_AFTER' => '',
            'SECTIONS_NAME' => 'Разделы',
            'SECTION_NAME' => 'Раздел',
            'ELEMENTS_NAME' => 'Элементы',
            'ELEMENT_NAME' => 'Элемент',
            'EXTERNAL_ID' => null,
            'LANG_DIR' => '/var/www/html/bitrix-starter-pack',
            'SERVER_NAME' => '',
            'IPROPERTY_TEMPLATES' => [
            ],
            'ELEMENT_ADD' => 'Добавить элемент',
            'ELEMENT_EDIT' => 'Изменить элемент',
            'ELEMENT_DELETE' => 'Удалить элемент',
            'SECTION_ADD' => 'Добавить раздел',
            'SECTION_EDIT' => 'Изменить раздел',
            'SECTION_DELETE' => 'Удалить раздел',
        ]);
        $helper->Iblock()->saveIblockFields($iblockId, [
            'IBLOCK_SECTION' => [
                'NAME' => 'Привязка к разделам',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => [
                    'KEEP_IBLOCK_SECTION_ID' => 'N',
                ],
            ],
            'ACTIVE' => [
                'NAME' => 'Активность',
                'IS_REQUIRED' => 'Y',
                'DEFAULT_VALUE' => 'Y',
            ],
            'ACTIVE_FROM' => [
                'NAME' => 'Начало активности',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => '',
            ],
            'ACTIVE_TO' => [
                'NAME' => 'Окончание активности',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => '',
            ],
            'SORT' => [
                'NAME' => 'Сортировка',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => '0',
            ],
            'NAME' => [
                'NAME' => 'Название',
                'IS_REQUIRED' => 'Y',
                'DEFAULT_VALUE' => '',
            ],
            'PREVIEW_PICTURE' => [
                'NAME' => 'Картинка для анонса',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => [
                    'FROM_DETAIL' => 'N',
                    'SCALE' => 'N',
                    'WIDTH' => '',
                    'HEIGHT' => '',
                    'IGNORE_ERRORS' => 'N',
                    'METHOD' => 'resample',
                    'COMPRESSION' => 95,
                    'DELETE_WITH_DETAIL' => 'N',
                    'UPDATE_WITH_DETAIL' => 'N',
                    'USE_WATERMARK_TEXT' => 'N',
                    'WATERMARK_TEXT' => '',
                    'WATERMARK_TEXT_FONT' => '',
                    'WATERMARK_TEXT_COLOR' => '',
                    'WATERMARK_TEXT_SIZE' => '',
                    'WATERMARK_TEXT_POSITION' => 'tl',
                    'USE_WATERMARK_FILE' => 'N',
                    'WATERMARK_FILE' => '',
                    'WATERMARK_FILE_ALPHA' => '',
                    'WATERMARK_FILE_POSITION' => 'tl',
                    'WATERMARK_FILE_ORDER' => null,
                ],
            ],
            'PREVIEW_TEXT_TYPE' => [
                'NAME' => 'Тип описания для анонса',
                'IS_REQUIRED' => 'Y',
                'DEFAULT_VALUE' => 'text',
            ],
            'PREVIEW_TEXT' => [
                'NAME' => 'Описание для анонса',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => '',
            ],
            'DETAIL_PICTURE' => [
                'NAME' => 'Детальная картинка',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => [
                    'SCALE' => 'N',
                    'WIDTH' => '',
                    'HEIGHT' => '',
                    'IGNORE_ERRORS' => 'N',
                    'METHOD' => 'resample',
                    'COMPRESSION' => 95,
                    'USE_WATERMARK_TEXT' => 'N',
                    'WATERMARK_TEXT' => '',
                    'WATERMARK_TEXT_FONT' => '',
                    'WATERMARK_TEXT_COLOR' => '',
                    'WATERMARK_TEXT_SIZE' => '',
                    'WATERMARK_TEXT_POSITION' => 'tl',
                    'USE_WATERMARK_FILE' => 'N',
                    'WATERMARK_FILE' => '',
                    'WATERMARK_FILE_ALPHA' => '',
                    'WATERMARK_FILE_POSITION' => 'tl',
                    'WATERMARK_FILE_ORDER' => null,
                ],
            ],
            'DETAIL_TEXT_TYPE' => [
                'NAME' => 'Тип детального описания',
                'IS_REQUIRED' => 'Y',
                'DEFAULT_VALUE' => 'text',
            ],
            'DETAIL_TEXT' => [
                'NAME' => 'Детальное описание',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => '',
            ],
            'XML_ID' => [
                'NAME' => 'Внешний код',
                'IS_REQUIRED' => 'Y',
                'DEFAULT_VALUE' => '',
            ],
            'CODE' => [
                'NAME' => 'Символьный код',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => [
                    'UNIQUE' => 'N',
                    'TRANSLITERATION' => 'N',
                    'TRANS_LEN' => 100,
                    'TRANS_CASE' => 'L',
                    'TRANS_SPACE' => '-',
                    'TRANS_OTHER' => '-',
                    'TRANS_EAT' => 'Y',
                    'USE_GOOGLE' => 'N',
                ],
            ],
            'TAGS' => [
                'NAME' => 'Теги',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => '',
            ],
            'SECTION_NAME' => [
                'NAME' => 'Название',
                'IS_REQUIRED' => 'Y',
                'DEFAULT_VALUE' => '',
            ],
            'SECTION_PICTURE' => [
                'NAME' => 'Картинка для анонса',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => [
                    'FROM_DETAIL' => 'N',
                    'SCALE' => 'N',
                    'WIDTH' => '',
                    'HEIGHT' => '',
                    'IGNORE_ERRORS' => 'N',
                    'METHOD' => 'resample',
                    'COMPRESSION' => 95,
                    'DELETE_WITH_DETAIL' => 'N',
                    'UPDATE_WITH_DETAIL' => 'N',
                    'USE_WATERMARK_TEXT' => 'N',
                    'WATERMARK_TEXT' => '',
                    'WATERMARK_TEXT_FONT' => '',
                    'WATERMARK_TEXT_COLOR' => '',
                    'WATERMARK_TEXT_SIZE' => '',
                    'WATERMARK_TEXT_POSITION' => 'tl',
                    'USE_WATERMARK_FILE' => 'N',
                    'WATERMARK_FILE' => '',
                    'WATERMARK_FILE_ALPHA' => '',
                    'WATERMARK_FILE_POSITION' => 'tl',
                    'WATERMARK_FILE_ORDER' => null,
                ],
            ],
            'SECTION_DESCRIPTION_TYPE' => [
                'NAME' => 'Тип описания',
                'IS_REQUIRED' => 'Y',
                'DEFAULT_VALUE' => 'text',
            ],
            'SECTION_DESCRIPTION' => [
                'NAME' => 'Описание',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => '',
            ],
            'SECTION_DETAIL_PICTURE' => [
                'NAME' => 'Детальная картинка',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => [
                    'SCALE' => 'N',
                    'WIDTH' => '',
                    'HEIGHT' => '',
                    'IGNORE_ERRORS' => 'N',
                    'METHOD' => 'resample',
                    'COMPRESSION' => 95,
                    'USE_WATERMARK_TEXT' => 'N',
                    'WATERMARK_TEXT' => '',
                    'WATERMARK_TEXT_FONT' => '',
                    'WATERMARK_TEXT_COLOR' => '',
                    'WATERMARK_TEXT_SIZE' => '',
                    'WATERMARK_TEXT_POSITION' => 'tl',
                    'USE_WATERMARK_FILE' => 'N',
                    'WATERMARK_FILE' => '',
                    'WATERMARK_FILE_ALPHA' => '',
                    'WATERMARK_FILE_POSITION' => 'tl',
                    'WATERMARK_FILE_ORDER' => null,
                ],
            ],
            'SECTION_XML_ID' => [
                'NAME' => 'Внешний код',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => '',
            ],
            'SECTION_CODE' => [
                'NAME' => 'Символьный код',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => [
                    'UNIQUE' => 'N',
                    'TRANSLITERATION' => 'N',
                    'TRANS_LEN' => 100,
                    'TRANS_CASE' => 'L',
                    'TRANS_SPACE' => '-',
                    'TRANS_OTHER' => '-',
                    'TRANS_EAT' => 'Y',
                    'USE_GOOGLE' => 'N',
                ],
            ],
            'LOG_SECTION_ADD' => [
                'NAME' => 'LOG_SECTION_ADD',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => null,
            ],
            'LOG_SECTION_EDIT' => [
                'NAME' => 'LOG_SECTION_EDIT',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => null,
            ],
            'LOG_SECTION_DELETE' => [
                'NAME' => 'LOG_SECTION_DELETE',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => null,
            ],
            'LOG_ELEMENT_ADD' => [
                'NAME' => 'LOG_ELEMENT_ADD',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => null,
            ],
            'LOG_ELEMENT_EDIT' => [
                'NAME' => 'LOG_ELEMENT_EDIT',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => null,
            ],
            'LOG_ELEMENT_DELETE' => [
                'NAME' => 'LOG_ELEMENT_DELETE',
                'IS_REQUIRED' => 'N',
                'DEFAULT_VALUE' => null,
            ],
        ]);
        $helper->Iblock()->saveGroupPermissions($iblockId, [
            'administrators' => 'X',
        ]);
        $helper->UserOptions()->saveElementGrid($iblockId, [
            'views' => [
                'default' => [
                    'columns' => [
                        0 => '',
                    ],
                    'columns_sizes' => [
                        'expand' => 1,
                        'columns' => [
                        ],
                    ],
                    'sticked_columns' => [
                    ],
                    'custom_names' => [
                    ],
                ],
            ],
            'filters' => [
            ],
            'current_view' => 'default',
        ]);
        $helper->UserOptions()->saveSectionGrid($iblockId, [
            'views' => [
                'default' => [
                    'columns' => [
                        0 => '',
                    ],
                    'columns_sizes' => [
                        'expand' => 1,
                        'columns' => [
                        ],
                    ],
                    'sticked_columns' => [
                    ],
                    'custom_names' => [
                    ],
                ],
            ],
            'filters' => [
            ],
            'current_view' => 'default',
        ]);
    }

    public function down()
    {
        //your code ...
    }
}
