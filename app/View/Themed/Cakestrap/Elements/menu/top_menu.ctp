
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-inner">
		<div class="container">

			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>

			<a class="brand" target="" href="http://inscriptions.asosillery.fr">
												<?php /* echo $this->Html->image('aso.gif',array('width'=>'22', 'height'=>'22')); */?>

		Gestion des inscriptions d'ASO SILLERY
</a>
<?php $sess=$this->Session->read('User'); ?>

			<div class="nav-collapse">
				<ul class="nav">
				
								<?php if(isset($sess)){ ?>
				<?php if($this->Session->read('User.role')=="admin"){?>
					<?php echo $this->element('menu/menu_admin'); ?>
				<?php }?>
				
				<li class="divider-vertical dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Actions</a>
<ul class="dropdown-menu">
                            <li><?php echo $this->Html->link('Mes participations', array('controller'=>'utilisateurs', 'action'=>'participations')); ?></li>
                            <li><?php echo $this->Html->link('Tableau de bord', array('controller'=>'evenements', 'action'=>'dashboard')); ?></li>
                            <li><?php echo $this->Html->link('Mon profil', array('controller'=>'utilisateurs', 'action'=>'editer')); ?></li>
                            <li><?php echo $this->Html->link('Changer mon mot de passe', array('controller'=>'utilisateurs', 'action'=>'change_password')); ?></li>
                        </ul></li>					<?php
						
				$user=$this->Session->read('User');
					if(isset($user)){
						?>
						<li class="divider-vertical"><a href="#" >Compte : <?php echo $user['login']; ?></a></li>
						<li><?php
						echo $this->Html->link('Deconnexion', '/utilisateurs/logout');

						?></<li>
						<?php
					}
					
				}else{ ?> <li><a href="utilisateurs/request">Faire une demande d'accès</a></li> <?php }
				?>
				
				</ul>
			</div>
			
		</div>
	</div>
</div>