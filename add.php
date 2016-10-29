<?php

include_once('config.php');
$query_division = mysql_query("SELECT * FROM divisions") or die("Query Failed: ".mysql_error());
$query_asset = mysql_query("SELECT * FROM assets") or die("Query Failed: ".mysql_error());
$query_systems = mysql_query("SELECT * FROM systems") or die("Query Failed: ".mysql_error());
$query_subsystems = mysql_query("SELECT * FROM subsystems") or die("Query Failed: ".mysql_error());
$query_department = mysql_query("SELECT * FROM responsible_dept") or die("Query Failed: ".mysql_error());
$query_rootcause = mysql_query("SELECT * FROM root_causes") or die("Query Failed: ".mysql_error());
$query_department = mysql_query("SELECT * FROM responsible_dept") or die("Query Failed: ".mysql_error());
$query_location = mysql_query("SELECT * FROM locations") or die("Query Failed: ".mysql_error());
$query_station = mysql_query("SELECT * FROM stations AS CurrentTime") or die("Query Failed: ".mysql_error());
$query_controlsection = mysql_query("SELECT * FROM control_sec") or die("Query Failed: ".mysql_error());
$query_sse = mysql_query("SELECT * FROM sse_section") or die("Query Failed: ".mysql_error());
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="fault management system">
        <title>Fault Management System</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery-2.0.0.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/combinedatetime.js" type="text/javascript"></script>
        <script src="js/queryupdate.js" type="text/javascript"></script>
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>
        
        
    </head>
    
    <body>
        
        <!-- NAVIGATION BAR -->
        
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">Fault Management System</a>
                </div>
                <div id="mynavbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="index.php"><span class="glyphicon glyphicon-eye-open"></span> View Entries</a></li>
                        <li class="active"><a href="#"><span class="glyphicon glyphicon-plus"></span> Add Fault Entry</a></li>
                        <li><a href="edit.php"><span class="glyphicon glyphicon-pencil"></span> Edit List Entries</a></li>
                    </ul>
                </div>
            </div>        
        </nav>
        
        <!-- CONTENT -->
        
        <div class="container" id="first">
            <h2 align="center">Add Fault Entry</h2>
            <form role="form" class="form-horizontal" action="index.html">
                
                <!-- Select Division, Control Section, SSE -->
                <div class="form-group has-success has-feedback"> 
                    
                    <!-- Select Division -->
                    <div class="col-md-4">

                            <label for="division">Division:</label>
                            <!-- input goes here -->
                            <select class="form-control" id="division" required>
                                <option value="<?php echo '0'; ?>"><?php echo 'Select Division'; ?></option>
                                <?php while($row = mysql_fetch_array($query_division)): ?>
                                <option value="<?php echo $row['d_id']; ?>"><?php echo $row['divname']; ?></option>
                                <?php endwhile; ?>
                            </select>        

                    </div>
                
                    <!-- Select Control Section -->
                    <div class="col-md-4">  

                            <label for="control_section">Control Section: </label>
                            <select class="form-control" id="control_section" required>
                                <option value="<?php echo '0'; ?>"><?php echo 'Select Control Section'; ?></option>
                                <?php while($row = mysql_fetch_array($query_controlsection)): ?>
                                <option value="<?php echo $row['c_s_id']; ?>"><?php echo $row['csname']; ?></option>
                                <?php endwhile; ?>
                            </select>

                     </div>

                    <!-- Select SSE Section -->
                    <div class="col-md-4">    

                            <label for="sse_section">SSE Section: </label>
                            <select class="form-control" id="sse_section" required>
                                <option value="<?php echo '0'; ?>"><?php echo 'Select SSE Section'; ?></option>
                                <?php while($row = mysql_fetch_array($query_sse)): ?>
                                <option value="<?php echo $row['sse_id']; ?>"><?php echo $row['sse_sec']; ?></option>
                                <?php endwhile; ?>
                            </select>

                    </div>
                    
                </div>
                
                
                
                <!-- Select Stations, Fault Location -->
                <div class="form-group has-success has-feedback"> 
                    
                    <!-- Select Station 1 -->
                    <div class="col-md-4">

                            <label for="station1">Station #1: </label>
                            <select class="form-control" id="station1" required>
                            <option value="<?php echo '0'; ?>"><?php echo 'Select Station 1'; ?></option>
                            <?php while($row = mysql_fetch_array($query_station)): ?>
                            <option value="<?php echo $row['station']; ?>"><?php echo $row['station']; ?></option>
                            <?php endwhile; ?>
                            </select>      

                    </div>
                    
                    <!-- Select Station 2 -->
                    <div class="col-md-4">

                            <label for="station2">Station #2: </label>
                            <select class="form-control" id="station2" required>
                            <option value="<?php echo '0'; ?>"><?php echo 'Select Station 2'; ?></option>
                            <?php mysql_data_seek( $query_station, 0 ); ?>
                            <?php while($row = mysql_fetch_array($query_station)): ?>
                            <option value="<?php echo $row['station']; ?>"><?php echo $row['station']; ?></option>
                            <?php endwhile; ?>
                            </select>      

                    </div>
                
                    <!-- Select Fault Location -->
                    <div class="col-md-4">  

                            <label for="location">Fault Location: </label>
                            <select class="form-control" id="location" required>
                                <option value="<?php echo '0'; ?>"><?php echo 'Select Location'; ?></option>
                                <?php while($row = mysql_fetch_array($query_location)): ?>
                                <option value="<?php echo $row['loc_id']; ?>"><?php echo $row['location']; ?></option>
                                <?php endwhile; ?>
                            </select>

                    </div>
                </div>    
                
                <!-- Select System, Sub System -->
                <div class="form-group has-success has-feedback"> 
                    
                    <!-- Select System -->
                    <div class="col-md-6">

                            <label for="system">System Failed: </label>
                            <select class="form-control" id="system" required>
                                <option value="<?php echo '0'; ?>"><?php echo 'Select System'; ?></option>
                                <?php while($row = mysql_fetch_array($query_systems)): ?>
                                <option value="<?php echo $row['sys_id']; ?>"><?php echo $row['system']; ?></option>
                                <?php endwhile; ?>
                            </select>    
                    </div>
                
                    <!-- Select Sub System -->
                    <div class="col-md-6">  

                            <label for="sub-system">Sub System Failed: </label>
                            <select class="form-control" id="sub-system" required>
                                <option value="<?php echo '0'; ?>"><?php echo 'Select Subsystem'; ?></option>
                                <?php while($row = mysql_fetch_array($query_subsystems)): ?>
                                <option value="<?php echo $row['subsys_id']; ?>"><?php echo $row['subsys']; ?></option>
                                <?php endwhile; ?>
                            </select>
                    </div>

                </div>
                
                <!-- Select Asset -->
                <div class="form-group has-success has-feedback">                     
                    <div class="col-md-12">

                            <label for="asset">Asset Failed: </label>
                            <select class="form-control" id="asset" required>
                                <option value="<?php echo '0'; ?>"><?php echo 'Select Asset'; ?></option>
                                <?php while($row = mysql_fetch_array($query_asset)): ?>
                                <option value="<?php echo $row['asset_id']; ?>"><?php echo $row['asset']; ?></option>
                                <?php endwhile; ?>
                            </select>   

                    </div>
                </div>
                
                <!-- Select Root Cause -->
                <div class="form-group has-success has-feedback">                     
                    <div class="col-md-12">

                            <label for="rootcause">Root Cause: </label>
                            <select class="form-control" id="rootcause" required>
                                <option value="<?php echo '0'; ?>"><?php echo 'Select Root Cause'; ?></option>
                                <?php while($row = mysql_fetch_array($query_rootcause)): ?>
                                <option value="<?php echo $row['rcause_id']; ?>"><?php echo $row['rcause']; ?></option>
                                <?php endwhile; ?>
                            </select> 

                    </div>
                </div>
                
                <!-- Select Responsible Department -->
                <div class="form-group has-success has-feedback">                     
                    <div class="col-md-12">

                            <label for="department">Responsible Department: </label>
                            <select class="form-control" id="department" required>
                                <option value="<?php echo '0'; ?>"><?php echo 'Select Responsible Department'; ?></option>
                                <?php while($row = mysql_fetch_array($query_department)): ?>
                                <option value="<?php echo $row['dep_id']; ?>"><?php echo $row['res_dep']; ?></option>
                                <?php endwhile; ?>
                            </select>

                    </div>
                </div>

                <!-- Select In Date and In Time -->
                <div class="form-group has-success has-feedback">
                    <div class="col-md-3">

                            <label for="inDate">In Date</label>
                            <input type="date" data-toggle="tooltip" data-placement="bottom" title="Format: dd-mm-yyyy" class="form-control" id="inDate" placeholder="dd-mm-yyyy">

                    </div>
                     
                    <div class="col-md-3">

                            <label for="inTime">In Time</label>
                            <input type="time" data-toggle="tooltip" data-placement="bottom" title="Format: hh:mm AM/PM Example: 11:35 AM" class="form-control" id="inTime" placeholder="hh:mm">

                    </div>
                     
                    <div class="col-md-3">

                            <label for="rightDate">Right Date</label>
                            <input type="date" data-toggle="tooltip" data-placement="bottom" title="Format: dd-mm-yyyy" class="form-control" id="rightDate" placeholder="dd-mm-yyyy">

                    </div>
                     
                    <div class="col-md-3">

                            <label for="rightTime">Right Time</label>
                            <input type="time" data-toggle="tooltip" data-placement="bottom" title="Format: hh:mm AM/PM Example: 11:35 AM" class="form-control" id="rightTime" placeholder="hh:mm">
                    </div>
                </div>

                
                <!-- Enter Remarks -->
                <div class="form-group has-success has-feedback">                     
                    <div class="col-md-12">

                            <label for="remarks">Remarks:</label>
                            <textarea class="form-control" rows="5" id="remarks" placeholder="Enter Remarks"></textarea>  
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block btn-lg" onclick="combineDateTime()" >Submit</button>
        
            </form>
        </div>

    </body>
</html>