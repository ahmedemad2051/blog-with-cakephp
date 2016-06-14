
<div class="row">
    <div class="col-sm-10 col-sm-offset-1" id="logout">
        <div class="page-header">
            <h3 class="reviews">Leave your comment</h3>
          
        </div>
        <div class="comment-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Comments</h4></a></li>

                <?php if($user): ?>
                <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Add comment</h4></a></li>
                <?php endif; ?>
            </ul>            
            <div class="tab-content">
                <div class="tab-pane active" id="comments-logout">                
                    <ul class="media-list">

                    <?php foreach($comments as $comment): ?>

                      <li class="media">
                        <a class="pull-left" href="#">
                        
                          <?= $this->Html->image('users/'.$this->cell('User')->get($comment['user_id'])['img_url'],['class'=>'media-object img-circle']) ?>
                        </a>
                        <div class="media-body">
                          <div class="well well-lg">
                              <h4 class="media-heading text-uppercase reviews"><?= $this->cell('User')->get($comment['user_id'])['name'] ?> </h4>
                              <ul class="media-date text-uppercase reviews list-inline">
                                <li class="dd"><?= $comment['created_at'] ?></li>
                              
                              </ul>
                              <p class="media-comment">
                                <?= $comment['content'] ?>
                              </p>

                              <?php if($user): ?>
                              <a class="btn btn-info btn-circle text-uppercase" data-toggle="collapse" href="#replyTwo<?= $comment['id'] ?>" id="reply">Reply</a>
                              <?php endif; ?>
                              <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyOne<?= $comment['id'] ?>" > 
                              <?= $this->cell('Comments')->count($post['id'],$comment['id']) ?> comments</a>
                          </div>              
                        </div>
                        <!-------------------------------- form for show reply  -------------------------------------->

                        <div class="collapse" id="replyOne<?= $comment['id'] ?>">
                            <ul class="media-list">
                              <?php foreach($this->cell('Comments')->replies($post['id'],$comment['id']) as $replay): ?>
                                <li class="media media-replied">
                                    <a class="pull-left" href="#">
                                          <?= $this->Html->image('users/'.$this->cell('User')->get($replay['user_id'])['img_url'],['class'=>'media-object img-circle']) ?>
                                    </a>
                                    <div class="media-body">
                                      <div class="well well-lg">
                                          <h4 class="media-heading text-uppercase reviews"><?= $this->cell('User')->get($replay['user_id'])['name'] ?></h4>
                                          <ul class="media-date text-uppercase reviews list-inline">
                                            <li class="dd"><?= $replay['created_at'] ?></li>
                                          
                                          </ul>
                                          <p class="media-comment">
                                            <?= $replay['content'] ?>
                                          </p>
                                      </div>              
                                    </div>
                                </li>
                             <?php endforeach; ?>
                            </ul>  
                        </div>

                        
                        <!-------------------------------- form for add reply  -------------------------------------->

                        <?php if($user): ?>
                         <div class="collapse col-md-offset-1" id="replyTwo<?= $comment['id'] ?>">
                            <ul class="media-list">
                                <li class="media media-replied">
                                  
                                    <div class="media-body">
                                      <div class="well well-lg">
                                         <form action="#" method="post" class="form-horizontal" id="commentForm" role="form"> 
                                            <div class="form-group">
                                                <label for="email" class="col-sm-2 control-label">Comment</label>
                                                <div class="col-sm-10">
                                                  <textarea class="form-control" name="addComment" id="addComment<?= $comment['id'] ?>" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">                    
                                                    <button class="btn btn-success btn-circle text-uppercase" parent=<?= $comment['id'] ?> type="submit" id="submitComment">Reply</button>
                                                </div>
                                            </div>            
                                        </form>
                                       
                                      </div>              
                                    </div>
                                </li>
                            </ul>  
                        </div>
                      </li>  
                      <?php endif; ?>

                      <?php endforeach; ?>
                      
                    </ul> 
                </div>

                 <!------------------------------- add comment ----------------------------->

                 <?php if($user): ?>
                <div class="tab-pane" id="add-comment">
                    <form action="#" method="post" class="form-horizontal" id="commentForm" role="form"> 

                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Comment</label>
                            <div class="col-sm-10">
                              <textarea class="form-control" name="addComment" id="addComment" rows="5"></textarea>
                            </div>
                        </div>
                
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">                    
                                <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"> Summit comment</button>
                            </div>
                        </div>            
                    </form>
                </div>
                 <?php endif; ?>

            </div>
        </div>
    </div>
  </div>

