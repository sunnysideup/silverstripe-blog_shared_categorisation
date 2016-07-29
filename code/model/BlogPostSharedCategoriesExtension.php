<?php

/**
 * extends BlogPost
 * 
 */  

class BlogPostSharedCategoriesExtension extends DataExtension
{

    /**
     * overrules has_many method
     * to return ALL categories
     *
     * @return DataList
     */
    function UsedCategories()
    {
        return $this->owner->Parent()->UsedCategories();
    }

    /**
     * overrules has_many method
     * to return ALL categories
     *
     * @return DataList
     */
    function UsedTags()
    {
        return $this->owner->Parent()->UsedTags();
    }

    /**
     * Update Fields
     * @return FieldList
     */
    public function updateCMSFields(FieldList $fields)
    {

        $fields->replaceField(
            "Categories",
            CheckboxSetField::create(
                'Categories',
                _t('BlogPost.Categories', 'Categories'),
                BlogCategory::get()->sort(array('Title'=>'ASC'))->map("ID", "Title"),
                $this->owner->Categories()
            )
        );
        $fields->replaceField(
            "Tags",
            CheckboxSetField::create(
                'Tags',
                _t('BlogPost.Tags', 'Tags'),
                BlogTag::get()->sort(array('Title'=>'ASC'))->map("ID", "Title"),
                $this->owner->Tags()
            )
        );        
        return $fields;
    }

}
