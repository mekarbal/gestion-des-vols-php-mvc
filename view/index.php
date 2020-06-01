<?php 
require_once("../controller/session_msgs.php");
include("../layout/header.php");
require_once("../model/functions.php");
open_connetion();
?>
<div class="">
    <div class="container">
        <form class="form" action="index.php" method="POST">
            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <select name="from" class="form-control my-3 " required>
                            
                            <option value="" disabled selected>Depart</option>
                            <?php $result = get_rows("SELECT depart FROM flight ");
                            
                                while($row = mysqli_fetch_row($result)){ ?>
                                
                                
                            <option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
                            <?php } ?>
                            
                            
                            
                        </select>
                    </div>

                    <div class="col-xs-12 col-sm-4 ">
                        <select name="to" class="form-control my-3" required>
                            <option value="" disabled selected>Distination</option>
                            <?php $result = get_rows("SELECT  distination FROM flight");
                                                                                                                    
                                while($row = mysqli_fetch_row($result)){ ?>
                                
                            <option value="<?php echo $row[0];?>"><?php echo $row[0];?></option>
                            <?php } ?>
                            
                            
                        </select>
                    </div>
                  <div class="form-group">
                  <div class="col-xs-12 col-sm-4">
                        <button type="submit" class="btn btn-primary my-3"><i class="fas fa-search"></i> Chercher</button>
                    </div>
                  </div>
                </div>
            </div>
        </form>
    </div>

</div>
<div class="container">
    <?php echo message();?>
    <div class="table-responsive">
        <table class="table flights">
            <?php
                $isreg      = true;
                $depart      = data_regis($_POST, "from",  $isreg);
                $distination = data_regis($_POST, "to", $isreg);
                $objs     = [];
                if( $isreg){
                    $objs = get_flights_objects(
                        "WHERE depart = '{$depart}' AND distination = '{$distination}' AND total_places > 0 AND is_active = 1");
                    if(!empty( $objs )){
                        
            ?>
            <thead class="thead-white">
                <tr>
                    <th>Nom</th>
                    <th>Départ</th>
                    <th>Déstination</th>
                    <th>Date de vol</th>
                    <th>L'heure de vol</th>
                    <th>Prix</th>
                    <th>nombre de places</th>
                </tr>
            </thead>
            <?php
            }
                } 
                $page = isset($_SESSION['id']) ? "reserve.php" : "sign.php";
            ?>
            <tbody class="tbody-white">
            <?php foreach($objs  as $vol){ ?>
            <tr >
                <th><?php echo $vol->get_data()["n_flight"];?></th>
                <th><?php echo $vol->get_data()["depart"];?></th>
                <th><?php echo $vol->get_data()["distination"];?></th>
                <th><?php echo $vol->get_data()["date_flight"];?></th>
                <th><?php echo $vol->get_data()["hour_flight"];?>h:<?php echo $vol->get_data()["hour_flight"];?>min</th>
                
                <th><?php echo $vol->get_data()["price"];?>Dhs</th>
                <th><?php echo $vol->get_data()["total_places"];?></th>
                <th><button class="btn btn-secondary" onclick="window.location='<?php echo $page ?>?id=<?php echo $vol->get_id(); ?>'"><i class="fas fa-eye"></i></button></th>
            </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<?php close_connection(); ?>
</body>

</html>