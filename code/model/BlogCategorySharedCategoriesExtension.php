<?php


/**
 * extends BlogCategory
 *
 */


class BlogCategorySharedCategoriesExtension extends DataExtension
{
    private static $summary_fields = array(
        'Title' => 'Title',
        'Blog.Title' => 'Belongs To'
    );

    /**
     * Update Fields
     * @return FieldList
     */
    public function updateCMSFields(FieldList $fields)
    {
        $pleaseSelectOne = _t(
            'BlogCategorySharedCategoriesExtension.PLEASE_SELECT_ONE',
            '-- please select one --'
        );
        $fields->insertAfter(
            DropDownField::create(
                'BlogID',
                'Belongs To',
                array(0 => $pleaseSelectOne)
                    + Blog::get()->map()->toArray()
            ),
            'Title'
        );
    }
}
