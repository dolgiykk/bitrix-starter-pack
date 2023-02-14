<?php

namespace Sprint\Migration;

class Test_category_migration20230214144950 extends Version
{
    protected $description = 'Migration for categories of iblock with code "Test"';

    protected $moduleVersion = '4.2.4';

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'Test',
            'test'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            [
                0 => [
                    'NAME' => 'test1',
                    'CODE' => 'test1',
                    'SORT' => '500',
                    'ACTIVE' => 'Y',
                    'XML_ID' => null,
                    'DESCRIPTION' => '',
                    'DESCRIPTION_TYPE' => 'text',
                    'UF_TEST_YES_NO' => null,
                    'UF_TEST_STRING' => null,
                    'UF_TEST_LIST' => null,
                    'UF_TEST_ELEMENT_IBLOCK_BIND' => null,
                ],
                1 => [
                    'NAME' => 'test2',
                    'CODE' => 'test2',
                    'SORT' => '500',
                    'ACTIVE' => 'Y',
                    'XML_ID' => null,
                    'DESCRIPTION' => '',
                    'DESCRIPTION_TYPE' => 'text',
                    'UF_TEST_YES_NO' => null,
                    'UF_TEST_STRING' => null,
                    'UF_TEST_LIST' => null,
                    'UF_TEST_ELEMENT_IBLOCK_BIND' => null,
                    'CHILDS' => [
                        0 => [
                            'NAME' => 'test3',
                            'CODE' => 'test3',
                            'SORT' => '500',
                            'ACTIVE' => 'Y',
                            'XML_ID' => null,
                            'DESCRIPTION' => '',
                            'DESCRIPTION_TYPE' => 'text',
                            'UF_TEST_YES_NO' => null,
                            'UF_TEST_STRING' => null,
                            'UF_TEST_LIST' => null,
                            'UF_TEST_ELEMENT_IBLOCK_BIND' => null,
                            'CHILDS' => [
                                0 => [
                                    'NAME' => 'test4',
                                    'CODE' => 'test4',
                                    'SORT' => '500',
                                    'ACTIVE' => 'Y',
                                    'XML_ID' => null,
                                    'DESCRIPTION' => '',
                                    'DESCRIPTION_TYPE' => 'text',
                                    'UF_TEST_YES_NO' => null,
                                    'UF_TEST_STRING' => null,
                                    'UF_TEST_LIST' => null,
                                    'UF_TEST_ELEMENT_IBLOCK_BIND' => null,
                                ],
                                1 => [
                                    'NAME' => 'test5',
                                    'CODE' => 'test5',
                                    'SORT' => '500',
                                    'ACTIVE' => 'Y',
                                    'XML_ID' => null,
                                    'DESCRIPTION' => '',
                                    'DESCRIPTION_TYPE' => 'text',
                                    'UF_TEST_YES_NO' => null,
                                    'UF_TEST_STRING' => null,
                                    'UF_TEST_LIST' => null,
                                    'UF_TEST_ELEMENT_IBLOCK_BIND' => null,
                                ],
                            ],
                        ],
                    ],
                ],
            ]);
    }

    public function down()
    {
        //your code ...
    }
}
