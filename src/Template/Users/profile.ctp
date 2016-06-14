<div class="container">
	<div class="row">
		<div class="span4 well">
            <div class="row">
                <div class='col-md-3'>
            		<div class="span1 col-md-12"><?= $this->Html->image('users/'.$user['img_url'],['class'=>'img-thumbnail']) ?></div>
            		<div class="col-md-12">
                    <br>
            			<p>Role: <?= $user['role'] ?></p>
                      	<h4>name: <strong><?= $user['name'] ?></strong></h4>
            			
            		</div>
                </div>
                <div class='col-md-9'>
              
                            <?= $this->Form->create(false,['class'=>'contact-form','type'=>'file']) ?>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <?= $this->Form->input('title',['placeholder'=>'Title','class'=>'form-control','label'=>false]) ?>
                        </div>
                    </div>
                    <div class="form-group">
                      <label for="username" class="cols-sm-2 control-label">Click for Upload image</label>
                      <div class="cols-sm-10">
                        <div class="input-group">
                          
                          <input type="file"  name="file" id="username" />
                        </div>
                      </div>
                    </div>
                 
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <?= $this->Form->input('content',['placeholder'=>'Write any thing','class'=>'form-control textarea','label'=>false,'type'=>'textarea','rows'=>3]) ?>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                  <button type="submit" class="btn main-btn pull-right">Post</button>
                  </div>
                  </div>
                <?= $this->Form->end(); ?>
                </div>
            </div>
        </div>
	</div>
    <div>
    </div>

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
          <i class="icon-user"></i> by
          <?= $this->Html->link($this->cell('User')->get([$post['user_id']])['name'],['controller'=>'Posts','action'=>'show',$post['user_id']]) ?>
       
          
          </a> 
          | <i class="icon-calendar"></i> <?= $post['created_at'] ?>
          | <i class="icon-comment"></i> <a><?= $this->cell('Comments')->count($post['id']) ?> Comments</a>
          
        </p>
      </div>
    </div>
  </div>

<hr>
<?php endforeach; ?>

    <div class='pagination'>
    <?= $this->paginator->numbers() ?>
    </div>
</div>
