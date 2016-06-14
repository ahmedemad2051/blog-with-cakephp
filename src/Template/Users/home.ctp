<?php foreach($posts as $post): ?>

    <div class="col-md-12">
    <div class="row">
      <div class="col-md-12">
        <h4><strong><?= $post['title'] ?></strong></h4>
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <a href="#" class="thumbnail">
            <?= $this->Html->image('uploads/'.$post['img_url']) ?>
        </a>
      </div>
      <div class="col-md-9">      
        <p class='break'>
          <?= $this->Text->truncate($post['content'],800,['ellipsis'=>'......','exact'=>false]) ?>
        </p>
        <p><?= $this->Html->link('Read more',['controller'=>'Posts','action'=>'view',$post['id']]) ?></p>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <p></p>
        <p>
          <i class="icon-user"></i> by   <?= $this->Html->link($this->cell('User')->get([$post['user_id']])['name'],['controller'=>'Posts','action'=>'show',$post['user_id']]) ?>
          
          </a> 
          | <i class="icon-calendar"></i> <?= $post['created_at'] ?>
          | <i class="icon-comment"></i> <a ><?= $this->cell('Comments')->count($post['id']) ?> Comments</a>
          
        </p>
      </div>
    </div>
  </div>

<?php endforeach; ?>

<div class='pagination'>
    <?= $this->paginator->numbers() ?>
</div>