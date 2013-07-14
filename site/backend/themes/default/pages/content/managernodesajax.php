<div class="title-box">
	<div class="button" id="new-node">Add a content</div>
	<div id="content-title" class="title-text" style="overflow: hidden;">Content Manager</div>
</div>
<div class="corps-border">
	<div class="corps" style="background: #d6d8de;position: relative;">
		<div style="float: left;width: 300px;height: 100%;margin-right: -1px;border-right: 1px solid rgb(184, 180, 218);">
			<div style="height: 1px;background: rgb(235, 236, 238);">
			</div>
			<div style="border-bottom: 1px solid #c9cbd2;
color:black;
padding: 10px;
padding-left: 15px;
padding-top: 20px;
font-size: 0.8em;
font-weight: bold;
text-shadow: 0px 1px #eeedf3;
background: #E5E5E5;">
						Nodes
					</div>
			<?php foreach ($nodes as $key => $value) : ?>	
					<div class="showshema" data-content="<?= $key ?>" style="border-bottom: 1px solid #c9cbd2;cursor: pointer;
border-top: 1px solid #dbdde4;
color: #6d6b78;
padding: 10px;
padding-left: 25px;
font-size: 0.8em;
font-weight: bold;
text-shadow: 0px 1px #eeedf3;background: #d6d8de;">
						<?= ucfirst($key) ?>
					</div>
			<?php endforeach; ?>
			<div style="border-bottom: 1px solid #c9cbd2;
color:black;
padding: 10px;
padding-left: 15px;
padding-top: 20px;
font-size: 0.8em;
font-weight: bold;
text-shadow: 0px 1px #eeedf3;
background: #E5E5E5;">
						Taxonomies
					</div>
			<?php foreach ($taxonomies as $key => $value) : ?>	
					<div class="showshema" data-content="<?= $key ?>" style="border-bottom: 1px solid #c9cbd2;cursor: pointer;
border-top: 1px solid #dbdde4;
color: #6d6b78;
padding: 10px;
padding-left: 25px;
font-size: 0.8em;
font-weight: bold;
text-shadow: 0px 1px #eeedf3;background: #d6d8de;">
						<?= ucfirst($key) ?>
					</div>
			<?php endforeach; ?>
			<div style="clear: both;">
			</div>
		</div>
		<div id="panelshema" style="overflow: hidden;border-left: 1px solid rgb(184, 180, 218);background: white;">
			<div style="font-size: 2em;text-align: center;padding-top: 70px;padding-bottom: 300px;color: grey;">
				Select a content to watch its shema !
			</div>
			<div class="button" id="save-content" style="display: none;margin-top: 20px;border-radius: 2px;float: right;
background: #93cd71;
background: -moz-linear-gradient(top, #93cd71 0%, #74af67 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#93cd71), color-stop(100%,#74af67));
background: -webkit-linear-gradient(top, #93cd71 0%,#74af67 100%);
background: -o-linear-gradient(top, #93cd71 0%,#74af67 100%);
background: -ms-linear-gradient(top, #93cd71 0%,#74af67 100%);
background: linear-gradient(to bottom, #93cd71 0%,#74af67 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#93cd71', endColorstr='#74af67',GradientType=0 );
border-bottom: 1px solid #5e8e54;
border-top: 1px solid #dbdde4;
color: white;
padding: 10px;
cursor: pointer;
padding-left: 15px;
padding-right: 15px;
font-size: 0.8em;
font-weight: bold;
text-shadow: 0px -1px #71a45e;">Next</div>
			<div style="clear: both;">
		</div>
		</div>
		<div style="clear: both;">
		</div>
	</div>
</div>