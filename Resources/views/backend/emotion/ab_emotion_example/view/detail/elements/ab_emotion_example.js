//{block name="backend/emotion/view/detail/elements/base"}
//{$smarty.block.parent}
Ext.define('Shopware.apps.Emotion.view.detail.elements.AbEmotionExample', {

    /**
     * Extend from the base class for the grid elements.
     */
    extend: 'Shopware.apps.Emotion.view.detail.elements.Base',

    /**
     * Create the alias matching with the xtype you defined for your element.
     * The pattern is always 'widget.detail-element-' + xtype
     */
    alias: 'widget.detail-element-ab-emotion-example',

    /**
     * You can define an additional CSS class which will be used for the grid element.
     */
    componentCls: 'emotion--ab-emotion-example',

    /**
     * Define the path to an image for the icon of your element.
     * You could also use a base64 string.
     */
    icon: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAHBJREFUeNpi7Ju95D8DBaAoNYYRmU+peUwMgwyMOmjUQaMOGnXQqIMGu4NYqG0get02GmWjaYhUMOzaQyw0NNsRmOMOEBmqDkBq/2iiHnXQqINGHTTqoFEHjTpotIFGGTAANiuIVksPB/UPiygDCDAAYIwS2uYlRscAAAAASUVORK5CYII=',

});
//{/block}