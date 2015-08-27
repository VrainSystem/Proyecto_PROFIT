
<?php $this->beginContent(Rights::module()->appLayout); ?>

<div id="rights" class="partition-white padding-10">

    <div id="content" style="padding-left: 38px;">

		<?php if( $this->id!=='install' ): ?>

<!--			<div id="menu">

				//<?php $this->renderPartial('/_menu'); ?>
                          

			</div>-->
                     

		<?php endif; ?>

		<?php $this->renderPartial('/_flash'); ?>

		<?php echo $content; ?>

	</div><!-- content -->

</div>

<?php $this->endContent(); ?>