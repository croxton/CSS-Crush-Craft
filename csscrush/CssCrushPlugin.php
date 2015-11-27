<?php
namespace Craft;

class CssCrushPlugin extends BasePlugin
{
    function getName()
    {
         return Craft::t('CSS Crush');
    }

    function getVersion()
    {
        return '1.0';
    }

    function getDeveloper()
    {
        return 'Mark Croxton';
    }

    function getDeveloperUrl()
    {
        return 'http://hallmark-design.co.uk';
    }
    function hasCpSection()
    {
        return false;
    }
}