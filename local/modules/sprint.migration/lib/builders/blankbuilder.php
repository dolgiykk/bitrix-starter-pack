<?php

namespace Sprint\Migration\Builders;

use Sprint\Migration\Locale;
use Sprint\Migration\Module;
use Sprint\Migration\VersionBuilder;

class blankbuilder extends VersionBuilder
{
    protected function isBuilderEnabled()
    {
        return true;
    }

    protected function initialize()
    {
        $this->setTitle(Locale::getMessage('BUILDER_Version1'));
        $this->setGroup('Tools');

        $this->addVersionFields();
    }

    protected function execute()
    {
        $template = $this->getVersionConfig()->getVal('migration_template');
        if ($template && is_file(Module::getDocRoot() . $template)) {
            $template = Module::getDocRoot() . $template;
        } else {
            $template = Module::getModuleDir() . '/templates/version.php';
        }

        $this->createVersionFile($template, [], false);
    }
}
