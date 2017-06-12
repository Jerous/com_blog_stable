 <?php
defined('_JEXEC') or die;
?>
<div id="j-sidebar-container" class="span2">
	<?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">
    <form action="<?php echo JUri::getInstance(); ?>" id="adminForm" name="adminForm" method="post">
        <fieldset class="form-horizontal">
            <legend>文章編輯/新增</legend>

            <!-- Title -->
            <div class="control-group">
                <label for="form-title" class="control-label">Title</label>
                <div class="controls">
                    <input type="text" id="form-title" name="title" value="<?php echo $this->item->title; ?>" />
                </div>
            </div>

            <!-- Alias -->
            <div class="control-group">
                <label for="form-alias" class="control-label">Alias</label>
                <div class="controls">
                    <input type="text" id="form-alias" name="alias" value="<?php echo $this->item->alias; ?>" />
                </div>
            </div>

            <!-- Created -->
            <div class="control-group">
                <label for="form-created" class="control-label">Created Time</label>
                <div class="controls">
                    <?php // echo JHtml::calendar('now', 'created', 'form-created'); ?>
                    <?php echo JHtml::calendar($this->item->created, 'created', 'form-created'); ?>
                </div>
            </div>

            <!-- Published -->
            <div class="control-group">
                <label for="form-created" class="control-label">Published</label>
                <?php echo JHtmlSelect::booleanlist('published', array(), $this->item->published); ?>
            </div>
        </fieldset>

        <fieldset>
            <legend>Text</legend>

            <!-- Intro text -->
            <div class="control-group row-fluid">
                <label for="form-title" class="control-label">Intro Text</label>
                <div class="controls span6">
                    <?php echo $this->introEditor; ?>
                </div>
            </div>

            <hr />

            <!-- Full text -->
            <div class="control-group row-fluid">
                <label for="form-alias" class="control-label">Full text</label>
                <div class="controls span6">
                    <?php echo $this->fullEditor; ?>
                </div>
            </div>
        </fieldset>

        <div class="hidden-inputs">
            <input type="hidden" name="id" value="<?php echo $this->item->id; ?>" />
            <input type="hidden" name="option" value="com_blog" />
            <input type="hidden" name="task" value="" />
        </div>
    </form>
</div>
