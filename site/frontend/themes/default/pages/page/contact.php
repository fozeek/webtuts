<div id="contact-page">
<!-- contact content -->
    <div class="middle-column">
	<div class="border-big-title">
		<h1 class="left-title big-title">
		    <?php echo CONTACT_US; ?>
		</h1>
	    <div class="cl"></div>
	</div>
	
	<p><?php echo CONTACT_TEXT; ?></p>
	
	<form method="post" action="" id="contact-form">
	    <label class="label"><?php echo LBL_PSEUDO; ?> : </label>
	    <input type="text" name="nickname" value="" placeholder="<?php echo PL_PSEUDO; ?>" required/>	
	    
	    <div class="cl"></div>

	    <label class="label"><?php echo LBL_EMAIL; ?> : </label>
	    <input type="text" name="mail" value="" placeholder="<?php echo PL_EMAIL; ?>"  required/>	
	    
	    <div class="cl"></div>
	    <label class="label" <?php echo (!isset($error["email"]) ? 'style="display: none;"' : ''); ?>></label>
	    <span class="tooltip" <?php echo (isset($error["email"]) ? 'style="display: block;margin: 0;float:left;"' : ''); ?>><?php echo WRONG_PATTERN_EMAIL; ?></span>
	    <div class="cl"></div>
	    
	    <label class="label"><?php echo LBL_OBJECT; ?> : </label>
	    <input type="text" name="object" value="" placeholder="<?php echo PL_OBJECT; ?>" required/>	
	    
	    <div class="cl"></div>
	    
	    <label class="label" label><?php echo LBL_MSG; ?> : </label>
	    <textarea name="message" cols="10" rows="10" placeholder="<?php echo PL_MSG; ?>" required></textarea>
	    
	    <div class="cl"></div>
	    
	    <div class="marginAuto">
			<div class="button big-button">
			    <span>
				<input type="submit" value="Envoyer" />
			    </span>
			</div>
	    </div>
	</form>
    </div>
</div>