<?php

namespace Sprint\Migration;

class Test1_category_migration20230214145720 extends Version
{
    protected $description = 'Migration for categories of iblock with code "Test1"';

    protected $moduleVersion = '4.2.4';

    /**
     * @throws Exceptions\HelperException
     * @return bool|void
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $iblockId = $helper->Iblock()->getIblockIdIfExists(
            'Test1',
            'test'
        );

        $helper->Iblock()->addSectionsFromTree(
            $iblockId,
            [
                0 => [
                    'NAME' => 'Test1',
                    'CODE' => '',
                    'SORT' => '500',
                    'ACTIVE' => 'Y',
                    'XML_ID' => null,
                    'DESCRIPTION' => '',
                    'DESCRIPTION_TYPE' => 'text',
                ],
            ]);
    }

    public function down()
    {
        //your code ...
    }
}
