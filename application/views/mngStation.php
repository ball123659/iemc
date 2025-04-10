					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Subheader-->
						<div class="subheader py-2 py-lg-12 subheader-transparent" id="kt_subheader">
							<div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
								<!--begin::Info-->
								<div class="d-flex align-items-center flex-wrap mr-1">
									<!--begin::Heading-->
									<div class="d-flex flex-column">
										<!--begin::Title-->
										<h2 class="text-white font-weight-bold my-2 mr-5">POMS Backend</h2>
										<!--end::Title-->
									</div>
									<!--end::Heading-->
								</div>
								<!--end::Info-->
							</div>
						</div>
						<!--end::Subheader-->
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<div class="row">
									<div class="col-sm-12">
										<!--begin::Card-->
										<div class="card card-custom gutter-b">
											<div class="card-header">
												<div class="card-title">
													<h3 class="card-label">การจัดการโรงงาน</h3>
												</div>
											</div>
											<div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-9">
                                                        <div class="form-group row">
                                                            <label class="col-3 col-form-label">เลขทะเบียนโรงงาน</label>
                                                            <div class="col-3 col-form-label">
                                                                <div class="radio-inline">
                                                                    <label class="radio radio-primary">
                                                                    <input type="radio" name="search_type" checked="checked" value="old"/>
                                                                    <span></span>เก่า</label>
                                                                    <label class="radio radio-primary">
                                                                    <input type="radio" name="search_type" value="new"/>
                                                                    <span></span>ใหม่</label>
                                                                </div>
                                                                <span class="form-text text-muted">เลือกรูปแบบการค้นหาข้อมูล</span>
                                                            </div>
                                                            <div class="col-6 col-form-label">
                                                                <input type="text" class="form-control" id="search_no">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top:-25px;">
                                                    <div class="col-sm-9">
                                                        <label class="form-control-label">ชื่อโรงงาน</label>
                                                        <input type="text" class="form-control" id="search_name"/>
                                                    </div>
                                                    <div class="col-sm-2" role="group" aria-label="...">
                                                        <button type="button" id="searchBtn" class="btn btn-primary">ค้นหา</button>
                                                    </div>
                                                </div>
                                                <p><hr>
                                                <div class="row filter2" style="padding-top:10px; display:none;">
													<div class="col-sm-12">
														<table class="table table-bordered table-checkable" id="tb1">
															<thead>
																<tr style="background-color: Gainsboro">
																	<th style="text-align:center;">Status</th>
																	<th style="text-align:center;">Factory No.</th>
																	<th style="text-align:center;">Factory New No.</th>
																	<th style="text-align:center;">Factory Name</th>
																	<th style="text-align:center;">Factory Address</th>
																</tr>
															</thead>
														</table>
													</div>
                                                </div>
                                                <div class="row filter2" style="padding-top:20px; display:none;">
                                                    
                                                </div><p>
                                                <!-- <div class="row filter2" style="display:none">
                                                    <div class="col-sm-12" style="text-align:right;">
                                                        <div class="btn-group m-btn-group" role="group" aria-label="...">
                                                            <button type="button" id="saveBtn" class="btn btn-success font-weight-bolder" style="margin-right=5">บันทึก</button>
                                                        </div>
                                                    </div>
                                                </div> -->
                                                <div id="showContent" style="padding-top:20px; display:none;">
                                                </div>
											</div>
										</div>
										<!--end::Card-->
									</div>
								</div>
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
<script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';

    $("#searchBtn").click(function(){
        $("#showContent").empty();
        var search_type = $('input[name="search_type"]:checked').val();

        if(search_type == 'old'){
            var factory_no = $("#search_no").val();
            var factory_no_new = "";
        } else if (search_type == 'new') {
            var factory_no = "";
            var factory_no_new = $("#search_no").val();
        }

        $.ajax({
            type:"post",
            url: base_url+"Ajaxs/function_process",
            data:{
                process:'getFactory',
                type:'bySearchAllVisible',
                factory_no:factory_no,
                factory_no_new:factory_no_new,
                factory_name:$('#search_name').val()
            },
            dataType: "JSON",
            success:function(response)
            {
                if(response['process_status'] == 1)
                {
                    console.log(response);
                    $(".filter2").show();
                    var i = 1;
                    $('#id_factory').empty();
                    $('#id_factory').append($('<option>', {
                        value: "0",
                        text: "--กรุณาเลือกโรงงาน--"
                    }));
					
                    $.each(response['arrFactory'], function(key,row_f) {
                        $('#id_factory').append($('<option>', {
                            value: row_f['id_factory'],
                            text: row_f['factory_no']+" : "+row_f['factory_name']+" ที่ตั้ง : "+row_f['factory_address']
                        }));
                    }); 
					
					var columns = [];
					
					columns.push({
						data: "is_visible_management"
					});
					columns.push({
						data: "factory_no"
					});
					columns.push({
						data: "factory_no_new"
					});
					columns.push({
						data: "factory_name"
					});
					columns.push({
						data: "factory_address"
					});
					
					$('#tb1').DataTable().destroy();
					$('#tb1').DataTable({
						responsive: false,
						scrollX: true,
						lengthMenu: [
							[10, 30, 50, 100, -1],
							[10, 30, 50, 100, 'All'],
						],
						info: true,
						sort:true,
						searching: false,
						data: response.arrFactory,
						columns: columns,
						fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
							if(iDisplayIndex %2 === 0){
								$('td', nRow).css('background-color', 'AliceBlue');
							}
							$(nRow).find("td:eq(0)").html('Enable');

							if(aData['is_visible_management'] == 't')
							{
								$(nRow).find("td:eq(0)").html(	"<span class='switch switch-outline switch-icon switch-success'>"+
																	"<label>"+
																		"<input type='checkbox' checked='checked' class='f_status' id='status_"+aData['id_factory']+"' />"+
																		"<span></span>"+
																	"</label>"+
																"</span>");
							}
							else if(aData['is_visible_management'] == 'f')
							{
								$(nRow).find("td:eq(0)").html(	"<span class='switch switch-outline switch-icon switch-success'>"+
																	"<label>"+
																		"<input type='checkbox' class='f_status' id='status_"+aData['id_factory']+"' />"+
																		"<span></span>"+
																	"</label>"+
																"</span>");
							}
						}
					});
                }
            }
        });
    });

    $(document).on('change','.f_status',function(){
		if ($("#"+this.id).is(":checked")) {
			$("#"+this.id).attr('value', 'TRUE');
		} else {
			$("#"+this.id).attr('value', 'FALSE');
		}
		var ex_id = this.id.split("_");
		var id_factory = ex_id[1];
		var f_status = this.value;

		$.ajax({
            type:"post",
            url: base_url+"Ajaxs/function_process",
            data: {
                process: "updateStatus",
                id_factory: id_factory,
				f_status: f_status
            },
            dataType: "JSON",
            success:function(response)
            {
                if(response['process_status'] == 1)
                {
					alert("Update status successfully!!");
                }
            }
        });
    });
</script>
    <!--end::Body-->
	</body>
</html>