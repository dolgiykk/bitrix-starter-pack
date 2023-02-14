<?php
/**
 * Returns options from array-based configuration stored in php-files.
 *
 * @param  string $optionName Path to option divided by dots
 * @param  mixed $defaultValue Optional default value returned if option not found.
 * @return mixed Option value from configuration file or default value
 *
 * @throws \RuntimeException if option not found and $defaultValue not specified.
 *
 * You should specify correct path to configuration file.
 *
 * <code>
 * echo config('price.dealer.code');
 * echo config('db.user', 'root');
 * </code>
 */
function config($optionName, $defaultValue = null)
{
    static $configuration;
    if (empty($configuration)) {
        if (defined('LOCAL_CONFIG_FILENAME') && file_exists(LOCAL_CONFIG_FILENAME) && is_readable(LOCAL_CONFIG_FILENAME)) {
            $configuration = require LOCAL_CONFIG_FILENAME;
        } elseif (defined('CONFIG_FILENAME') && file_exists(CONFIG_FILENAME) && is_readable(CONFIG_FILENAME)) {
            $configuration = require CONFIG_FILENAME;
        } else {
            throw new \RuntimeException('Configuration file not found or unreadable');
        }
    }

    $optionPath = explode('.', $optionName);
    $option = $configuration;
    foreach ($optionPath as $key) {
        if (isset($option[$key])) {
            $option = $option[$key];
        } elseif (! is_null($defaultValue)) {
            return $defaultValue;
        } else {
            throw new \RuntimeException(sprintf('Option "%s" not found', $optionName));
        }
    }

    return $option;
}
