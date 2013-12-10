<li class="divider-vertical dropdown"><a data-toggle="dropdown" class="dropdown-toggle" href="#">Administration</a>
<ul class="dropdown-menu">

<li class="nav-header">Utilisateur</li>
 <li><?php echo $this->Html->link('Administrer les utilisateurs', array('controller'=>'utilisateurs', 'action'=>'liste')); ?></li>
 <li class="divider"></li>
<li class="nav-header">Evenement</li>
<li><?php echo $this->Html->link('Ajouter un évènement', array('controller'=>'evenements', 'action'=>'add')); ?></li>
<li class="nav-header">Circuit</li>
<li><?php echo $this->Html->link('Liste des circuits', array('controller'=>'courses', 'action'=>'index')); ?></li>
<li><a href="courses/add">Ajouter un circuit</a></li>
<li class="nav-header">Categorie</li>
<li><?php echo $this->Html->link('Ajouter une catégorie', array('controller'=>'utilisateurs', 'action'=>'editer')); ?></li>
                                                   </ul></li>
