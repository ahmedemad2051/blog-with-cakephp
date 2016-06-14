    <div class='col-md-9'>
                            <?= $this->Form->create($post,['class'=>'contact-form','type'=>'file']) ?>
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
                            <?= $this->Form->input('content',['placeholder'=>'Write any thing','class'=>'form-control textarea edit','label'=>false,'type'=>'textarea','rows'=>10,'columns'=>30]) ?>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                  <button type="submit" class="btn main-btn pull-right">Update</button>
                  </div>
                  </div>
                <?= $this->Form->end(); ?>
                </div>