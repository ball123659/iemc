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
													<h3 class="card-label">Manage User</h3>
												</div>
                                                <div class="card-toolbar">
                                                    <button type="button" id="addUserBtn" class="btn btn-light-success font-weight-bolder" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="la la-plus"></i>Add User</button>
                                                </div>
											</div>
                                            
											<div class="card-body">
                                                <table class="table round" id="tb1">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align:center;">#</th>
                                                            <th style="text-align:center;">ชื่อ - นามสกุล</th>
                                                            <th style="text-align:center;">E-mail</th>
                                                            <th style="text-align:center;">สิทธิ์การเข้าถึง</th>
                                                            <th style="text-align:center;">สถานะ</th>
                                                            <th style="text-align:center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                </table>
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

                    <!--Modal-->
					<div class="modal fade" id="userModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
						<div class="modal-dialog modal-md" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="modalUserTitle"></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<i aria-hidden="true" class="ki ki-close"></i>
									</button>
								</div>
                                <div class="modal-body">
                                    <input type="hidden" id="process"/>
                                    <input type="hidden" id="id_user"/>
                                    <div class="row form-group">
                                        <div class="col-sm-12">
                                            <label class="form-control-label">E-mail</label>
                                            <span id="error_email"></span>
                                            <input type="email" id="email" class="form-control" autocomplete="off" />
                                            <input type="hidden" id="email_status" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-12">
                                            <label class="form-control-label">พาสเวิร์ด</label>
                                            <input type="password" id="password" class="form-control" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-12">
                                            <label class="form-control-label">ชื่อ - นามสกุล</label>
                                            <input type="text" id="name" class="form-control" autocomplete="off" />
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-sm-6">
                                            <label class="form-control-label">สิทธิ์การเข้าถึง</label>
                                            <select class="form-control" id="role" name="role" >
                                                <option value="0">Administrator</option>
                                                <option value="1">User</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-control-label">สถานะ</label>
                                            <select class="form-control" id="status" name="status" >
                                                <option value="1">เปิดการใช้งาน</option>
                                                <option value="2">ปิดการใช้งาน</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
								<div class="modal-footer">
									<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary font-weight-bold" id="saveUserBtn">Save</button>
								</div>
							</div>
						</div>
					</div>
					<!--Modal-->
<script type="text/javascript">
    var base_url = '<?php echo base_url(); ?>';
    $.ajax({
		type:"post",
		url: base_url+"Ajaxs/function_process",
		data:{
			process:'getUser',
            type:'all'
		},
		dataType: "JSON",
		success:function(response)
		{
            console.log(response);
			if(response['process_status'] == 1)
			{
				var tb1 = $('#tb1').DataTable();
				tb1.clear().draw();
				tb1.order( [ 0, 'asc' ] ).draw();
									
				//console.log(response);
				var i = 1;
				$.each(response['arrUser'], function(key,val) {
					var id_user = response['arrUser'][key]['id_user'];
					var name = response['arrUser'][key]['name'];
					var email = response['arrUser'][key]['email'];
					var password = response['arrUser'][key]['password'];
					var status = response['arrUser'][key]['status'];
					var role = response['arrUser'][key]['role'];
										
					if(status == 1){
						status = "<span class='label label-lg font-weight-bold label-light-success label-inline'>เปิดการใช้งาน</span>";
					} else if(status == 2){
						status = "<span class='label label-lg font-weight-bold label-light-danger label-inline'>ปิดการใช้งาน</span>";
					}
										
					if(role == 0){
						role = "<span class='label label-lg font-weight-bold label-light-info label-inline'>Administrator</span>";
					} else if(role == 1){
						role = "<span class='label label-lg font-weight-bold label-light-info text-warning label-inline'>User</span>";
					}

					tb1.row.add([
                        "<span style='display: flex; justify-content: center;'>"+i+"</span>",
						"<span style='display: flex; justify-content: center;'>"+name+"</span>",
						"<span style='display: flex; justify-content: center;'>"+email+"</span>",
						"<span style='display: flex; justify-content: center;'>"+role+"</span>",
						"<span style='display: flex; justify-content: center;'>"+status+"</span>",
						"<span style='display: flex; justify-content: center;'><button class='btn btn-transparent-warning btn-sm editUserBtn' id='edit_"+id_user+"' value='"+id_user+"'><i class='flaticon-edit'></i>แก้ไข</button></span>"
					]).draw();
					//console.log(userArr)
					i++;
				}); 
			}
		}
	});

    $("#addUserBtn").click(function(){
        $("#userModal").modal("show");
		$("#modalUserTitle").html("Add User");
		$("#process").val("addUser");
		$("#id_user").val("");
		$("#name").val("");
		$("#email").val("");
		$("#password").val("");
		$("#status").val(1);
		$("#role").val(1);
    });

    $(document).on('click','.editUserBtn',function(e){
        var id_user = this.value;
        $.ajax({
            type:"post",
            url: base_url+"Ajaxs/function_process",
            data:{
                process:'getUser',
                type:'byId',
                id_user:id_user
            },
            dataType: "JSON",
            success:function(response)
            {
                if(response['process_status'] == 1)
                {
                    $("#userModal").modal("show");
                    $("#modalUserTitle").html("Edit User");
                    $("#process").val("editUser");
                    $("#id_user").val(response['arrUser'][0]['id_user']);
                    $("#name").val(response['arrUser'][0]['name']);
                    $("#email").val(response['arrUser'][0]['email']);
                    $("#password").val(response['arrUser'][0]['password']);
                    $("#status").val(response['arrUser'][0]['status']);
                    $("#role").val(response['arrUser'][0]['role']);
                }
            }
        });
    });

    $("#saveUserBtn").click(function(){
        if($("#name").val() != "" && $("#email").val() != "" && $("#password").val() != "")
		{
			Swal.fire({
				title: "Are you sure?",
				text: "คุณต้องการบันทึกข้อมูลใช่หรือไม่?",
				icon: "warning",
				showCancelButton: true,
				confirmButtonText: "Yes",
				cancelButtonText: "No"/* ,
				reverseButtons: true */
			}).then(function(result) {
				if (result.value) {
                    if($("#process").val() == 'addUser')
                    {
                        $.ajax({
                            type:"post",
                            url: base_url+"Ajaxs/function_process",
                            data:{
                                process:$("#process").val(),
                                name:$("#name").val(),
                                password:$("#password").val(),
                                email:$("#email").val(),
                                status:$("#status").val(),
                                role:$("#role").val()
                            },
                            dataType: "JSON",
                            success:function(response)
                            {
                                if(response['process_status'] == 1)
                                {
                                    location.reload();
                                }
                            }
                        });
                    }
					else if($("#process").val() == 'editUser')
                    {
                        $.ajax({
                            type:"post",
                            url: base_url+"Ajaxs/function_process",
                            data:{
                                process:$("#process").val(),
                                id_user:$("#id_user").val(),
                                name:$("#name").val(),
                                password:$("#password").val(),
                                email:$("#email").val(),
                                status:$("#status").val(),
                                role:$("#role").val()
                            },
                            dataType: "JSON",
                            success:function(response)
                            {
                                if(response['process_status'] == 1)
                                {
                                    location.reload();
                                }
                            }
                        });
                    }
				}
			});
		}
		else
		{
			Swal.fire("Something Wrong!", "กรุณากรอกข้อมูลให้ครบถ้วน", "warning");
		}
    });
</script>
    <!--end::Body-->
	</body>
</html>