<div class="title-box">
	<div class="button" id="save-content">Add a node</div>
	<div id="content-title" class="title-text" style="overflow: hidden;">Node's Manager</div>
</div>
<div class="corps-border">
	<div class="corps" style="background: #d6d8de;position: relative;">
		<div style="float: left;width: 300px;height: 100%;margin-right: -1px;border-right: 1px solid rgb(184, 180, 218);">
			<div style="height: 1px;background: rgb(235, 236, 238);">
			</div>
			<?php $bundles = Bundles::getBundle("content"); foreach ($bundles["tables"] as $key => $value) : ?>	
					<div style="border-bottom: 1px solid #c9cbd2;cursor: pointer;
border-top: 1px solid #dbdde4;
color: #6d6b78;
padding: 10px;
padding-left: 15px;
font-size: 0.8em;
font-weight: bold;
text-shadow: 0px 1px #eeedf3;">
						<?= ucfirst($value) ?>
					</div>
			<?php endforeach; ?>
			<div style="clear: both;">
			</div>
		</div>
		<div style="overflow: hidden;padding: 20px;border-left: 1px solid rgb(184, 180, 218);background: white;">
			<span style="font-size: 0.8em;">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa nulla nam veniam ipsam ullam perferendis magni dolorum repellendus quas aliquam hic error totam doloribus vel ex fuga odit nihil esse.
			
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa nulla nam veniam ipsam ullam perferendis magni dolorum repellendus quas aliquam hic error totam doloribus vel ex fuga odit nihil esse.
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa nulla nam veniam ipsam ullam perferendis magni dolorum repellendus quas aliquam hic error totam doloribus vel ex fuga odit nihil esse.
			
			</span>
			<div class="button" id="save-content" style="margin-top: 20px;border-radius: 2px;float: right;
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