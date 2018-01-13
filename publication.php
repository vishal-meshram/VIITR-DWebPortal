<?php
include_once 'header.php';
include "includes/DBconn_inc.php";

//code to get all values from user table

//query to select data match with email address
$sql = "Select * FROM users WHERE empEmail='".$_SESSION['session_empEmail']."' ";
//execute the query
$result = mysqli_query($conn,$sql);
//collect the result into row
$row=mysqli_fetch_assoc($result);

$id = $row['empNumber'];
$firstname = $row['empFirstName'];
$lastname = $row['empLastName'] ;
$email = $row['empEmail'];
$department = $row['empDepartment'];
?>

<div class="main-content"> <!-- Main content starts here -->
	<div class="page-content"> <!-- Page-content starts here -->
					
		<div class="row"> <!-- Row starts here -->
			<div class="col-sm-12"> <!-- First column in the Row-->

				<div class="widget-box"> <!-- Widget Box starts here -->
					<div class="widget-header"> <!-- Widget Header -->
						<h4 class="widget-title">Publication Information</h4>
					</div>

				<div class="widget-body"> <!-- Widget Body -->
					<div class="widget-main no-padding">
					<!-- Form Starts Here -->
						<form action="includes/papers_inc.php" method="POST" enctype="multipart/form-data">
							<!-- <legend>Form</legend> -->
										
							<fieldset id="field">
								<div id="author">
									<div>
										<label class="col-sm-12 bolder brown">Author Information:</label>
									</div>
									<br>
									<hr>
												
									<div class="row"> <!-- First row of authors information starts here-->
										<div class="col-sm-4">									
											<label>Emp Id / Roll No: </label>
											<input type="text" name="empid[]" id="empid" placeholder="Enter the Emp Id/Roll No">
											<!-- This statement can be used to print the Emp Id of logined user 	From Database	
											<input type="text" name="empid" id="empid" value="<?php echo $id ?>">-->
										</div>
										<div class="col-sm-4">	
											<label>First Name: </label>
											<input type="text" name="firstname[]" id="firstname" placeholder="Enter the First Name" />
											<!-- This statement can be used to print the Firstname of logined user 		
											<input type="text" name="firstname" id="firstname" value="<?php //echo $firstname ?>"/> -->
										</div>
										<div class="col-sm-4">									
											<label>Last Name: </label>
											<input type="text" name="lastname[]" id="lastname" placeholder="Enter Last Name" />
											<!-- This statement can be used to print the lastname of logined user -->
											<!--
											<input type="text" name="lastname" id="lastname" value="<?php //echo $lastname ?>"/>-->
										</div>
									</div> <!-- First row of authors information ends here-->
									<br>
									<div class="row"> <!-- Second row of authors information starts here-->
										<div class="col-sm-4">									
											<label>Email: </label>
											<input type="text" name="email[]" id= "email" placeholder="Enter email">
											<!-- This statement can be used to print the departmetn of logined user -->
											<!--
											<input type="text" name="email" id= "email" value="<?php //echo $email ?>"/>-->
										</div>
									<div class="col-sm-4">									
											<label>Type of Author: </label>
												<label class="block clearfix">
													<select class="form-control" name="author_type[]" id="author_type">
														<option value="">Select Type</option>
														<option value="staff">Staff</option>
														<option value="PGStudent">PG Student</option>
														<option value="UGStudent">UG Student</option>
												 	</select>
												</label>	
										</div>
										<div class="col-sm-4">	
											<label>Department: </label>
												<label class="block clearfix">
													<select class="form-control" name="author_department[]" id="author_department">
														<option value="">Select Department</option>
														<option value="Civil">Civil</option>
														<option value="Computer">Computer</option>
														<option value="E&TC">E &amp;TC</option>
														<option value="E&AS">Engineering &amp; Applied Science</option>
														<option value="IT">IT</option>
														<option value="Mechanical">Mechanical</option>
												 	</select>
												</label>	
											<!-- This statement can be used to print the departmetn of logined user -->
											<!--<input type="text" name="department" id="department" value="<?php //echo $department ?>"/>-->
										</div>
									</div>	<!-- Second row of authors information ends here-->	
									
									<div class="row"> <!-- Third row of authors information statrs here -->
										<div class="space-6"></div>
											<div class="col-sm-3">	
											<a href="#" id="addcoauthor"> <span class="label label-xlg label-yellow arrowed arrowed-right">+ Add Co-Author</span></a>
										</div>
									</div><!-- Third row of authors information Ends here -->
								</div> <!-- div id author ends here-->	
								<br>
								<hr>
							
								<div>
									<label class="col-sm-12 bolder brown">Journal/Conference Information:</label>
								</div>
								<br>
								<hr>
								<div class="row"> <!-- First row of Journal information starts here-->
									<div class="col-sm-3">
										<label class="control-label col-sm-10 no-padding-right" for="location">Presented At:</label>
												<div>
													<label class="line-height-1 blue">
														<input name="location" id="location" value="journal" type="radio" class="ace" />
															<span class="lbl"> Journal </span>
													</label>
												</div>
											
										<label class="line-height-1 blue">
											<input name="location" id="location" value="conference" type="radio" class="ace" />
												<span class="lbl"> Conference </span>
										</label>
									</div>

									<div class="col-sm-3">	
										<label class="control-label col-sm-4 no-padding-right" for="journalname">Name: </label>
										<input type="text" name="journalname" id="journalname" placeholder="Enter Journal/conf name here.." />
									</div>

									<div class="col-sm-3">									
										<label class="control-label col-sm-5 no-padding-right" for="journalnumber" >ISSN/ISBN No: </label>
										<input type="text" name="journalnumber" id="journalnumber"placeholder=" ISSN or ISBN Number" />
									</div>
								
									<div class="col-sm-3">									
										<label class="control-label col-sm-6 no-padding-right" for="impactfactor">Impact Factor: </label>
										<input type="text" name="impactfactor" id = "impactfactor" placeholder="Enter Imapct Factor of Journal" />
									</div>

									
									
								</div> <!-- First row of Journal information ends here-->
								<br>
								<div class="row"> <!-- Second row of Journal information starts here-->
									
									<div class="col-sm-3">									
										<label>Conf. helad At: </label>
										<input type="text" name="conflocation" id="conflocation" placeholder="Enter City" />
									</div>
									
									<div class="col-sm-3">									
										<label>Type: </label>
										 <select class="form-control" name="journaltype" id="journaltype">
											  <option value="IJ">International Journal</option>
											  <option value="NJ">National Journal</option>
											  <option value="IC">International Conference</option>
											  <option value="NC">National Conference</option>
											</select> 
									</div>		

									<div class="col-sm-3">
										<label class="control-label col-sm-10 no-padding-right" for="unpaid">Journal is Unpaid:</label>
												<div>
													<label class="line-height-1 blue">
														<input name="unpaid" id="unpaid" value="yes" type="radio" class="ace" />
															<span class="lbl"> Yes  </span>
													</label>
												</div>
											
										<label class="line-height-1 blue">
											<input name="unpaid" id="unpaid" value="no" type="radio" class="ace" />
												<span class="lbl"> No </span>
										</label>
									</div>
									

								</div>	<!-- Second row of Journal information ends here-->		
								<br>
								<hr>
								<div>
									<label class="col-sm-12 bolder brown">Paper Publication Details:</label>
								</div>
								<br>
								<hr>
								<div class="row"> <!-- First row of paper publication information starts here-->
									<div class="col-sm-3">	
										<label>Paper Title: </label>
										<input type="text" name="papertitle" placeholder="Enter Paper Title.. " />
									</div>
									<div class="col-sm-3">
										<label>Total no of Pages</label>
										<input type="number" name="noofpages" placeholder="Enter total no of pages " />
									</div>
									<div class="col-sm-3">
										<label class="control-label col-sm-6 no-padding-right">Issue No.</label>
										<input type="number" name="issueno" placeholder="Enter Journal Issue no" />
									</div>
									<div class="col-sm-3">
										<label class="control-label col-sm-6 no-padding-right" >Volume No.</label>
										<input type="number" name="volumeno" placeholder="Enter Journal Volumne no" />
									</div>

								</div> <!-- First row of Paper publication information ends here-->
								<br>
								<div class="row"> <!-- Second row of paper publication information starts here-->
									<div class="col-sm-4">	
										<label>Date of Publication: </label>
										<div class="col-xs-8 col-sm-11">
											<div class="input-group">
												<input class="form-control date-picker" id="id-date-picker-1" name="publicationdate" type="text" data-date-format="dd-mm-yyyy" />
												<span class="input-group-addon">
													<i class="fa fa-calendar bigger-110"></i>
												</span>									
											</div>
										</div>
									</div>
									<div class="col-xs-6">
										<label>Upload Soft copy of Paper here..</span></label>
										<input type="file" name="FileUpload" id="id-input-file-2" />
									</div>	

								</div><!-- Second row of paper publication information ends here-->
							</fieldset>
								
							<div class="form-actions center"> <!-- form-actions means buttons  starts here --> 
								
								<button type="submit" class="btn btn-success" name="submit">Submit<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i></button><!-- Submit Button ends here -->

								<button type="reset" class="btn btn-danger" name="reset">Reset<i class="ace-icon fa fa-undo icon-on-right bigger-110"></i></button><!-- Submit Button ends here -->
							</div> <!-- form-actions means buttons ends here --> 
						</form> <!-- Form ends here -->
					</div> <!-- Widget main no padding ends here-->
				</div> <!-- Widget Body ends here -->
				</div> <!-- Widget Box ends here -->
			</div> <!-- First Column ends here -->
		</div> <!-- First Row ends here -->
	</div> <!-- Page-content ends here -->
</div><!-- Main content ends here -->
			
<div class="footer">
	<div class="footer-inner">
		<div class="footer-content">
			<span class="bigger-120">
				<span class="blue bolder">VIIT</span> Application &copy; 2017  Vishal Meshram, Vidula Meshram, Lahu Kamble
				</span>
		</div>
	</div>
</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>			</a>		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/spinbox.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/daterangepicker.min.js"></script>
		<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="assets/js/bootstrap-colorpicker.min.js"></script>
		<script src="assets/js/jquery.knob.min.js"></script>
		<script src="assets/js/autosize.min.js"></script>
		<script src="assets/js/jquery.inputlimiter.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			$(document).ready(function(e){
				//declare variables
				var html='<div id="co-author"><hr><div id="authorheading"><label class="col-sm-12 bolder brown">Co-Author Information:</label></div><br><hr><div class="row"><div class="col-sm-4"><label>Employee Id/Roll No: </label><input type="text" name="empid[]" id="childempid" placeholder="Enter the EmpId/Roll No"></div><div class="col-sm-4"><label>First Name: </label><input type="text" name="firstname[]" id="childfirstname" placeholder="Enter First Name"/></div> <div class="col-sm-4"><label>Last Name: </label><input type="text" name="lastname[]" id="childlastname" placeholder="Enter Last Name"/></div></div><br><div class="row"><div class="col-sm-4"><label>Email:</label><input type="text" name="email[]" id="childemail" placeholder="Enter Email Id"/></div><div class="col-sm-4"><label>Type of Author: </label><label class="block clearfix"><select class="form-control" name="author_type[]" id="childauthor_type"><option value="">Select Type</option><option value="staff">Staff</option><option value="PGStudent">PG Student</option><option value="UGStudent">UG Student</option></select></label></div><div class="col-sm-4"><label>Department: </label><label class="block clearfix">	<select class="form-control" name="author_department[]" id="childauthor_department"><option value="">Select Department</option><option value="Civil">Civil</option><option value="Computer">Computer</option><option value="E&TC">E &amp;TC</option><option value="E&AS">Engineering &amp; Applied Science</option><option value="IT">IT</option><option value="Mechanical">Mechanical</option></select></label></div></div><div class="row"><div class="space-6"></div><div class="col-sm-3"><a href="#" id="remove"> <span class="label label-xlg label-pink arrowed arrowed-right">- Delete Co-Author</span></a></div></div></div></div>';
				
				//script to add co-author information 
				$("#addcoauthor").click(function(e){
					$("#author").append(html);
				});
	
				//script to remove co-author information
				$("#author").on('click','#remove',function(e){
					$("#co-author").remove();
				});

				//Populate values from the first row
				$("#author").on('dblclick','#childempid',function(e){
					$(this).val($('#empid').val() )
				});

				$("#author").on('dblclick','#childfirstname',function(e){
					$(this).val($('#firstname').val() )
				});

				$("#author").on('dblclick','#childlastname',function(e){
					$(this).val($('#lastname').val() )
				});

				$("#author").on('dblclick','#childemail',function(e){
					$(this).val($('#email').val() )
				});
			});



			jQuery(function($) {
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
			
				if(!ace.vars['touch']) {
					$('.chosen-select').chosen({allow_single_deselect:true}); 
					//resize the chosen on window resize
			
					$(window)
					.off('resize.chosen')
					.on('resize.chosen', function() {
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					}).trigger('resize.chosen');
					//resize chosen on sidebar collapse/expand
					$(document).on('settings.ace.chosen', function(e, event_name, event_val) {
						if(event_name != 'sidebar_collapsed') return;
						$('.chosen-select').each(function() {
							 var $this = $(this);
							 $this.next().css({'width': $this.parent().width()});
						})
					});
			
			
					$('#chosen-multiple-style .btn').on('click', function(e){
						var target = $(this).find('input[type=radio]');
						var which = parseInt(target.val());
						if(which == 2) $('#form-field-select-4').addClass('tag-input-style');
						 else $('#form-field-select-4').removeClass('tag-input-style');
					});
				}
			
			
				$('[data-rel=tooltip]').tooltip({container:'body'});
				$('[data-rel=popover]').popover({container:'body'});
			
				autosize($('textarea[class*=autosize]'));
				
				$('textarea.limited').inputlimiter({
					remText: '%n character%s remaining...',
					limitText: 'max allowed : %n.'
				});
			
				$.mask.definitions['~']='[+-]';
				$('.input-mask-date').mask('99/99/9999');
				$('.input-mask-phone').mask('(999) 999-9999');
				$('.input-mask-eyescript').mask('~9.99 ~9.99 999');
				$(".input-mask-product").mask("a*-999-a999",{placeholder:" ",completed:function(){alert("You typed the following: "+this.val());}});
			
			
			
				$( "#input-size-slider" ).css('width','200px').slider({
					value:1,
					range: "min",
					min: 1,
					max: 8,
					step: 1,
					slide: function( event, ui ) {
						var sizing = ['', 'input-sm', 'input-lg', 'input-mini', 'input-small', 'input-medium', 'input-large', 'input-xlarge', 'input-xxlarge'];
						var val = parseInt(ui.value);
						$('#form-field-4').attr('class', sizing[val]).attr('placeholder', '.'+sizing[val]);
					}
				});
			
				$( "#input-span-slider" ).slider({
					value:1,
					range: "min",
					min: 1,
					max: 12,
					step: 1,
					slide: function( event, ui ) {
						var val = parseInt(ui.value);
						$('#form-field-5').attr('class', 'col-xs-'+val).val('.col-xs-'+val);
					}
				});
			
			
				
				//"jQuery UI Slider"
				//range slider tooltip example
				$( "#slider-range" ).css('height','200px').slider({
					orientation: "vertical",
					range: true,
					min: 0,
					max: 100,
					values: [ 17, 67 ],
					slide: function( event, ui ) {
						var val = ui.values[$(ui.handle).index()-1] + "";
			
						if( !ui.handle.firstChild ) {
							$("<div class='tooltip right in' style='display:none;left:16px;top:-6px;'><div class='tooltip-arrow'></div><div class='tooltip-inner'></div></div>")
							.prependTo(ui.handle);
						}
						$(ui.handle.firstChild).show().children().eq(1).text(val);
					}
				}).find('span.ui-slider-handle').on('blur', function(){
					$(this.firstChild).hide();
				});
				
				
				$( "#slider-range-max" ).slider({
					range: "max",
					min: 1,
					max: 10,
					value: 2
				});
				
				$( "#slider-eq > span" ).css({width:'90%', 'float':'left', margin:'15px'}).each(function() {
					// read initial values from markup and remove that
					var value = parseInt( $( this ).text(), 10 );
					$( this ).empty().slider({
						value: value,
						range: "min",
						animate: true
						
					});
				});
				
				$("#slider-eq > span.ui-slider-purple").slider('disable');//disable third item
			
				
				$('#id-input-file-1 , #id-input-file-2').ace_file_input({
					no_file:'No File ...',
					btn_choose:'Choose',
					btn_change:'Change',
					droppable:false,
					onchange:null,
					thumbnail:false //| true | large
					//whitelist:'gif|png|jpg|jpeg'
					//blacklist:'exe|php'
					//onchange:''
					//
				});
				//pre-show a file name, for example a previously selected file
				//$('#id-input-file-1').ace_file_input('show_file_list', ['myfile.txt'])
			
			
				$('#id-input-file-3').ace_file_input({
					style: 'well',
					btn_choose: 'Drop files here or click to choose',
					btn_change: null,
					no_icon: 'ace-icon fa fa-cloud-upload',
					droppable: true,
					thumbnail: 'small'//large | fit
					//,icon_remove:null//set null, to hide remove/reset button
					/**,before_change:function(files, dropped) {
						//Check an example below
						//or examples/file-upload.html
						return true;
					}*/
					/**,before_remove : function() {
						return true;
					}*/
					,
					preview_error : function(filename, error_code) {
						//name of the file that failed
						//error_code values
						//1 = 'FILE_LOAD_FAILED',
						//2 = 'IMAGE_LOAD_FAILED',
						//3 = 'THUMBNAIL_FAILED'
						//alert(error_code);
					}
			
				}).on('change', function(){
					//console.log($(this).data('ace_input_files'));
					//console.log($(this).data('ace_input_method'));
				});
				
				
				//$('#id-input-file-3')
				//.ace_file_input('show_file_list', [
					//{type: 'image', name: 'name of image', path: 'http://path/to/image/for/preview'},
					//{type: 'file', name: 'hello.txt'}
				//]);
			
				
				
			
				//dynamically change allowed formats by changing allowExt && allowMime function
				$('#id-file-format').removeAttr('checked').on('change', function() {
					var whitelist_ext, whitelist_mime;
					var btn_choose
					var no_icon
					if(this.checked) {
						btn_choose = "Drop images here or click to choose";
						no_icon = "ace-icon fa fa-picture-o";
			
						whitelist_ext = ["jpeg", "jpg", "png", "gif" , "bmp"];
						whitelist_mime = ["image/jpg", "image/jpeg", "image/png", "image/gif", "image/bmp"];
					}
					else {
						btn_choose = "Drop files here or click to choose";
						no_icon = "ace-icon fa fa-cloud-upload";
						
						whitelist_ext = null;//all extensions are acceptable
						whitelist_mime = null;//all mimes are acceptable
					}
					var file_input = $('#id-input-file-3');
					file_input
					.ace_file_input('update_settings',
					{
						'btn_choose': btn_choose,
						'no_icon': no_icon,
						'allowExt': whitelist_ext,
						'allowMime': whitelist_mime
					})
					file_input.ace_file_input('reset_input');
					
					file_input
					.off('file.error.ace')
					.on('file.error.ace', function(e, info) {
						//console.log(info.file_count);//number of selected files
						//console.log(info.invalid_count);//number of invalid files
						//console.log(info.error_list);//a list of errors in the following format
						
						//info.error_count['ext']
						//info.error_count['mime']
						//info.error_count['size']
						
						//info.error_list['ext']  = [list of file names with invalid extension]
						//info.error_list['mime'] = [list of file names with invalid mimetype]
						//info.error_list['size'] = [list of file names with invalid size]
						
						
						/**
						if( !info.dropped ) {
							//perhapse reset file field if files have been selected, and there are invalid files among them
							//when files are dropped, only valid files will be added to our file array
							e.preventDefault();//it will rest input
						}
						*/
						
						
						//if files have been selected (not dropped), you can choose to reset input
						//because browser keeps all selected files anyway and this cannot be changed
						//we can only reset file field to become empty again
						//on any case you still should check files with your server side script
						//because any arbitrary file can be uploaded by user and it's not safe to rely on browser-side measures
					});
					
					
					/**
					file_input
					.off('file.preview.ace')
					.on('file.preview.ace', function(e, info) {
						console.log(info.file.width);
						console.log(info.file.height);
						e.preventDefault();//to prevent preview
					});
					*/
				
				});
			
				$('#spinner1').ace_spinner({value:0,min:0,max:200,step:10, btn_up_class:'btn-info' , btn_down_class:'btn-info'})
				.closest('.ace-spinner')
				.on('changed.fu.spinbox', function(){
					//console.log($('#spinner1').val())
				}); 
				$('#spinner2').ace_spinner({value:0,min:0,max:10000,step:100, touch_spinner: true, icon_up:'ace-icon fa fa-caret-up bigger-110', icon_down:'ace-icon fa fa-caret-down bigger-110'});
				$('#spinner3').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus bigger-110', icon_down:'ace-icon fa fa-minus bigger-110', btn_up_class:'btn-success' , btn_down_class:'btn-danger'});
				$('#spinner4').ace_spinner({value:0,min:-100,max:100,step:10, on_sides: true, icon_up:'ace-icon fa fa-plus', icon_down:'ace-icon fa fa-minus', btn_up_class:'btn-purple' , btn_down_class:'btn-purple'});
			
				//$('#spinner1').ace_spinner('disable').ace_spinner('value', 11);
				//or
				//$('#spinner1').closest('.ace-spinner').spinner('disable').spinner('enable').spinner('value', 11);//disable, enable or change value
				//$('#spinner1').closest('.ace-spinner').spinner('value', 0);//reset to 0
			
			
				//datepicker plugin
				//link
				$('.date-picker').datepicker({
					autoclose: true,
					todayHighlight: true
				})
				//show datepicker when clicking on the icon
				.next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			
				//or change it into a date range picker
				$('.input-daterange').datepicker({autoclose:true});
			
			
				//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
				$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
			
			
				$('#timepicker1').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false,
					disableFocus: true,
					icons: {
						up: 'fa fa-chevron-up',
						down: 'fa fa-chevron-down'
					}
				}).on('focus', function() {
					$('#timepicker1').timepicker('showWidget');
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				
			
				
				if(!ace.vars['old_ie']) $('#date-timepicker1').datetimepicker({
				 //format: 'MM/DD/YYYY h:mm:ss A',//use this option to display seconds
				 icons: {
					time: 'fa fa-clock-o',
					date: 'fa fa-calendar',
					up: 'fa fa-chevron-up',
					down: 'fa fa-chevron-down',
					previous: 'fa fa-chevron-left',
					next: 'fa fa-chevron-right',
					today: 'fa fa-arrows ',
					clear: 'fa fa-trash',
					close: 'fa fa-times'
				 }
				}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
			
				$('#colorpicker1').colorpicker();
				//$('.colorpicker').last().css('z-index', 2000);//if colorpicker is inside a modal, its z-index should be higher than modal'safe
			
				$('#simple-colorpicker-1').ace_colorpicker();
				//$('#simple-colorpicker-1').ace_colorpicker('pick', 2);//select 2nd color
				//$('#simple-colorpicker-1').ace_colorpicker('pick', '#fbe983');//select #fbe983 color
				//var picker = $('#simple-colorpicker-1').data('ace_colorpicker')
				//picker.pick('red', true);//insert the color if it doesn't exist
			
			
				$(".knob").knob();
				
				
				var tag_input = $('#form-field-tags');
				try{
					tag_input.tag(
					  {
						placeholder:tag_input.attr('placeholder'),
						//enable typeahead by specifying the source array
						source: ace.vars['US_STATES'],//defined in ace.js >> ace.enable_search_ahead
						/**
						//or fetch data from database, fetch those that match "query"
						source: function(query, process) {
						  $.ajax({url: 'remote_source.php?q='+encodeURIComponent(query)})
						  .done(function(result_items){
							process(result_items);
						  });
						}
						*/
					  }
					)
			
					//programmatically add/remove a tag
					var $tag_obj = $('#form-field-tags').data('tag');
					$tag_obj.add('Programmatically Added');
					
					var index = $tag_obj.inValues('some tag');
					$tag_obj.remove(index);
				}
				catch(e) {
					//display a textarea for old IE, because it doesn't support this plugin or another one I tried!
					tag_input.after('<textarea id="'+tag_input.attr('id')+'" name="'+tag_input.attr('name')+'" rows="3">'+tag_input.val()+'</textarea>').remove();
					//autosize($('#form-field-tags'));
				}
				
				
				/////////
				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'ace-icon fa fa-cloud-upload',
					droppable:true,
					thumbnail:'large'
				})
				
				//chosen plugin inside a modal will have a zero width because the select element is originally hidden
				//and its width cannot be determined.
				//so we set the width after modal is show
				$('#modal-form').on('shown.bs.modal', function () {
					if(!ace.vars['touch']) {
						$(this).find('.chosen-container').each(function(){
							$(this).find('a:first-child').css('width' , '210px');
							$(this).find('.chosen-drop').css('width' , '210px');
							$(this).find('.chosen-search input').css('width' , '200px');
						});
					}
				})
				/**
				//or you can activate the chosen plugin after modal is shown
				//this way select element becomes visible with dimensions and chosen works as expected
				$('#modal-form').on('shown', function () {
					$(this).find('.modal-chosen').chosen();
				})
				*/
			
				
				
				$(document).one('ajaxloadstart.page', function(e) {
					autosize.destroy('textarea[class*=autosize]')
					
					$('.limiterBox,.autosizejs').remove();
					$('.daterangepicker.dropdown-menu,.colorpicker.dropdown-menu,.bootstrap-datetimepicker-widget.dropdown-menu').remove();
				});
			
			});
		</script>
<!-- Script to add Co-author block -->
<script type="text/javascript">
	$(document).ready(function(e){
		//variables

	//Add rows to forms
		$("addcoauthor").click(function(e) {
			alert("working");
		});

		//Remove rows from forms


		//populate values from first rows

	})
</script>
</body>
</html>
