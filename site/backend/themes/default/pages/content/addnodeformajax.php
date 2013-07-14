<div class="title-box">
	<div class="button" id="save-node">Save</div>
	<div id="content-title" class="title-text" style="overflow: hidden;">Add a content</div>
</div>
<div class="corps-border">
	<div class="corps">
		<div style="">
		</div>

		<?= $this->Form->start(array("name" => "addNodeForm")); ?>
			<div style="padding: 20px;background: #F9F9F9;border-bottom: 1px solid #E5E5E5;">
				<div style="width: 200px;float: left;">
					Type of content
				</div>
				<div style="overflow: hidden;">
					<?= $this->Form->select("type", array(array("key"=>0, "value"=>"node"),array("key"=>1, "value"=>"taxonomy"))) ?>
					<br />
					<span style="color: grey;font-size: 0.8em;">Les champs obligatoires pour un type seront automatiquement rajoutés.</span>
				</div>
				<div style="clear: left;">
				</div>
			</div>
			<div style="padding: 20px;background: #F9F9F9;border-bottom: 1px solid #E5E5E5;">
				<div style="width: 200px;float: left;">
					Name of content
				</div>
				<div style="overflow: hidden;">
					<?= $this->Form->input("name") ?>
				</div>
				<div style="clear: left;">
				</div>
			</div>
			<?php for($cpt=0;$cpt<20;$cpt++): ?>
			<div id="column-<?= $cpt ?>" style="<?php if($cpt>1) : ?>display: none;<?php endif ?>padding: 20px;border-bottom: 1px dashed #E5E5E5;">
				<div style="width: 200px;float: left;">
					<?= $this->Form->input($cpt."[name]", array("style" => "width : 180px", "placeholder" => "Column's name")) ?>
				</div>
				<div style="overflow: hidden;">
					<?= $this->Form->select($cpt."[link]", array(array("key"=>0, "value"=>"None"),array("key"=>1, "value"=>"OneToOne"),array("key"=>2, "value"=>"OneToMany"),array("key"=>3, "value"=>"ManyToOne"),array("key"=>4, "value"=>"ManyToMany"))) ?>
					<br />
					<?= $this->Form->input($cpt."[ref]", array("placeholder" => "Link's reference", "style" => "margin-top: 5px;")) ?>
					<br />
					<?= $this->Form->checkbox($cpt."[editable]", "true", array("checked" => true)) ?> Editable
					<br />
					<?= $this->Form->radio($cpt."[size]", "small", array("checked" => true)) ?> Small 
					<?= $this->Form->radio($cpt."[size]", "big") ?> Big
					<br />
				</div>
				<div style="clear: left;">
				</div>
			</div>
			<?php endfor ?>
		<?= $this->Form->end() ?>
		<div class="button" id="addcolumn" style="margin: 10px;border-radius: 2px;float: right;
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
text-shadow: 0px -1px #71a45e;">Add a column</div>
			<div style="clear: both;">
	</div>
</div>