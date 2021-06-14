<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> User Data Management
      </h1>
    </section>
    <section class="content">
        
        <div class="row">
            <div class="col-md-12">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header with-border">
                    <!-- <h3 class="box-title">Users Data List</h3> -->
                    <br>
                    <div class="box-tools">
                        <div class="row">
                            <div class="col-md-6" >
                                <!-- <div class="input-group-btn">
                                    <a href="<?php base_url()?>export/export" class="btn btn-success btn-sm">Export</a>
                                </div> -->
                            </div>
                            <!-- https://xpertphp.com/how-to-export-data-in-excel-and-csv-files-using-codeigniter/ -->
                            <div class="col-md-6">
                                <form action="<?php echo base_url() ?>userdataListing" method="POST" id="searchList">
                                    <div class="input-group">
                                    <input type="text" name="searchText" value="<?php echo $searchText; ?>" class="form-control input-sm pull-right" placeholder="Search"/>
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                                    </div>
                                    </div>
                                </form>
                            </div>
                           
                        </div>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                        <th>First Name</th>
                        <!-- <th>Last Name</th> -->
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <!-- <th>Address Line2</th> -->
                        <!-- <th>city</th> -->
                        <!-- <th>State</th> -->
                        <!-- <th>Country</th> -->
                        <th>Sms</th>
                        <th>zipcode</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                        <td><?php echo $record->first_name ?></td>
                        <!-- <td><?php //echo $record->last_name ?></td> -->
                        <td><?php echo $record->email ?></td>
                        <td><?php echo $record->mobile ?></td>
                        <td><?php echo $record->address ?></td>
                        <!-- <td><?php //echo $record->address_one ?></td> -->
                        <!-- <td><?php //echo $record->city ?></td> -->
                        <!-- <td><?php //echo $record->state ?></td> -->
                        <!-- <td><?php //echo $record->country ?></td> -->
                        <td><?php echo $record->sms ?></td>
                        <td><?php echo $record->zipcode ?></td>
                        
                        <td><?php echo date("d-m-Y", strtotime($record->created_at)) ?></td>
                        <td class="text-center">
                            
                            <a class="btn btn-sm btn-danger deleteUsers" href="#" data-userid="<?php echo $record->id; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "userdataListing/" + value);
            jQuery("#searchList").submit();
        });

        jQuery(document).on("click", ".deleteUsers", function(){
            var userId = $(this).data("userid"),
                hitURL = baseURL + "userData/delete",
                currentRow = $(this);
            var confirmation = confirm("Are you sure to delete this user data ?");
            
            if(confirmation)
            {
                jQuery.ajax({
                type : "POST",
                dataType : "json",
                url : hitURL,
                data : { userId : userId } 
                }).done(function(data){
                    console.log(data);
                    currentRow.parents('tr').remove();
                    if(data.status == true) { alert("User data successfully deleted"); }
                    else if(data.status == false) { alert("User data deletion failed"); }
                    else { alert("Access denied..!"); }
                });
            }
        });
    });
</script>
