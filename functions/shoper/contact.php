<?php
	include $_SERVER['DOCUMENT_ROOT'].'/config.php';
	$col_users = $db->selectCollection('users');
	$user_query = array('url' => $_POST['shoper_id']);
	$user = $col_users->findOne($user_query);
;?>


<div class="shoper_contact">
	
	<div class="shoper_contact_map">
		<iframe width="100%" height="250px" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=<?php echo $user['user_data']['contact'][0]['data'];?>,<?php echo $user['user_data']['contact'][1]['data'];?>&amp;ie=UTF8&amp;t=k&amp;z=17&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
	</div>
	
	<div class="shoper_contact_address">
		<div style="font-size: 16px; font-weight: 400;">		<?php echo $user['user_data']['contact'][0]['data'];?></div>
		<div>		<?php echo $user['user_data']['contact'][2]['data'];?></div>
		<div>		<?php echo $user['user_data']['contact'][3]['data'];?>, <?php echo $user['user_data']['contact'][1]['data'];?></div>

		<div>	<span>Tel. 1</span>			<?php echo $user['user_data']['contact'][7]['data'];?></div>
		<div>	<span>Tel. 2</span>			<?php echo $user['user_data']['contact'][8]['data'];?></div>
		<div>	<span>Email</span>			<?php echo $user['user_data']['contact'][9]['data'];?></div>
		
		<div class="top_user_menu--sep"></div>
		<div style="height: 10px;"></div>
		
		<div>	<span>NIP</span>			<?php echo $user['user_data']['contact'][4]['data'];?></div>
		<div>	<span>REGON</span>			<?php echo $user['user_data']['contact'][5]['data'];?></div>
		<div>	<span>KRS</span>			<?php echo $user['user_data']['contact'][6]['data'];?></div>
		
		
		<div class="top_user_menu--sep"></div>
		<div style="height: 10px;"></div>
		
		<div>	
		<a href="<?php echo $user['user_data']['contact'][10]['data'];?>">	<span class="icon-facebook"></span>		</a>	
		<a href="<?php echo $user['user_data']['contact'][11]['data'];?>">	<span class="icon-instagram"></span>	</a>	
		<a href="<?php echo $user['user_data']['contact'][12]['data'];?>">	<span class="icon-youtube2"></span>		</a>	
		</div>
	</div>
	
</div>

<div class="shoper_contact_form">
	<div style="width: 90%; text-align: left;">Formularz kontaktowy</div>
	<input id="form_email" placeholder="Twój email">
	<textarea id="form_message" placeholder="Twoja wiadomość"></textarea>
	<div style="text-align: center;">
		<div id="form_info"></div>
		<button class="blue_btn" style="border:0" id="form_send">Wyślij</button></div>
	</div>
</div>
