<?php

namespace Sprint\Migration;

class TestHighLoadBlock_hb_migration20230214145222 extends Version
{
    protected $description = 'Migration for HB with name TestHighLoadBlock';

    protected $moduleVersion = '4.2.4';

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();
        $hlblockId = $helper->Hlblock()->saveHlblock([
            'NAME' => 'TestHighLoadBlock',
            'TABLE_NAME' => 'test_high_load_block',
            'LANG' => [
                'ru' => [
                    'NAME' => 'Test',
                ],
                'en' => [
                    'NAME' => 'Test',
                ],
            ],
        ]);
        $helper->Hlblock()->saveGroupPermissions($hlblockId, [
            'administrators' => 'W',
            'everyone' => 'R',
        ]);
        $helper->Hlblock()->saveField($hlblockId, [
            'FIELD_NAME' => 'UF_TEST_HB_STRING',
            'USER_TYPE_ID' => 'string',
            'XML_ID' => '',
            'SORT' => '100',
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => 'Y',
            'EDIT_IN_LIST' => 'Y',
            'IS_SEARCHABLE' => 'N',
            'SETTINGS' => [
                'SIZE' => 20,
                'ROWS' => 1,
                'REGEXP' => '',
                'MIN_LENGTH' => 0,
                'MAX_LENGTH' => 0,
                'DEFAULT_VALUE' => '',
            ],
            'EDIT_FORM_LABEL' => [
                'en' => 'HB test string',
                'ru' => 'HB test string',
            ],
            'LIST_COLUMN_LABEL' => [
                'en' => 'HB test string',
                'ru' => 'HB test string',
            ],
            'LIST_FILTER_LABEL' => [
                'en' => 'HB test string',
                'ru' => 'HB test string',
            ],
            'ERROR_MESSAGE' => [
                'en' => 'HB test string',
                'ru' => 'HB test string',
            ],
            'HELP_MESSAGE' => [
                'en' => 'HB test string',
                'ru' => 'HB test string',
            ],
        ]);
        $helper->Hlblock()->saveField($hlblockId, [
            'FIELD_NAME' => 'UF_TEST_HB_NUBMER',
            'USER_TYPE_ID' => 'double',
            'XML_ID' => 'XML_TEST_HB_NUMBER',
            'SORT' => '100',
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => 'Y',
            'EDIT_IN_LIST' => 'Y',
            'IS_SEARCHABLE' => 'N',
            'SETTINGS' => [
                'PRECISION' => 4,
                'SIZE' => 20,
                'MIN_VALUE' => 0.0,
                'MAX_VALUE' => 0.0,
                'DEFAULT_VALUE' => null,
            ],
            'EDIT_FORM_LABEL' => [
                'en' => 'Test number',
                'ru' => 'Test number',
            ],
            'LIST_COLUMN_LABEL' => [
                'en' => 'Test number',
                'ru' => 'Test number',
            ],
            'LIST_FILTER_LABEL' => [
                'en' => 'Test number',
                'ru' => 'Test number',
            ],
            'ERROR_MESSAGE' => [
                'en' => 'Test number',
                'ru' => 'Test number',
            ],
            'HELP_MESSAGE' => [
                'en' => 'Test number',
                'ru' => 'Test number',
            ],
        ]);
        $helper->Hlblock()->saveField($hlblockId, [
            'FIELD_NAME' => 'UF_TEST_HB_FILE',
            'USER_TYPE_ID' => 'file',
            'XML_ID' => 'XML_TEST_HB_FILE',
            'SORT' => '100',
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => 'Y',
            'EDIT_IN_LIST' => 'Y',
            'IS_SEARCHABLE' => 'N',
            'SETTINGS' => [
                'SIZE' => 20,
                'LIST_WIDTH' => 200,
                'LIST_HEIGHT' => 200,
                'MAX_SHOW_SIZE' => 0,
                'MAX_ALLOWED_SIZE' => 0,
                'EXTENSIONS' => [
                ],
                'TARGET_BLANK' => 'Y',
            ],
            'EDIT_FORM_LABEL' => [
                'en' => 'Test file',
                'ru' => 'Test file',
            ],
            'LIST_COLUMN_LABEL' => [
                'en' => 'Test file',
                'ru' => 'Test file',
            ],
            'LIST_FILTER_LABEL' => [
                'en' => 'Test file',
                'ru' => 'Test file',
            ],
            'ERROR_MESSAGE' => [
                'en' => 'Test file',
                'ru' => 'Test file',
            ],
            'HELP_MESSAGE' => [
                'en' => 'Test file',
                'ru' => 'Test file',
            ],
        ]);
        $helper->Hlblock()->saveField($hlblockId, [
            'FIELD_NAME' => 'UF_TEST_HB_FILE_MULTIPLE',
            'USER_TYPE_ID' => 'file',
            'XML_ID' => 'XML_TEST_HB_FILE_MULTIPLE',
            'SORT' => '100',
            'MULTIPLE' => 'Y',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => 'Y',
            'EDIT_IN_LIST' => 'Y',
            'IS_SEARCHABLE' => 'N',
            'SETTINGS' => [
                'SIZE' => 20,
                'LIST_WIDTH' => 200,
                'LIST_HEIGHT' => 200,
                'MAX_SHOW_SIZE' => 0,
                'MAX_ALLOWED_SIZE' => 0,
                'EXTENSIONS' => [
                ],
                'TARGET_BLANK' => 'Y',
            ],
            'EDIT_FORM_LABEL' => [
                'en' => 'Test file multiple',
                'ru' => 'Test file multiple',
            ],
            'LIST_COLUMN_LABEL' => [
                'en' => 'Test file multiple',
                'ru' => 'Test file multiple',
            ],
            'LIST_FILTER_LABEL' => [
                'en' => 'Test file multiple',
                'ru' => 'Test file multiple',
            ],
            'ERROR_MESSAGE' => [
                'en' => 'Test file multiple',
                'ru' => 'Test file multiple',
            ],
            'HELP_MESSAGE' => [
                'en' => 'Test file multiple',
                'ru' => 'Test file multiple',
            ],
        ]);
        $helper->Hlblock()->saveField($hlblockId, [
            'FIELD_NAME' => 'UF_TEST_HB_LIST',
            'USER_TYPE_ID' => 'enumeration',
            'XML_ID' => 'XML_TEST_HB_LIST',
            'SORT' => '100',
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => 'Y',
            'EDIT_IN_LIST' => 'Y',
            'IS_SEARCHABLE' => 'N',
            'SETTINGS' => [
                'DISPLAY' => 'LIST',
                'LIST_HEIGHT' => 5,
                'CAPTION_NO_VALUE' => '',
                'SHOW_NO_VALUE' => 'Y',
            ],
            'EDIT_FORM_LABEL' => [
                'en' => 'Test list',
                'ru' => 'Test list',
            ],
            'LIST_COLUMN_LABEL' => [
                'en' => 'Test list',
                'ru' => 'Test list',
            ],
            'LIST_FILTER_LABEL' => [
                'en' => 'Test list',
                'ru' => 'Test list',
            ],
            'ERROR_MESSAGE' => [
                'en' => '',
                'ru' => '',
            ],
            'HELP_MESSAGE' => [
                'en' => '',
                'ru' => '',
            ],
            'ENUM_VALUES' => [
                0 => [
                    'VALUE' => 'Test list item 1',
                    'DEF' => 'N',
                    'SORT' => '500',
                    'XML_ID' => 'a83189567e8f0ffae1e044d8525101b9',
                ],
                1 => [
                    'VALUE' => 'Test list item 2',
                    'DEF' => 'N',
                    'SORT' => '500',
                    'XML_ID' => '5b133335584fbe9e89a4434eb3c1c598',
                ],
                2 => [
                    'VALUE' => 'Test list item 3',
                    'DEF' => 'N',
                    'SORT' => '500',
                    'XML_ID' => 'a7ebc8f884a96c0ac347fcf26b4b1744',
                ],
            ],
        ]);
        $helper->Hlblock()->saveField($hlblockId, [
            'FIELD_NAME' => 'UF_NAME',
            'USER_TYPE_ID' => 'string',
            'XML_ID' => 'XML_NAME',
            'SORT' => '100',
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => 'Y',
            'EDIT_IN_LIST' => 'Y',
            'IS_SEARCHABLE' => 'N',
            'SETTINGS' => [
                'SIZE' => 20,
                'ROWS' => 1,
                'REGEXP' => '',
                'MIN_LENGTH' => 0,
                'MAX_LENGTH' => 0,
                'DEFAULT_VALUE' => '',
            ],
            'EDIT_FORM_LABEL' => [
                'en' => 'Name',
                'ru' => 'Name',
            ],
            'LIST_COLUMN_LABEL' => [
                'en' => 'Name',
                'ru' => 'Name',
            ],
            'LIST_FILTER_LABEL' => [
                'en' => 'Name',
                'ru' => 'Name',
            ],
            'ERROR_MESSAGE' => [
                'en' => 'Name',
                'ru' => 'Name',
            ],
            'HELP_MESSAGE' => [
                'en' => 'Name',
                'ru' => 'Name',
            ],
        ]);
        $helper->Hlblock()->saveField($hlblockId, [
            'FIELD_NAME' => 'UF_DESCRIPTION',
            'USER_TYPE_ID' => 'string',
            'XML_ID' => '',
            'SORT' => '100',
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => 'Y',
            'EDIT_IN_LIST' => 'Y',
            'IS_SEARCHABLE' => 'N',
            'SETTINGS' => [
                'SIZE' => 20,
                'ROWS' => 1,
                'REGEXP' => '',
                'MIN_LENGTH' => 0,
                'MAX_LENGTH' => 0,
                'DEFAULT_VALUE' => null,
            ],
            'EDIT_FORM_LABEL' => [
                'ru' => 'Описание',
            ],
            'LIST_COLUMN_LABEL' => [
                'ru' => 'Описание',
            ],
            'LIST_FILTER_LABEL' => [
                'ru' => 'Описание',
            ],
            'ERROR_MESSAGE' => [
                'ru' => null,
            ],
            'HELP_MESSAGE' => [
                'ru' => null,
            ],
        ]);
        $helper->Hlblock()->saveField($hlblockId, [
            'FIELD_NAME' => 'UF_FULL_DESCRIPTION',
            'USER_TYPE_ID' => 'string',
            'XML_ID' => '',
            'SORT' => '100',
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => 'Y',
            'EDIT_IN_LIST' => 'Y',
            'IS_SEARCHABLE' => 'N',
            'SETTINGS' => [
                'SIZE' => 20,
                'ROWS' => 1,
                'REGEXP' => '',
                'MIN_LENGTH' => 0,
                'MAX_LENGTH' => 0,
                'DEFAULT_VALUE' => null,
            ],
            'EDIT_FORM_LABEL' => [
                'ru' => 'Полное описание',
            ],
            'LIST_COLUMN_LABEL' => [
                'ru' => 'Полное описание',
            ],
            'LIST_FILTER_LABEL' => [
                'ru' => 'Полное описание',
            ],
            'ERROR_MESSAGE' => [
                'ru' => null,
            ],
            'HELP_MESSAGE' => [
                'ru' => null,
            ],
        ]);
        $helper->Hlblock()->saveField($hlblockId, [
            'FIELD_NAME' => 'UF_XML_ID',
            'USER_TYPE_ID' => 'string',
            'XML_ID' => 'XML_ID',
            'SORT' => '100',
            'MULTIPLE' => 'N',
            'MANDATORY' => 'N',
            'SHOW_FILTER' => 'N',
            'SHOW_IN_LIST' => 'Y',
            'EDIT_IN_LIST' => 'Y',
            'IS_SEARCHABLE' => 'N',
            'SETTINGS' => [
                'SIZE' => 20,
                'ROWS' => 1,
                'REGEXP' => '',
                'MIN_LENGTH' => 0,
                'MAX_LENGTH' => 0,
                'DEFAULT_VALUE' => '',
            ],
            'EDIT_FORM_LABEL' => [
                'en' => 'XML ID',
                'ru' => 'XML ID',
            ],
            'LIST_COLUMN_LABEL' => [
                'en' => 'XML ID',
                'ru' => 'XML ID',
            ],
            'LIST_FILTER_LABEL' => [
                'en' => 'XML ID',
                'ru' => 'XML ID',
            ],
            'ERROR_MESSAGE' => [
                'en' => 'XML ID',
                'ru' => 'XML ID',
            ],
            'HELP_MESSAGE' => [
                'en' => 'XML ID',
                'ru' => 'XML ID',
            ],
        ]);
    }

    public function down()
    {
        //your code ...
    }
}
