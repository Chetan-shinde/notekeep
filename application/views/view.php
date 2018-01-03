<?php $this->load->view('layout/header'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<form class="form-horizontal search-box">
			  <div class="form-groups">
			    <div class="search-div">
			     <input type="text" class="form-control" id="searchnote" placeholder="Search note">
			    </div>
			  </div>
			</form>
		</div>
		<div class="col-md-9">
			<div class="new-note">
				<a href="javascript:void(0)" class="note-icon-link"><i class="fa fa-plus" aria-hidden="true"></i></a>
			</div>
           <div class="user-icon" data-user-id="<?php echo $this->session->userdata('user_id'); ?>"><ul class="nav navbar-nav">
            <li id="fat-menu" class="dropdown"> 
            	<a href="#" class="dropdown-toggle" id="drop3" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">  <i class="fa fa-user" aria-hidden="true"></i>
			 <i class="fa fa-angle-down" aria-hidden="true"></i></a> 
			 <ul class="dropdown-menu" aria-labelledby="drop3"> <li><a href="<?php echo base_url(); ?>signout">Sign Out</a></li> <li><a href="<?php echo base_url(); ?>view/sharednotes">Shared notes</a></li> <li><a href="#">Something else here</a></li> <li role="separator" class="divider"></li> <li><a href="#">Separated link</a></li> </ul> </li> </ul>  </div>
		</div>
	</div>
	<hr class="hr-primary" />
</div>

<div class="container notecontainer">
	<div class="row notes">
		<div class="col-md-3 sidebar">
			<h3>Tags</h3>
			 <?php
              foreach ($tags as $key => $value) {
              	 echo $value." "; 
              }
			  ?>
		</div>
		<div class="col-md-9 note-right-sidebar">
		<div class="row note-row">
			<?php
			$i=1;
			foreach ($notes as $key => $value) {
				
				if($i % 5 == 0){
                      echo '</div><div class="row note-row">';
				}
				$i++;
				?>
			
				 <div class="col-md-3">
					<div class="note-box" data-noteid="<?php echo $value->note_id ?>">
					  <div class="note-inner-box">
					   <h3><?php echo $value->note_title; ?></h3>
					   <p><?php echo substr($value->note_content,0,50); ?></p>
					  </div> 
					   <div class="note-tools">
					   	<ul class="list-inline">
					   		<li><i class="fa fa-trash-o" aria-hidden="true"></i></li>
					  	    <li class="note-share"><i class="fa fa-circle" aria-hidden="true"></i><i class="fa fa-circle" aria-hidden="true"></i></li>
					  	</ul> 
					   </div>
				    </div>
				  </div>
			
				<?php
			}
			?>
		</div>
		</div>
	</div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="exampleModalLabe">Edit Note</h3>
      </div>
      <div class="modal-body edit-model-body">
        <form id="newform">
          <div class="form-group">
            <label for="title-name" class="control-label">Title:</label>
            <input type="text" class="form-control" id="title-name-edit">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea class="form-control extraheight" id="message-text-edit"></textarea>
          </div>
            <div class="form-group">
          	<label for="tags" class="control-label">Tags:</label>
          	<input type="text" name="taginputedit" class="form-control" value="" id="tags-input-edit" data-role="tagsinput" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary editnotesavebtn">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- New Model-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="exampleModalLabel">New Note</h3>
      </div>
      <div class="modal-body">
        <form id="newform">
          <div class="form-group">
            <label for="title-name" class="control-label">Title:</label>
            <input type="text" class="form-control" id="title-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Message:</label>
            <textarea class="form-control extraheight" id="message-text"></textarea>
          </div>
          <div class="form-group">
          	<label for="tags" class="control-label">Tags:</label>
          	<input type="text" name="taginput" class="form-control" value="" id="tags-input" data-role="tagsinput" />
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary newnotesavebtn">Save</button>
      </div>
    </div>
  </div>
</div>
<!-- Share modal-->
<div class="modal fade" id="sharemodal" tabindex="-1" role="dialog" aria-labelledby="sharenotelabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="sharenotelabel">Share Note</h3>
      </div>
      <div class="modal-body">
        <form id="shareform">
          <div class="form-group">
            <label for="title-name" class="control-label">User:</label>
            <input type="text" name="shareuserinput" class="form-control shareuserinput" value="" id="share-user-input" />
            <input type="hidden" name="hiddenuserid" value="" id="hidden-user-input">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Permission:</label>
            <input type="radio" name="permission" value="1"> Read
            <input type="radio" name="permission" value="2"> Update
            <input type="radio" name="permission" value="3"> Owner
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary sharebtn">Save</button>
      </div>
    </div>
  </div>
</div>
<?php $this->load->view('layout/footer'); ?>