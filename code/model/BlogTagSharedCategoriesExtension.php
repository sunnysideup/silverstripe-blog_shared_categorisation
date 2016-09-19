<?php
/**
 * extends BlogTags
 *
 */
class BlogTagSharedCategoriesExtension extends DataExtension
{


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
        //called when creating a new tag from a grdifield - why??
        /*$fields->replaceField(
            "Categories",
            CheckboxSetField::create(
                'Categories',
                _t('BlogPost.Categories', 'Categories'),
                BlogCategory::get()->map("ID", "Title"),
                $this->owner->Categories()
            )
        );      */

        return $fields;
    }
}
