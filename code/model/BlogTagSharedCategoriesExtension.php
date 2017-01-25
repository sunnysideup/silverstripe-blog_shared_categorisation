<?php
/**
 * extends BlogTags
 *
 */
class BlogTagSharedCategoriesExtension extends DataExtension
{
    private static $summary_fields = array(
        'Title' => 'Title',
        'Blog.Title' => 'Belongs To'
    );

    /**
     * overrules has_many method
     * to return ALL tags
     *
     * @return DataList
     */
    public function UsedCategories()
    {
        return $this->owner->Parent()->UsedCategories();
    }

    /**d
     * overrules has_many method
     * to return ALL categories
     *
     * @return DataList
     */
    public function UsedTags()
    {
        return $this->owner->Parent()->UsedTags();
    }

    /**
     * Update Fields
     * @return FieldList
     */
    public function updateCMSFields(FieldList $fields)
    {
        $pleaseSelectOne = _t(
            'BlogTagSharedCategoriesExtension.PLEASE_SELECT_ONE',
            '-- please select one --'
        );
        $fields->insertAfter(
            DropDownField::create(
                'BlogID',
                'Show Under',
                array(0 => $pleaseSelectOne)
                    + Blog::get()->map()->toArray()
            ),
            'Title'
        );
    }
}
