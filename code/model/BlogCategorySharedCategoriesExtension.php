<?php


/**
 * extends BlogCategory
 *
 */


class BlogCategorySharedCategoriesExtension extends DataExtension
{
    public function onBeforeWrite()
    {
        $this->BlogID = 0;
    }
}
