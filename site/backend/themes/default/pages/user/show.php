<?php 
	partial("header", array("header" => "content", "title" => "Fozeek")); 
?>
<div style="padding: 20px;">
	<div style="float: right;width: 250px;margin-left: 20px;">
		<div style="position: relative;height: 250px;background: #F9F9F9 url(http://img.hebus.com/hebus_2012/07/31/1343752964_44072.jpg) center center no-repeat;">
			<div style="position: absolute;bottom: 0px;right: 0px;height: 1px;width: 100%;background: rgba(0,0,0, 0.2);">
			</div>
			<div style="position: absolute;top: 0px;right: 0px;height: 1px;width: 100%;background: rgba(0,0,0, 0.2);">
			</div>
			<div style="position: absolute;top: 1px;right: 0px;height: 248px;width: 1px;background: rgba(0,0,0, 0.2);">
			</div>
			<div style="position: absolute;top: 1px;left: 0px;height: 248px;width: 1px;background: rgba(0,0,0, 0.2);">
			</div>
		</div>
		<div style="padding: 10px;font-size: 0.8em;color: #377890;">
			Image de profil gérée par <a href="http://gravatar.com" target="_blank">Gravatar</a>
		</div>
		<div style="height: 15px;"></div>
		<div style="float: right;background: url(/img/icons/pencil.png);width: 16px;height: 16px;margin-top: 2px;margin-right: 2px;">
		</div>
		<div style="padding-left: 10px;padding-bottom: 3px;color: #377890;">
			Interêts
		</div>
		<?php $values = array("PHP", "HTML", "Java", "Catwoman", "Bikini", "Motos"); ?>
		<?php for($cpt=0;$cpt<3;$cpt++) { ?>
		<div style="border-top: 1px solid #c7cbd4;font-size: 0.9em;color: #373737;border-bottom: 1px solid #c7cbd4;margin-bottom: -1px;padding: 5px;padding-left: 10px;">
			<?= $values[$cpt] ?>
		</div>
		<?php } ?>
		<div style="height: 15px;"></div>
		<div style="float: right;background: url(/img/icons/pencil.png);width: 16px;height: 16px;margin-top: 2px;margin-right: 2px;">
		</div>
		<div style="padding-left: 10px;padding-bottom: 3px;color: #377890;">
			Domains
		</div>
		<?php for($cpt=3;$cpt<6;$cpt++) { ?>
		<div style="border-top: 1px solid #c7cbd4;font-size: 0.9em;color: #373737;border-bottom: 1px solid #c7cbd4;margin-bottom: -1px;padding: 5px;padding-left: 10px;">
			<?= $values[$cpt] ?>
		</div>
		<?php } ?>
	</div>
	<div style="overflow: hidden;">
		<div style="font-size: 1.2em;">
			Actualités
		</div>
		<div style="border-bottom: 1px solid rgb(223, 227, 235);font-size: 0.8em;color: #373737;padding: 10px;padding-left: 0px;">
			<div style="float: left;width: 50px;height: 50px;margin-right: 10px;position: relative;background: #F9F9F9 url(http://img.hebus.com/hebus_2012/07/31/1343752964_44072.jpg) center center no-repeat;">
				<div style="position: absolute;bottom: 0px;right: 0px;height: 1px;width: 100%;background: rgba(0,0,0, 0.2);">
				</div>
				<div style="position: absolute;top: 0px;right: 0px;height: 1px;width: 100%;background: rgba(0,0,0, 0.2);">
				</div>
				<div style="position: absolute;top: 1px;right: 0px;height: 48px;width: 1px;background: rgba(0,0,0, 0.2);">
				</div>
				<div style="position: absolute;top: 1px;left: 0px;height: 48px;width: 1px;background: rgba(0,0,0, 0.2);">
				</div>
			</div>
			<div style="overflow: hidden;">
				<a>Fozeek</a> commented his own article <a>fuckers</a> :
				<div style="padding: 5px;border-left: 3px solid rgb(223, 227, 235);margin-top: 4px;">
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit dicta suscipit iure rerum vel officiis placeat ipsum consectetur saepe incidunt doloribus dolorum at sunt dolores architecto repellat culpa ducimus facere.
				</div>
			</div>
			<div style="clear: both;">
			</div>
		</div>
		<div style="border-bottom: 1px solid rgb(223, 227, 235);font-size: 0.8em;color: #373737;padding: 10px;padding-left: 0px;">
			<div style="float: left;width: 50px;height: 50px;margin-right: 10px;position: relative;background: #F9F9F9 url(http://img.hebus.com/hebus_2012/09/17/1347902214_48853.jpg) center center no-repeat;">
				<div style="position: absolute;bottom: 0px;right: 0px;height: 1px;width: 100%;background: rgba(0,0,0, 0.2);">
				</div>
				<div style="position: absolute;top: 0px;right: 0px;height: 1px;width: 100%;background: rgba(0,0,0, 0.2);">
				</div>
				<div style="position: absolute;top: 1px;right: 0px;height: 48px;width: 1px;background: rgba(0,0,0, 0.2);">
				</div>
				<div style="position: absolute;top: 1px;left: 0px;height: 48px;width: 1px;background: rgba(0,0,0, 0.2);">
				</div>
			</div>
			<div style="overflow: hidden;">
				<a>Dolitia</a> commented his article <a>fuckers</a> :
				<div style="padding: 5px;border-left: 3px solid rgb(223, 227, 235);margin-top: 4px;">
					Lorem iure rerum vel officiis placeat ipsum consectetur saepe incidunt doloribus dolorum at sunt dolores architecto repellat culpa ducimus facere.
				</div>
			</div>
			<div style="clear: both;">
			</div>
		</div>
	</div>
	<div style="clear: both;">
	</div>
	<br />
	<div style="float: right;margin-top: 20px;width: 508px;">
		<div style="float: left;border-left: 1px solid #E5E5E5;border-right: 1px solid #E5E5E5;margin-left: -1px;padding: 10px;width: 75px;text-align: center;">
			Vues
		</div>
		<div style="float: left;border-left: 1px solid #E5E5E5;border-right: 1px solid #E5E5E5;margin-left: -1px;padding: 10px;width: 150px;text-align: center;">
			Commentaires
		</div>
		<div style="float: left;border-left: 1px solid #E5E5E5;border-right: 1px solid #E5E5E5;margin-left: -1px;padding: 10px;width: 100px;text-align: center;">
			Note
		</div>
		<div style="float: left;background: #a5d2e3;padding: 10px;width: 100px;text-align: center;">
			Etat
		</div>
		<div class="cb"></div>
	</div>
	<div style="font-size: 2em;color: #377890;margin-bottom: 20px;">Articles</div>
	<div class="cb"></div>
	<?php for($cpt=0;$cpt<4;$cpt++) { ?>
		<div style="border-top: 1px solid #E5E5E5;color: #373737;border-bottom: 1px solid #E5E5E5;margin-bottom: -1px;">
			<div style="float: right;background: #c0e4f1;padding: 10px;width: 100px;text-align: center;">
				Checked
			</div>
			<div style="float: right;border-left: 1px solid #E5E5E5;margin-left: -1px;padding: 10px;width: 100px;text-align: center;">
				<?= round($cpt*5/10+32/3) ?>
			</div>
			<div style="float: right;border-left: 1px solid #E5E5E5;border-right: 1px solid #E5E5E5;margin-left: -1px;padding: 10px;width: 150px;text-align: center;">
				<?= round(($cpt*5/10+32/3)/4) ?>
			</div>
			<div style="float: right;border-left: 1px solid #E5E5E5;border-right: 1px solid #E5E5E5;margin-left: -1px;padding: 10px;width: 75px;text-align: center;">
				<?= round($cpt*5/10+32/3) ?>
			</div>
			<div style="overflow: hidden;">
				<div style="padding: 10px;">
					<?= $cpt ?>
				</div>
			</div>
			<div class="cb"></div>
		</div>
	<?php } ?>
</div>
<?php partial("footer"); ?>