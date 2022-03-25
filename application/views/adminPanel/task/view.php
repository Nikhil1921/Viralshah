<style type="text/css">
   #tbl_td {
    padding-left: 5px;
    }
</style>
<section class="content">
   <?php $veh_sender = $this->main->check('vehicle_sender', ['id' => $data['veh_sender']], 'name');
      $veh_emp = $this->main->check('vehicle_sender_employee', ['id' => $data['veh_sender_emp']], 'emp_code');
      $city = $this->main->check('city', ['id' => $data['city_id']], 'city');
      $emp_code = $this->main->check('employees', ['id' => $data['emp_id']], 'emp_code'); ?>
   <div class="container" style="background-color: #fff;">
      <div class="row">
         <div class="col-12 ">
            <div class="himg">
               <img src="<?= assets('images/header.jpg')?>">
            </div>
         </div>
         <div class="col-12 ">
            <h3 align="center" style="font-weight: 700; letter-spacing: 5px; word-spacing: 15px;">VALUATION REPORT</h3>
            <h5 align="center">(FINANCE PURPOSE ONLY)</h5>
         </div>
      </div>
      <div class="row">
         <div class="col-6 ">
            <p><b>Ref.No.: </b><span><?= $data['id'] ?></span></p>
         </div>
         <div class="col-6 text-right" >
            <p><b>Date: </b><span><?= date("d-m-Y", strtotime($data['created_at'])) ?></span></p>
         </div>
         <div class="col-5 ">
            <div class="address">
               <address>
                  To,<br>
                  <strong><?= $veh_sender ?></strong><br>
                  <?= $city ?>
               </address>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12 ">
            <div class="table-responsive-sm">
               <table class="table">
                  <tbody style="border: 2px solid black;">
                     <tr>
                        <th class="text-center" style="border: 1px solid black; width: 50px;">
                           <strong>A</strong>
                        </th>
                        <th colspan="7" style="background-color: #ddd9c4; text-align: center; border: 1px solid black;">
                           <strong><u>GENERAL INFORMATION</u></strong>
                        </th>
                     </tr>
                     <tr>
                        <td class="text-center" style="border: 1px solid black; ">
                           1
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           REQUEST RECEIVED FROM
                        </td>
                        <td id="tbl_td"  colspan="3">
                           <?= $veh_sender ?>
                        </td>
                        <td>
                           <strong>FO:</strong>
                        </td>
                        <td style="border-right: 1px solid black;">
                           <?= $veh_emp ?>
                        </td>
                     </tr>
                     <tr >
                        <td class="text-center" style="border: 1px solid black;">
                           2
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           APPLICANT/ HIRER 
                        </td>
                        <td id="tbl_td" colspan="3" style="border-top: 1px solid black;">
                           <?= $data['applicant'] ?>
                        </td>
                        <td style="border-top: 1px solid black;"><strong>LOAN NO.:</strong></td>
                        <td  style="border-top: 1px solid black; border-right: 1px solid black;"><?= $data['loan'] ?></td>
                     </tr>
                     <tr>
                        <td  style="border: 1px solid black;" class="text-center">3</td>
                        <td id="tbl_td" style="border: 1px solid black;">INSPECTION DETAIL</td>
                        <td id="tbl_td" style="border-top: 1px solid black;"><strong><!-- <?= $city ?> -->Date: </strong><?= date("d-m-Y", strtotime($data['ins_date'])) ?></td>
                        <td style="border-top: 1px solid black;"><strong>PLACE:</strong></td>
                        <td style="border-top: 1px solid black;"><?= $city ?></td>
                        <td style="border-top: 1px solid black;"><strong><!-- <?= date("d-m-Y", strtotime($data['ins_date'])) ?> --> DONE BY:</strong></td>
                        <td style="border-top: 1px solid black; border-right: 1px solid black;"><?= $emp_code ?></td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="table-responsive-sm">
               <table class="table">
                  <tbody style="border:2px solid black;">
                     <tr>
                        <th class="text-center" style="border: 1px solid black; width: 50px;">
                           <strong>B</strong>
                        </th>
                        <th colspan="5" style="background-color: #ddd9c4; text-align: center; border: 1px solid black;">
                           <strong><u>VEHICLE PARTICULAR</u>  [as per RTA docs/ invoice or detail provided by applicant]</strong>
                        </th>
                     </tr>
                     <tr>
                        <td class="text-center" style="border: 1px solid black;">
                           1
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>REGISTRATION NO.</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong><?= $data['veh_no'] ?></strong>
                        </td>
                        <td class="text-center" style="border: 1px solid black;">
                           2
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>OLD REGN. NO</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;  width: 15%;">
                           <?= $data['old_veh_no'] ?>
                        </td>
                     </tr>
                     <tr>
                        <td class="text-center" style="border: 1px solid black;">
                           3
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>REG. OWNER</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <?= $data['owner'] ?>
                        </td>
                        <td class="text-center" style="border: 1px solid black;">
                           4
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>OWNER SR. NO.</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <?= $data['owner_sr'] ?>
                        </td>
                     </tr>
                     <tr>
                        <td class="text-center" style="border: 1px solid black;">
                           5
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>REGISTRATION DATE</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <?= date('d-m-Y', strtotime($data['reg_date'])) ?>
                        </td>
                        <td class="text-center" style="border: 1px solid black;">
                           6
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>MANU. YEAR</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <?= $data['man_year'] ?>
                        </td>
                     </tr>
                     <tr>
                        <td class="text-center" style="border: 1px solid black;">
                           7
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>CHASSIS NO. </strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <?= $data['chassis_no'] ?>
                        </td>
                        <td class="text-center" style="border: 1px solid black;">
                           8
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>ENGINE NO.</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <?= $data['engine_no'] ?>
                        </td>
                     </tr>
                     <tr>
                        <td class="text-center" style="border: 1px solid black;">
                           9
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>MAKE</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <?= $this->main->check('make', ['id' => $data['make']], 'make') ?>                      
                        </td>
                        <td class="text-center" style="border: 1px solid black;">
                           10
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>VARIANT</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <?= $this->main->check('variant', ['id' => $data['variant']], 'variant') ?>
                        </td>
                     </tr>
                     <tr>
                        <td class="text-center" style="border: 1px solid black;">
                           11
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>TRIM</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <?= $this->main->check('trim', ['id' => $data['trim']], 'trim') ?>
                        </td>
                        <td class="text-center" style="border: 1px solid black;">
                           12
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>FUEL USED</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <?= $this->main->check('fuel', ['id' => $data['fuel']], 'fuel') ?>
                        </td>
                     </tr>
                     <tr>
                        <td class="text-center" style="border: 1px solid black;">
                           13
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>VEHICLE CLASS</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <?= $this->main->check('vehicle_class', ['id' => $data['veh_class']], 'class') ?>
                        </td>
                        <td class="text-center" style="border: 1px solid black;">
                           14
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>BODY TYPE</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <?= $this->main->check('body_type', ['id' => $data['body_type']], 'body_type') ?>
                        </td>
                     </tr>
                     <tr>
                        <td class="text-center" style="border: 1px solid black;">
                           15
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>SEATING CAPACITY</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <?= $data['seating'] ?>
                        </td>
                        <td class="text-center" style="border: 1px solid black;">
                           16
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>GVW (KGS)</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <?= $data['gvw'] ?>
                        </td>
                     </tr>
                     <tr>
                        <td class="text-center" style="border: 1px solid black;">
                           17
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>HPA WITH</strong>
                        </td>
                        <td id="tbl_td" colspan="4" style="border: 1px solid black;">
                           <?= $data['hpa'] ?>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="table-responsive-sm">
               <?php $condition = json_decode($data['condition']) ?>
               <table class="table">
                  <tbody style="border:2px solid black;">
                     <tr style="border:1px solid black;">
                        <th class="text-center" style="background-color: #ddd9c4;">
                           <div style="width: 50px; background-color: #fff; border-right:1px solid black;"><strong>C</strong></div>
                        </th>

                        <th class="text-center"  style="background-color: #ddd9c4; border-right:2px solid black;" colspan="7">
                           <strong><u>CONDITION OF ASSET</u></strong>
                           <u style="font-size: 13px;">(A- Execellent, B-Good, C-Average, D-Poor)</u>
                        </th>
                        
                     </tr>
                     <tr >
                        <td id="tbl_td" style="border: 1px solid black; " colspan="2">
                           ENGINE
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;  text-align: center;" width="5%">
                           <?= $condition->engine ?>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           TYRES (overall)
                        </td>
                        <td style="border: 1px solid black;  text-align: center;" width="5%">
                           <?= $condition->tyres ?>
                        </td>
                        <td style="border: 1px solid black;  text-align: center;" width="5%">
                           *
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;" colspan="">
                           OVERALL CONDITION RATING
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;" colspan="2">
                           <?= $condition->overall ?>
                        </td>
                     </tr>
                     <tr>
                        <td id="tbl_td" style="border: 1px solid black;" colspan="2">
                           CHASSIS
                        </td>
                        <td id="tbl_td" style="border: 1px solid black; text-align: center;">
                           <?= $condition->chassis ?>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black; ">
                           ELECTRICAL PARTS
                        </td>
                        <td id="tbl_td" style="border: 1px solid black; text-align: center;">
                           <?= $condition->electrical_parts ?>
                        </td>
                        <td style="border: 1px solid black; text-align: center;">
                           *
                        </td>
                        <td id="tbl_td"  style="border: 1px solid black;" >
                           ODO. READING (Km)
                        </td>
                        <td id="tbl_td" style="border: 1px solid black; " colspan="2">
                           <?= $condition->odo ?>
                        </td>
                     </tr>
                     <tr>
                        <td id="tbl_td" style="border: 1px solid black; width: " colspan="2">
                           CABIN/ BODY CELL
                        </td>
                        <td id="tbl_td" style="border: 1px solid black; text-align: center;">
                           <?= $condition->body_cabin ?>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           BATTERY
                        </td>
                        <td id="tbl_td" style="border: 1px solid black; text-align: center;">
                           <?= $condition->battery ?>
                        </td>
                        <td style="border: 1px solid black; text-align: center;">
                           *
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;" >
                           VEHICLE COLOUR
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;" colspan="2">
                           <?= $condition->color ?>
                        </td>
                     </tr>
                     <tr>
                        <td id="tbl_td" style="border: 1px solid black;" colspan="2">
                           LOAD BODY
                        </td>
                        <td id="tbl_td" style="border: 1px solid black; text-align: center;">
                           <?= $condition->load_body ?>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           AC SYSTEM
                        </td>
                        <td id="tbl_td" style="border: 1px solid black; text-align: center;">
                           <?= $condition->ac_system ?>
                        </td>
                        <td style="border: 1px solid black; text-align: center;">
                           *
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;" >
                           CHASSIS NO. REPUNCHED (YES/NO)
                        </td>
                        <td id="tbl_td" style="border: 1px solid black; " colspan="2">
                           <?= $data['repunched'] ?>
                        </td>
                     </tr>
                     <tr >
                        <td id="tbl_td" style="border: 1px solid black;" colspan="2">
                           TRANSMISSION
                        </td>
                        <td id="tbl_td" style="border: 1px solid black; text-align: center;">
                           <?= $condition->transmission ?>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;">
                           UPHOLSTERY
                        </td>
                        <td id="tbl_td" style="border: 1px solid black; text-align: center;">
                           <?= $condition->upholstery ?>
                        </td>
                        <td id="tbl_td" colspan="2" rowspan="2" style=" background-color: #ddd9c4; border:1px solid black; /*vertical-align: middle;*/ /*text-align: center*/;" >
                              
                              <strong><u>OTHER OBSERVATION :</u></strong>
                              
                           
                           
                        </td>
                        <td id="tbl_td" colspan="3" rowspan="2" style="border-right: 1px solid black; border-bottom: 1px solid black; vertical-align: middle; text-align: center;">
                           <strong><?= $condition->other ?></strong>
                        </td>
                     </tr>
                     <tr >
                        <td id="tbl_td" style="border: 1px solid black; " colspan="2">
                           STEERING/ SUSPENSION
                        </td>
                        <td id="tbl_td" style="border: 1px solid black; text-align: center;">
                           <?= $condition->steering ?>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black;" width="20%">
                           HYDRAULIC SYSTEM
                        </td>
                        <td id="tbl_td" style="border: 1px solid black; text-align: center;">
                           <?= $condition->hydraulic ?>
                        </td>
                        
                     </tr>
                  </tbody>
               </table>
            </div>
            
            <div class="table-responsive-sm">
               <table class="table">
                  <tbody style="border:2px solid black;">
                     <tr>
                        <th rowspan="2" style="border:1px solid black; width: 50px; text-align: center;">
                           <strong>E</strong>
                        </th>
                        <td id="tbl_td" style="border:1px solid black;">
                           <strong>APPROX NEW VEHICLE PRICE</strong> (as on today)
                        </td>
                        <td id="tbl_td" style="border:1px solid black; width: 10%;"><?= $condition->approx_today ?></td>
                        <td id="tbl_td" style="border:1px solid black;">
                           <strong>APPROX NEW VEHICLE PRICE</strong> (at purchase time)
                        </td>
                        <td id="tbl_td" style="border:1px solid black; width: 10%;"><?= $condition->approx_purchase ?></td>
                     </tr>
                     <tr>
                        <td id="tbl_td" style="border:1px solid black;">
                           <strong>DEMAND IN MARKET</strong>
                        </td>
                        <td id="tbl_td" style="border:1px solid black;">
                           <?= $condition->demand ?>
                        </td>
                        <td id="tbl_td" style="border:1px solid black;">
                           <strong>ABSOLUTE MODEL</strong>
                        </td>
                        <td id="tbl_td" style="border:1px solid black;">
                           <?= $condition->absolute ?>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="table-responsive-sm">
               <table class="table">
                  <tbody style="border: 2px solid black;">
                     <tr>
                        <th class="text-center" style="border: 1px solid black; width: 50px;">
                           <strong>F</strong>
                        </th>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <strong>RTO DOCUMENTS, INSURANCE & TAX VALIDITY : </strong> consider all docs <strong> <?= $data['documents'] ?> </strong> (as on today)
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="table-responsive-sm">
               <table class="table">
                  <tbody style="border: 2px solid black;">
                     <tr>
                        <th class="text-center" rowspan="2" style="border: 1px solid black; width: 50px;">
                           <strong>G</strong>
                        </th>
                        <th id="tbl_td" style="background-color: #ddd9c4; ">
                           <strong><u>DECLARATION</u></strong>
                        </th>
                     </tr>
                     <tr>
                        <td id="tbl_td" style="border: 1px solid black;">
                           <span style="font-size: 11px; ">1) I had not verified the original docs. which is to be checked at your end. 2) This report is valid for 30 days from the inspection date. 3) this report is addressed and is to be used solely by the said party for the stated purpose only and I am not liable for any loss or liability sustained by any third party relying on this Valuation Report 4) Encl : Photo of vehicle.</span>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="table-responsive-sm">
               <table class="table">
                  <tbody style="border: 2px solid black;">
                     <tr>
                        <td style="border: 1px solid black; width: 5%; text-align: center;">
                           <strong>H</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black; width: 15%;">
                           <strong>MARKET VALUE </strong>
                        </td>
                        <td  style="background-color: #ddd9c4; border: 1px solid black; width: 15%;    text-align: center;">
                           <strong><i class="fa fa-rupee-sign"></i> <?= $data['market_value'] ?>000</strong>
                        </td>
                        <td id="tbl_td" style="border: 1px solid black; width: 60%">
                           (as it is and where it is/ my personal opinion as per local market trend and vehicle condition)
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
            <div class="table-responsive-sm">
               <table class="table">
                  <tbody style="border: 2px solid black;">
                     <tr height="50px">
                        <td  id="tbl_td" style="border: none; width: 60%; ">
                           <strong><u>"Issued without Prejudice"</u></strong>
                        </td>
                        <td style="border: none; width: 40%;">
                           <strong>VIRAL SHAH</strong>
                        </td>
                     </tr>
                     <tr>
                        <td style="border: none; width: 60%;">
                        </td>
                        <td style="border: none; width: 40%;">
                           <strong >Surveyor, Valuer &amp; Loss Assessor</strong>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <div class="bottom himg ">
               <img src="<?= assets('images/footer.jpeg')?>">
            </div>
         </div>
      </div>
      <?php $imgs = json_decode($data['images']); ?>
      <div class="row " style="width: 100%; ">
         <?php foreach ($imgs as $k => $img): if($img): ?>
         <div class="col-md-6 " id="rem_img_<?= $k ?>" style="">
            <div style="width: 100%; margin-top: 0px;">
               <img class="veh"  src="<?= base_url('assets/images/vehicles/'.$img) ?>" onclick="return confirm('Remove Image?') ? document.getElementById('rem_img_<?= $k ?>').remove() : false" onerror="this.style.display='none'">
            </div>
         </div>
         <?php endif; endforeach ?>
      </div>
      <div class="row no-print">
         <div class="col-12">
            <?= anchor($url, '<i class="fas fa-arrow-circle-left"></i> Go Back', 'class="btn btn-outline-danger col-sm-2 float-right" style="margin-right: 5px;"'); ?>
            <?= form_button([ 'content' => 'Print',
               'type'  => 'button',
               'onclick'  => 'document.title=\''.$data['id'].' '.$data['veh_no'].'\'; window.print()',
               'class' => 'btn btn-outline-primary col-sm-2 float-right mr-2']) ?>
         </div>
      </div>
   </div>
</section>
<style type="text/css">
   .himg{
      margin-top: 40px;
      margin-bottom: 40px;
   }
   .himg img{
   width: 100%;
   }
   .table td, .table th{
   padding: 0;
   }
   
   .veh{
   width: 100%; margin:auto;
   max-height: 350px;
   margin-bottom: 15px;
   }
   @media print{
   .himg img{
   width: 100%;
   }
   .veh{
   width: 100%;
   max-height: 295px;
   margin-top: 45px;
   
   }
   }
</style>