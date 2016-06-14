    <div class="[ col-xs-12 col-sm-offset-1 col-sm-10 ]">
            <div class="[ panel panel-default ] panel-google-plus">
       
          
                <div class="panel-heading">
                    <div class='col-md-2'>
                    <?= $this->Html->image('users/'.$this->cell('User')->get($post['user_id'])['img_url'],['class'=>'img-thumbnail']) ?>
                    </div>
                    <h3>By: 
                     <?= $this->Html->link($this->cell('User')->get([$post['user_id']])['name'],['controller'=>'Posts','action'=>'show',$post['user_id']]) ?>
                    </h3>
                    <h5><span>Created at: </span> - <span><?= $post['created_at'] ?></span> </h5>
                </div>
                <br>
                <div class="panel-body break">
                    <h3><?= $post['title'] ?></h3>
                    <p><?= $post['content'] ?></p>
                    <br><br>
                    <?= $this->Html->image('uploads/'.$post['img_url']) ?>
                </div>

            </div>
        </div>
        <?php if($user): ?>
        <div class="[ col-xs-12 col-sm-offset-1 col-sm-10 ]">
            <div class="[ panel panel-default ] panel-google-plus">
                <div class="panel-heading">
                <?php if($post['user_id']==$user['id']): ?>

                    <?= $this->Html->link('Edit',['action'=>'edit','id'=>$post['id']],['class'=>'btn btn-default']) ?>

                    <?= $this->Form->postLink('Delete',['action'=>'delete','id'=>$post['id']],['class'=>'btn btn-danger','confirm'=>'Are you sure?']) ?>
                    <?php elseif($user['role']=='admin'): ?>
                     <?= $this->Form->postLink('Delete',['action'=>'delete','id'=>$post['id']],['class'=>'btn btn-danger','confirm'=>'Are you sure?']) ?>
                <?php endif; ?>    
                </div>
            </div>
        </div>
        <?php endif; ?>
<!-- Comments -->

<div class="container commentAjax">
  <?= $this->element('comments') ?>
</div>

<!------------------------ script ajax to add new comment -------------------------->

<script>
$(document).on('click','#submitComment',function(e){
    e.preventDefault();
    var parent=$(this).attr('parent');
    if(parent)
    {var content=$('#addComment'+parent).val();}
    else
    {
        var content=$('#addComment').val();
        parent=0;
    }
   
   
   var post_id=<?= $post['id'] ?>;
   $.ajax({
   url:"<?= $this->Url->build(['controller'=>'Comments','action'=>'add']) ?>",
   datatype:"json",
   data:{'content':content,'post_id':post_id,'parent':parent},
   type:"post",
   success:function(data)
   {
    $('.commentAjax').html(data);
   }
   });
});
</script>