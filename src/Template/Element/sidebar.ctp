<div class="col-sm-3 col-md-2 sidebar">
	<ul class="nav nav-sidebar">
	  <li role="presentation"><?= $this->Html->link('View Properties', 
	              ['controller' => 'Properties', 'action' => 'index']) ?></li>
	  <li role="presentation"><?= $this->Html->link('Add Property', 
	              ['controller' => 'Properties', 'action' => 'add']) ?></li>
	  <li role="presentation"><?= $this->Html->link('Search Properties', 
	              ['controller' => 'Properties', 'action' => 'search']) ?></li>
	</ul>
	
	<ul class="nav nav-sidebar">
	  <li role="presentation"><?= $this->Html->link('Service Requests', 
	              ['controller' => 'ServiceRequests', 'action' => 'index']) ?></li>
	</ul>
</div>