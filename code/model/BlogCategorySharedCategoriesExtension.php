<?php


/**
 * extends BlogCategory
 * 
 */  


class BlogCategorySharedCategoriesExtension extends DataExtension
{

    
    function onBeforeWrite(){
        $this->BlogID = 0;
    }

}
