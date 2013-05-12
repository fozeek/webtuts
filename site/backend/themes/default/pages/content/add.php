<?php 
	partial("header", array("header" => "content", "title" => "Add a content")); 
?>
<div style="padding: 20px;margin-top: -1px;min-height: 500px;background: white;">
	<div style="padding-bottom: 10px;border-bottom: 1px solid #E5E5E5;margin-bottom: 10px;">
		<div style="font-size: 1.6em;float: left;">
			<?php echo ucfirst(text("add_an_article")); ?>
		</div>
		<div style="clear: both;">
		</div>
	</div>

	<form action="" method="post">
		<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
			<?php echo ucfirst(text("title")); ?> (fr)
		</div>
		<div style="overflow: hidden;padding: 10px;">
			<input name="titlefr" type="text"/>
		</div>
		<div style="clear: left;">
		</div>
		
		<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
			<?php echo ucfirst(text("title")); ?> (en)
		</div>
		<div style="overflow: hidden;padding: 10px;">
			<input name="titleen" type="text"/>
		</div>
		<div style="clear: left;">
		</div>

		<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
			<?php echo ucfirst(text("text")); ?> (fr)
		</div>
		<div style="overflow: hidden;padding: 10px;">
			<textarea name="textfr"></textarea>
		</div>
		<div style="clear: left;">
		</div>
		
		<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
			<?php echo ucfirst(text("text")); ?> (en)
		</div>
		<div style="overflow: hidden;padding: 10px;">
			<textarea name="texten"></textarea>
		</div>
		<div style="clear: left;">
		</div>
		
		<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
			<?php echo ucfirst(text("category")); ?>
		</div>
		<div style="overflow: hidden;padding: 10px;">
			<select name="category">
				<?php foreach($categories as $category){ ?>
					<option value=<?php echo $category->get('id'); ?> ><?php echo lang($category->get('name')); ?></option>
				<?php } ?>
			</select>
		</div>
		<div style="clear: left;">
		</div>
		
		<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
			<?php echo ucfirst(text("node")); ?>
		</div>
		<div style="overflow: hidden;padding: 10px;">
			<select name="node">
				<?php foreach($nodes as $node){ ?>
					<option value=<?php echo $node->get('id'); ?> ><?php echo lang($node->get('name')); ?></option>
				<?php } ?>
			</select>
		</div>
		<div style="clear: left;">
		</div>

		<div style="float: left;width: 200px;padding: 15px;font-weight: bold;">
		</div>
		<div style="overflow: hidden;padding: 10px;">
			<input type="submit" value="<?php echo ucfirst(text("save")); ?>">
		</div>
		<div style="clear: left;">
		</div>
	</form>
</div>

<?php partial("footer"); ?>