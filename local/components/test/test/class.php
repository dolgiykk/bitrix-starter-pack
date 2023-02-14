<?php

if (! defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use App\Helpers\Params\GetListParams;
use App\Helpers\Params\PagenavigationParams;
use App\Services\PropertyEnumService;

class ChangeIblockPropertyList extends CBitrixComponent
{
    protected array $errors = [];

    protected $request;

    /**
     * @throws Exception
     */
    public function executeComponent()
    {
        if ($this->request->getRequestMethod() === 'POST') {
            try {
                /**
                 * TODO Разробраться что тут с сессией
                 */
//                if (! check_bitrix_sessid()) {
//                    throw new Exception('Ошибка сессии');
//                }

                switch ($this->request->getPost('ACTION')) {
                    case 'CREATE': {
                        $this->validateAddItem();
                        $this->addItem();
                        break;
                    }
                    case 'UPDATE': {
                        echo "TEst";
                        $this->validateUpdateItem();
                        $this->updateItem();
                        break;
                    }
                    case 'DELETE': {
                        $this->validateDeleteItem();
                        $this->deleteItem();
                        break;
                    }
                    default: throw new Exception('Неизвестное действие');
                }
            } catch (Exception $e) {
                $this->errors[] = $e->getMessage();
            }
        }

        $this->getResult();
        $this->includeComponentTemplate($this->request->get('sent') === 'success' ? 'success' : '');
    }

    /**
     * @throws Exception
     */
    protected function validateAddItem(): void
    {
        if (! mb_strlen(trim($this->request->getPost('NEW_VALUE')))) {
            throw new Exception('Не указано значение');
        }
    }

    /**
     * @throws Exception
     */
    protected function validateUpdateItem(): void
    {
        if (empty($this->request->getPost('LIST_ITEM_ID'))) {
            throw new Exception('Не указан элемент');
        }

        $this->validateAddItem();
    }

    /**
     * @throws Exception
     */
    protected function validateDeleteItem(): void
    {
        if (empty($this->request->getPost('LIST_ITEM_ID'))) {
            throw new Exception('Не указан элемент');
        }
    }

    /**
     * @throws Exception
     */
    protected function addItem()
    {
        PropertyEnumService::getInstance()->add(
            $this->arParams['IBLOCK_API_CODE'],
            $this->arParams['PROPERTY_CODE'],
            $this->request->getPost('NEW_VALUE')
        );
    }

    /**
     * @throws Exception
     */
    protected function updateItem(): void
    {
        $request = $this->request->toArray();
        PropertyEnumService::getInstance()->update($request['LIST_ITEM_ID'], $request['NEW_VALUE']);
    }

    /**
     * @throws Exception
     */
    protected function deleteItem(): void
    {
        PropertyEnumService::getInstance()->delete($this->request->getPost('LIST_ITEM_ID'));
    }

    /**
     * @throws \Protobuf\Exception
     */
    protected function getResult(): void
    {
        $pageNavigationParams = new PagenavigationParams();
        $pageNavigationParams->setPageSize($this->arParams['PAGE_SIZE']);

        $propertyEnum = PropertyEnumService::getInstance();

        $propertyEnumData = $propertyEnum->getData($this->arParams['IBLOCK_API_CODE'], $this->arParams['PROPERTY_CODE']);

        $getListParams = new GetListParams();

        $getListParams->setFilter(['PROPERTY_ID' => $propertyEnumData['PROPERTY_ID']]);

        $result = $propertyEnum->getListPaginated($getListParams, $pageNavigationParams);

        $this->arResult['LIST_ITEMS'] = $result->getItems();
        $this->arResult['NAV'] = $result->getNav();
        $this->arResult['ERRORS'] = $this->errors;
    }
}
