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
													<h3 class="card-label">Historical Report</h3>
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
                                                        <select id="id_factory" class="form-control"></select>
                                                    </div>
                                                </div>
                                                <div class="row filter2" style="padding-top:20px; display:none;">
                                                    <div class="col-sm-6">
                                                        <label class="form-control-label">วันที่เริ่มต้น</label>
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control m-input" id="start_date" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label class="form-control-label">วันที่สิ้นสุด</label>
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control m-input" id="end_date" autocomplete="off" disabled>
                                                        </div>
                                                    </div>
                                                    <!--<div class="col-sm-6">
                                                        <label class="form-control-label">วันที่สิ้นสุด</label>
                                                        <div class="input-group date">
                                                            <input type="text" class="form-control m-input" id="end_date">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">
                                                                    <i class="la la-calendar"></i>
                                                                </span>
                                                            </div>
                                                            <select class="form-control" id="end_time">
                                                            <?php 
                                                                /* date_default_timezone_set("Asia/Bangkok");
                                                                $current_h = date("H");
                                                                for($s=0;$s<=23;$s++){
                                                                    if($current_h == sprintf("%02d", $s)){
                                                                        $selected = "selected='selected'";
                                                                    } else {
                                                                        $selected = "";
                                                                    }
                                                                    echo "<option value='".sprintf("%02d", $s).":00:00' ".$selected.">".sprintf("%02d", $s).":00</option>";
                                                            } */ ?>
                                                            </select>
                                                        </div>
                                                    </div>-->
                                                </div><p>
                                                <div class="row filter2" style="display:none">
                                                    <div class="col-sm-12" style="text-align:right;">
                                                        <div class="btn-group m-btn-group" role="group" aria-label="...">
                                                            <button type="button" id="tableBtn" class="btn btn-primary font-weight-bolder" style="margin-right=5">Table</button>
                                                        </div>
                                                        <!--<div class="btn-group m-btn-group" role="group" aria-label="...">
                                                            <button type="button" id="chartBtn" class="btn btn-warning font-weight-bolder" style="margin-right=5" disabled>Graph</button>
                                                        </div>-->
                                                    </div>
                                                </div>
                                                <div id="showTable" style="padding-top:20px; display:none;">
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
        $("#showTable").empty();
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
                type:'bySearch',
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
                    $.each(response['arrFactory'], function(key,row_f) {
                        $('#id_factory').append($('<option>', {
                            value: row_f['id_factory'],
                            text: row_f['factory_no']+" : "+row_f['factory_name']+" ที่ตั้ง : "+row_f['factory_address']
                        }));
                    }); 
                }
            }
        });
    });

    $(function () {
        $('#start_date').datetimepicker({
            format: 'yyyy-mm-d h:00',
            autoclose:true,
            minView:1,
			todayHighlight: true
        }).on('change', function(e) {
            $("#end_date").attr('disabled',false);
            var myDate = new Date($("#start_date").val());
            myDate.setHours(myDate.getHours() + 24);
            $('#end_date').val("");
            $('#end_date').datetimepicker('remove');
            $('#end_date').datetimepicker({
                date: myDate,
                format: 'yyyy-mm-d h:00',
                autoclose:true,
                minView:1,
                startDate:$("#start_date").val(),
                endDate:myDate,
				todayHighlight: true
            });
        });
    });

    $("#tableBtn").click(function(){

        $("#showTable").show();
        $("#showTable").empty();

        $.ajax({
            type:"post",
            url: base_url+"Ajaxs/function_process",
            data:{
                process:'getDataReport',
                type:'byIdFactory',
                id_factory:$("#id_factory").val(),
                start_date:$('#start_date').val(),
                end_date:$('#end_date').val()
            },
            dataType: "JSON",
            success:function(response)
            {
                if(response['process_status'] == 1)
                {
                    console.log(response);
                    $("#showTable").append("<ul class='nav nav-success nav-pills' id='myTab2' role='tablist'></ul>");
                    $("#myTab2").after("<div class='tab-content mt-5' id='myTabContent2'></div>");
                    $.each(response['arrMeasurement'],function(key_m,row_m){
                        $("#tb_"+row_m['meas_code']).empty();
						//$("#tb_"+row_m['meas_code']).DataTable().destroy();
                        $("#myTab2").append("<li class='nav-item'>"+
													"<a class='nav-link' id='home-tab-2' data-toggle='tab' href='#"+row_m['meas_code']+"'>"+
														"<span class='nav-text'>"+row_m['meas_code']+"</span>"+
													"</a>"+
												"</li>");
                        
						var countColumns = 1;
						$.each(response['arrDataDetail'],function(key_dd,row_dd){
                            if(row_dd['meas_code'] == row_m['meas_code'])
                            {
                                countColumns+=2;
                            }
                        });
						
						var tableMaxFooter = '';
						var tableMinFooter = '';
						var tableAvgFooter = '';
                        for (let i = 1; i < countColumns; i++) {
							tableMaxFooter += '<th id="tb_'+row_m['meas_code']+'_amax'+ i +'" style=""></th>';
						}

						for (let i = 1; i < countColumns; i++) {
							tableMinFooter += '<th id="tb_'+row_m['meas_code']+'_amin'+ i +'" style="color: black"> </th>';
						}

						for (let i = 1; i < countColumns; i++) {
							tableAvgFooter += '<th id="tb_'+row_m['meas_code']+'_atot'+ i +'" style="color: black"> </th>';
						}
						
                        $("#myTabContent2").append("<div style='overflow-x:scroll; white-space: nowrap;' class='tab-pane fade' id='"+row_m['meas_code']+"' role='tabpanel'>"+
                            "<table class='table table-bordered table-hover table-foot-custom' id='tb_"+row_m['meas_code']+"'>"+
                                "<thead><tr width='200px'><th>Date Time</th></tr></thead><tbody></tbody>"+
								"<tfoot><tr><th style='background-color: #6E8192'>MAX</th>"+ tableMaxFooter +"</tr><tr><th style=' background-color: #6E8192'>MIN</th>"+ tableMinFooter +"</tr><tr><th style='background-color: #6E8192'>AVG.</th>"+ tableAvgFooter +"</tr><tr><th style='background-color: white' colspan='"+ countColumns +"'></th></tr></tfoot>"+
                            "</table>"+
                        "</div>");
						
                        $.each(response['arrDataDetail'],function(key_dd,row_dd){
                            if(row_dd['meas_code'] == row_m['meas_code'])
                            {
                                $("#tb_"+row_m['meas_code']+" > thead > tr:last").append(	"<th style='text-align:center;'>"+row_dd['parameter_shortname']+"</th>"+
																							"<th style='text-align:center;'>Status</th>");
                            }
                        });
						
						var columns = [];
						columns.push({
							data: "date_time" 
						});
				
						$.each(response['arrDataDetail'],function(key_dd,row_dd){
							if(row_dd['meas_code'] == row_m['meas_code'])
                            {
								columns.push({
									data: 'value'+row_dd['meas_channel'].trim()
								});
								
								columns.push({
									data: 'status'+row_dd['meas_channel'].trim()
								});
                            }
						});
						
						$("#tb_"+row_m['meas_code']).DataTable({
							responsive: false,
							scrollX: false,
							lengthMenu: [
								[25, 50, 100, -1],
								[25, 50, 100, 'All'],
							],
							info: true,
							sort:false,
							dom: 'Blfrtip',
							searching: false,
							/* buttons: [
								'copy', 'csv','print',
								{
									extend: 'excel',
									title: 'Historical Data',
									messageTop: 'Station Name: '+json.station_name,
									//messageBottom: "\r\nStatus Detail:\r\n 0 = No Data \r\n 1 = Normal \r\n 2 = Calibration \r\n 3 = Defective \r\n 4 = Maintenance \r\n 5 = Start up \r\n 6 = Shut Down \r\n 7 = Turnaround \r\n 8 = ETC.",
									orientation: 'landscape',
									footer: true,
									customize: (xlsx, config, dataTable) => {
										let sheet = xlsx.xl.worksheets['sheet1.xml'];
										let footerIndex = $('sheetData row', sheet).length;
										let $footerRows = $('tr', dataTable.footer());
										// If there are more than one footer rows
										if ($footerRows.length > 1) {
											// First header row is already present, so we start from the second row (i = 1)
											for (let i = 1; i < $footerRows.length; i++) {
												// Get the current footer row
												let $footerRow = $footerRows[i];
												// Get footer row columns
												let $footerRowCols = $('th', $footerRow);
												// Increment the last row index
												footerIndex++;
												// Create the new header row XML using footerIndex and append it at sheetData
												$('sheetData', sheet).append(`
													<row r="${footerIndex}">
													${$footerRowCols.map((index, el) => `
														<c t="inlineStr" r="${String.fromCharCode(65 + index)}${footerIndex}" s="2">
														<is>
															<t xml:space="preserve">${$(el).text()}</t>
														</is>
														</c>
													`).get().join('')}
													</row>
												`);
											}
										}
									}
								},
								{
									extend: 'pdf',
									title: 'Historical Data',
									messageTop: 'Station Name: '+json.station_name,
									//messageBottom: "\r\nStatus Detail:\r\n 0 = No Data \r\n 1 = Normal \r\n 2 = Calibration \r\n 3 = Defective \r\n 4 = Maintenance \r\n 5 = Start up \r\n 6 = Shut Down \r\n 7 = Turnaround \r\n 8 = ETC.",
									orientation: 'landscape',
									footer: true,
								}
							], */
							data: response['arrData'][row_m['meas_code']],
							columns: columns,
							fnRowCallback: function(nRow, aData, iDisplayIndex, iDisplayIndexFull) {
								if(iDisplayIndex %2 === 0){
									$('td', nRow).css('background-color', 'AliceBlue');
								}
								
								for (let i = 1; i < countColumns; i++) {
									if(i % 2 == 0){ // ถ้าเป็นคอลัมน์คู่ || คอลัมน์สเตตัส
										
										var statusVal = $(nRow).find("td:eq("+i+")").text();
										if(statusVal < 0){
											//$(nRow).find("td:eq("+i+")").css("background-color", "black");
											//$(nRow).find("td:eq("+i+")").css("color", "white");
											$(nRow).find("td:eq("+i+")").html("<center><span class='label label-lg label-light-dark label-inline font-weight-normal mr-2'>Negative Value</span></center>");
										} else if(statusVal == 0){
											$(nRow).find("td:eq("+i+")").html("<center><span class='label label-lg label-light-dark label-inline font-weight-normal mr-2'>No Data</span></center>");
										} else if(statusVal == 1){
											$(nRow).find("td:eq("+i+")").html("<center><span class='label label-lg label-success label-inline font-weight-normal mr-2'>Normal</span></center>");
										} else if(statusVal == 2){
											$(nRow).find("td:eq("+i+")").html("<center><span class='label label-lg label-light-warning label-inline font-weight-normal mr-2'>Calibration</span></center>");
										} else if(statusVal == 3){
											$(nRow).find("td:eq("+i+")").html("<center><span class='label label-lg label-light-danger label-inline font-weight-normal mr-2'>Defective</span></center>");
										} else if(statusVal == 4){
											$(nRow).find("td:eq("+i+")").html("<center><span class='label label-lg label-light-danger label-inline font-weight-normal mr-2'>Maintenance</span></center>");
										} else if(statusVal == 5){
											$(nRow).find("td:eq("+i+")").html("<center><span class='label label-lg label-light-danger label-inline font-weight-normal mr-2'>Start Up</span></center>");
										} else if(statusVal == 6){
											$(nRow).find("td:eq("+i+")").html("<center><span class='label label-lg label-light-danger label-inline font-weight-normal mr-2'>Shut Down</span></center>");
										} else if(statusVal == 7){
											$(nRow).find("td:eq("+i+")").html("<center><span class='label label-lg label-light-danger label-inline font-weight-normal mr-2'>Turnaround</span></center>");
										} else if(statusVal == 8){
											$(nRow).find("td:eq("+i+")").html("<center><span class='label label-lg label-light-dark label-inline font-weight-normal mr-2'>ETC.</span></center>");
										}
									} else if(i % 2 != 0) {
										$(nRow).find("td:eq("+i+")").css('text-align','right');
									}
								}

								/* $.each(json['arrDetail'],function(key_r,val_r){
									var columns_ =  key_r+1;

									//check null
									if (aData['Value'+val_r['monitor_channel']] === undefined || aData['Value'+val_r['monitor_channel']] === null) {
										$(nRow).find("td:eq("+columns_+")").html('NoData').css("background-color", "black");
										$(nRow).find("td:eq("+columns_+")").css("color", "white");
									}

									//check warning
									if (val_r['warning'] === undefined || val_r['warning'] === null) {
										// do something 
									} else {
										if(aData['Value'+val_r['monitor_channel']] > val_r['warning']){
											$(nRow).find("td:eq("+columns_+")").css("background-color", "#ffff4d");
										}
									}

									// check standard
									if (val_r['std'] === undefined || val_r['std'] === null) {
										// do something 
									} else {
										if(aData['Value'+val_r['monitor_channel']] > val_r['std']){
											$(nRow).find("td:eq("+columns_+")").css("background-color", "#ff3300");
											$(nRow).find("td:eq("+columns_+")").css("color", "white");
										}
									}
								}); */
							},
							footerCallback: function (row, data, start, end, display) {
								var all_data = data.length;
								var api = this.api();

								// Remove the comma for calcuations
								var intVal = function ( i ) {
									return typeof i === 'string' ?
										i.replace(/(^-$|,)/g,'')*1 :
								typeof i === 'number' ?
									i : 0;
								};

								var nb_cols = api.columns().nodes().length;
								var j = 1;
								while (j < nb_cols) {

									var arrMin = new Array();
									var sumData = 0;
									var countNotNullData = 0;
									for(k=0;k<=all_data;k++){
										
										if (api.column(j).data()[k] === undefined || api.column(j).data()[k] === null) {
											//do something
										}else{
											arrMin.push(api.column(j).data()[k]);
											sumData = sumData + parseFloat(api.column(j).data()[k]);
											
											countNotNullData++;
										}
										
									};
									
									if(j % 2 == 0){ // ถ้าเป็นคอลัมน์คู่ || คอลัมน์สเตตัส
										var avgVal = '-';
										var minVal = '-';
										var maxVal = '-';
									} else {
										
										var avgVal = (sumData / countNotNullData).toFixed(2);
										var minVal = Math.min.apply(Math, arrMin);
										
										var maxVal = '';
											maxVal += api
												.column(j)
												.data()
												.sort(function (a, b) { return a - b; })
												.reverse()[0];
									}
										
										//console.log(maxVal);
										$("#tb_"+row_m['meas_code']+"_amax" + j).html(maxVal).css("text-align","right");
										$("#tb_"+row_m['meas_code']+"_amin" + j).html(minVal).css("text-align","right");
										$("#tb_"+row_m['meas_code']+"_atot" + j).html(avgVal).css("text-align","right");

									j++;
								}

							}
						});
                    });
                }
            }
        });
    });
</script>
    <!--end::Body-->
	</body>
</html>