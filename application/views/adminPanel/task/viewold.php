<section class="content">
   <?php $veh_sender = $this->main->check('vehicle_sender', ['id' => $data['veh_sender']], 'name');
      $city = $this->main->check('city', ['id' => $data['city_id']], 'city') ?>
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="invoice p-3 mb-3">
               <div class="tbl" id="page-wrap">
                  <div class="himg">
                     <img src="<?= assets('images/header.jpg')?>">
                  </div>
                  <div>
                     <h3 align="center">V A L U A T I O N R E P O R T</h3>
                     <h5 align="center">(FINANCE PURPOSE ONLY)</h5>
                  </div>
                  <div>
                     <div class="ref">
                        <p>Ref.No.:<span><?= $data['ref_no'] ?></span></p>
                     </div>
                     <div class="date">
                        <p>Date:<span><?= date("d-m-Y", strtotime($data['created_at'])) ?></span></p>
                     </div>
                  </div>
                  <div class="address">
                     <address>
                        To,<br>
                        <strong><?= $veh_sender ?></strong><br>
                        <?= $city ?>
                     </address>
                  </div>
                  <div>
                     <div class="table-mb">
                        <table>
                           <tbody>
                              <tr>
                                 <th class="padding centerr">
                                    <strong>A</strong>
                                 </th>
                                 <th class="padding" colspan="3" style="background-color: #ddd9c4;">
                                    <strong><u>GENERAL INFORMATION</u></strong>
                                 </th>
                              </tr>
                              <tr>
                                 <td class="padding centerr">
                                    1
                                 </td>
                                 <td class="padding">
                                    REQUEST RECEIVED FROM
                                 </td>
                                 <td class="padding" colspan="2" >
                                    <?= $veh_sender ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="padding centerr">
                                    2
                                 </td>
                                 <td class="padding">
                                    APPLICANT/ HIRER 
                                 </td>
                                 <td class="padding" colspan="2" >
                                    <?= $data['applicant'] ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="padding centerr">
                                    3
                                 </td>
                                 <td class="padding">
                                    LOAN NO
                                 </td>
                                 <td class="padding" colspan="2" >
                                    <?= $data['loan'] ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="padding centerr">
                                    4
                                 </td>
                                 <td class="padding" >
                                    INSPECTION PLACE
                                 </td>
                                 <td class="padding" >
                                    <?= $city ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="padding centerr">
                                    5
                                 </td>
                                 <td class="padding" >
                                    INSPECTION DATE
                                 </td>
                                 <td class="padding" colspan="2" >
                                    <?= date("d-m-Y", strtotime($data['ins_date'])) ?>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="table-mb">
                        <table >
                           <tbody>
                              <tr>
                                 <th class="padding centerr">
                                    <strong>B</strong>
                                 </th>
                                 <th class="padding " colspan="5" style="background-color: #ddd9c4;">
                                    <strong><u>VEHICLE PARTICULAR</u>  [as per RTA docs/ invoice or detail provided by applicant]</strong>
                                 </th>
                              </tr>
                              <tr>
                                 <td class="centerr">
                                    1
                                 </td>
                                 <td class="padding">
                                    <strong>REGISTRATION NO.</strong>
                                 </td>
                                 <td class="padding ">
                                    <strong><?= $data['veh_no'] ?></strong>
                                 </td>
                                 <td class="centerr">
                                    2
                                 </td>
                                 <td class="padding">
                                    <strong>OLD REGN. NO</strong>
                                 </td>
                                 <td class="padding">
                                    <?= $data['old_veh_no'] ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="padding centerr">
                                    3
                                 </td>
                                 <td class="padding">
                                    <strong>REG. OWNER</strong>
                                 </td>
                                 <td class="padding ">
                                    <?= $data['owner'] ?>
                                 </td>
                                 <td class="padding centerr">
                                    4
                                 </td>
                                 <td class="padding">
                                    <strong>OWNER SR. NO.</strong>
                                 </td>
                                 <td class="padding">
                                    <?= $data['owner_sr'] ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="padding centerr">
                                    5
                                 </td>
                                 <td class="padding ">
                                    <strong>REGISTRATION DATE</strong>
                                 </td>
                                 <td class="padding">
                                    <?= $data['reg_date'] ?>
                                 </td>
                                 <td class="padding centerr">
                                    6
                                 </td>
                                 <td class="padding">
                                    <strong>MANU. YEAR</strong>
                                 </td>
                                 <td class="padding">
                                    <?= $data['man_year'] ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="padding centerr">
                                    7
                                 </td>
                                 <td class="padding">
                                    <strong>CHASSIS NO. </strong>
                                 </td>
                                 <td class="padding ">
                                    <?= $data['chassis_no'] ?>
                                 </td>
                                 <td class="padding centerr">
                                    8
                                 </td>
                                 <td class="padding ">
                                    <strong>ENGINE NO.</strong>
                                 </td>
                                 <td class="padding ">
                                    <?= $data['engine_no'] ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="padding centerr">
                                    9
                                 </td>
                                 <td class="padding ">
                                    <strong>MAKE</strong>
                                 </td>
                                 <td class="padding ">
                                    <?= $this->main->check('make', ['id' => $data['make']], 'make') ?>                      
                                 </td>
                                 <td class="padding centerr">
                                    10
                                 </td>
                                 <td class="padding ">
                                    <strong>VARIANT</strong>
                                 </td>
                                 <td class="padding">
                                    <?= $this->main->check('variant', ['id' => $data['variant']], 'variant') ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="padding centerr">
                                    11
                                 </td>
                                 <td class="padding">
                                    <strong>TRIM</strong>
                                 </td>
                                 <td class="padding">
                                    
                                    <?= $this->main->check('trim', ['id' => $data['trim']], 'trim') ?>
                                 </td>
                                 <td class="padding centerr">
                                    12
                                 </td>
                                 <td class="padding ">
                                    <strong>FUEL USED</strong>
                                 </td>
                                 <td class="padding ">
                                    <?= $this->main->check('fuel', ['id' => $data['fuel']], 'fuel') ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="padding centerr">
                                    13
                                 </td>
                                 <td class="padding ">
                                    <strong>VEHICLE CLASS</strong>
                                 </td>
                                 <td class="padding">
                                    <?= $this->main->check('vehicle_class', ['id' => $data['veh_class']], 'class') ?>
                                 </td>
                                 <td class="padding centerr">
                                    14
                                 </td>
                                 <td class="padding ">
                                    <strong>BODY TYPE</strong>
                                 </td>
                                 <td class="padding ">
                                    <?= $this->main->check('body_type', ['id' => $data['body_type']], 'body_type') ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="padding centerr">
                                    15
                                 </td>
                                 <td class="padding ">
                                    <strong>SEATING CAPACITY</strong>
                                 </td>
                                 <td class="padding ">
                                    <?= $data['seating'] ?>
                                 </td>
                                 <td class="padding centerr">
                                    16
                                 </td>
                                 <td class="padding">
                                    <strong>GVW (KGS)</strong>
                                 </td>
                                 <td class="padding ">
                                    <?= $data['gvw'] ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="padding centerr">
                                    17
                                 </td>
                                 <td class="padding ">
                                    <strong>HPA WITH</strong>
                                 </td>
                                 <td class="padding " colspan="4">
                                    <?= $data['hpa'] ?>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="table-mb">
                        <?php $condition = json_decode($data['condition']) ?>
                        <table >
                           <thead>
                              <th class="padding centerr">
                                 <strong>C</strong>
                              </th>
                              <th class="padding " colspan="7" style="background-color: #ddd9c4;">
                                 <strong><u>CONDITION OF ASSET</u></strong><br>
                                 <u style="font-size: 13px;">(A- Execellent, B-Good, C-Average, D-Poor)</u>
                              </th>
                           </thead>
                           <tbody >
                              <tr >
                                 <td colspan="2"  class="padding centerr">
                                    ENGINE
                                 </td>
                                 <td class="padding centerr">
                                    <?= $condition->engine ?>
                                 </td>
                                 <td  class="padding ">
                                    TYRES (overall)
                                 </td>
                                 <td class="padding centerr">
                                    <?= $condition->tyres ?>
                                 </td>
                                 <td class="padding centerr">
                                    *
                                 </td>
                                 <td  class="padding centerr">
                                    OVERALL CONDITION RATING
                                 </td>
                                 <td class="padding centerr">
                                    <?= $condition->overall ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" class="padding centerr">
                                    CHASSIS
                                 </td>
                                 <td class="padding centerr">
                                    <?= $condition->chassis ?>
                                 </td>
                                 <td  class="padding centerr">
                                    ELECTRICAL PARTS
                                 </td>
                                 <td class="padding centerr">
                                    <?= $condition->electrical_parts ?>
                                 </td>
                                 <td class="padding centerr">
                                    *
                                 </td>
                                 <td  class="padding centerr">
                                    ODO. READING (Km)
                                 </td>
                                 <td class="padding centerr">
                                    <?= $condition->odo ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2"  class="padding centerr">
                                    CABIN/ BODY CELL
                                 </td>
                                 <td class="padding centerr">
                                    <?= $condition->body_cabin ?>
                                 </td>
                                 <td class="padding centerr">
                                    BATTERY
                                 </td>
                                 <td class="padding centerr">
                                    <?= $condition->battery ?>
                                 </td>
                                 <td class="padding centerr">
                                    *
                                 </td>
                                 <td class="padding centerr">
                                    VEHICLE COLOUR
                                 </td>
                                 <td class="padding centerr">
                                    <?= $condition->color ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2"  class="padding centerr">
                                    LOAD BODY
                                 </td>
                                 <td class="padding centerr">
                                    <?= $condition->load_body ?>
                                 </td>
                                 <td  class="padding centerr">
                                    AC SYSTEM
                                 </td>
                                 <td class="padding centerr">
                                    <?= $condition->ac_system ?>
                                 </td>
                                 <td class="padding centerr">
                                    *
                                 </td>
                                 <td  class="padding centerr">
                                    CHASSIS NO. REPUNCHED (YES/NO)
                                 </td>
                                 <td class="padding centerr">
                                    <?= $data['repunched'] ?>
                                 </td>
                              </tr>
                              <tr >
                                 <td colspan="2" class="padding centerr">
                                    TRANSMISSION
                                 </td>
                                 <td class="padding centerr">
                                    <?= $condition->transmission ?>
                                 </td>
                                 <td  class="padding centerr">
                                    UPHOLSTERY
                                 </td>
                                 <td class="padding centerr">
                                    <?= $condition->upholstery ?>
                                 </td>
                                 <td colspan="3" class="padding centerr">
                                    <strong><u>OTHER OBSERVATION</u></strong>
                                 </td>
                              </tr>
                              <tr >
                                 <td colspan="2" class="padding centerr" >
                                    STEERING/ SUSPENSION
                                 </td>
                                 <td class="padding centerr">
                                    <?= $condition->steering ?>
                                 </td>
                                 <td class="padding centerr">
                                    HYDRAULIC SYSTEM
                                 </td>
                                 <td class="padding centerr">
                                    <?= $condition->hydraulic ?>
                                 </td>
                                 <td colspan="3" class="padding centerr">
                                    <strong><?= $condition->other ?></strong>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="table-mb">
                        <table >
                           <tbody>
                              <tr>
                                 <th rowspan="2" class="padding centerr">
                                    <strong>E</strong>
                                 </th>
                                 <td class="padding ">
                                    <strong>APPROX NEW VEHICLE PRICE</strong> (as on today)
                                 </td>
                                 <td class="padding ">
                                    <?= $condition->approx_today ?>
                                 </td>
                                 <td class="padding ">
                                    <strong>APPROX NEW VEHICLE PRICE</strong> (at purchase time)
                                 </td>
                                 <td class="padding ">
                                    <?= $condition->approx_purchase ?>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="padding ">
                                    <strong>DEMAND IN MARKET</strong>
                                 </td>
                                 <td class="padding ">
                                    <?= $condition->demand ?>
                                 </td>
                                 <td class="padding ">
                                    <strong>ABSOLUTE MODEL</strong>
                                 </td>
                                 <td class="padding ">
                                    <?= $condition->absolute ?>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="table-mb">
                        <table >
                           <tbody>
                              <tr>
                                 <th class="padding centerr">
                                    <strong>F</strong>
                                 </th>
                                 <td class="padding ">
                                    <strong>RTO DOCUMENTS, INSURANCE & TAX VALIDITY : </strong> consider all docs <strong> <?= $data['documents'] ?> </strong> (as on today)
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="table-mb">
                        <table >
                           <tbody>
                              <tr>
                                 <th rowspan="2" class="padding centerr">
                                    <strong>G</strong>
                                 </th>
                                 <th class="padding centerr"style="background-color: #ddd9c4; ">
                                    <strong><u>DECLARATION</u></strong>
                                 </th>
                              </tr>
                              <tr>
                                 <td class="padding ">
                                    <span style="font-size: 11px;">1) I had not verified the original docs. which is to be checked at your end. 2) This report is valid for 30 days from the inspection date. 2) this report is addressed and is to be used solely by the said party for the stated purpose only and I am not liable for any loss or liability sustained by any third party relying on this Valuation Report 3) Encl : Photo of vehicle.</span>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="table-mb">
                        <table >
                           <tbody>
                              <tr>
                                 <th class="padding centerr">
                                    <strong>H</strong>
                                 </th>
                                 <th class="padding centerr">
                                    <strong>MARKET VALUE </strong>
                                 </th>
                                 <th class="padding centerr" style="background-color: #ddd9c4;">
                                    <strong><i class="fa fa-rupee-sign"></i> <?= $data['market_value'] ?>000</strong>
                                 </th>
                                 <td class="padding ">
                                    (as it is and where it is/ my personal opinion as per local market trend and vehicle condition)
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                     <div class="last table-mb">
                        <table>
                           <tbody>
                              <tr >
                                 <td class="padding leftt">
                                    <strong><u>"Issued without Prejudice"</u></strong>
                                 </td>
                                 <td class="padding leftt">
                                    <strong>VIRAL SHAH</strong>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" class="padding-tb rightt">
                                    <strong>Surveyor, Valuer &amp; Loss Assessor</strong>
                                 </td>
                              </tr>
                           </tbody>
                          
                        </table>
                        
                     </div>
                     <div class="bottom himg mt-4 mb-5">
                          <img src="<?= assets('images/footer.jpeg')?>">
                        </div>
                  </div>
                  <?php $imgs = json_decode($data['images']); ?>
                  <div class="row" style="width: 100%">
                     <?php foreach ($imgs as $k => $img): ?>
                     <div class="col-md-6 " id="rem_img_<?= $k ?>" style="margin-top: 33px;">
                        <div style="width: 100%;">
                          <img src="<?= base_url('assets/images/vehicles/15368.jpg') ?>" onclick="return confirm('Press a button!') ? document.getElementById('rem_img_<?= $k ?>').remove() : false" style="width: 100%; height: 340px;">
                        </div>
                     </div>
                     <?php endforeach ?>
                  </div>
               </div>
               <div class="row no-print">
                  <div class="col-12">
                     <?= anchor($url, '<i class="fas fa-arrow-circle-left"></i> Go Back', 'class="btn btn-outline-danger col-sm-2 float-right" style="margin-right: 5px;"'); ?>
                     <?= form_button([ 'content' => 'Print',
                        'type'  => 'button',
                        'onclick'  => 'window.print()',
                        'class' => 'btn btn-outline-primary col-sm-2 float-right mr-2']) ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      
   </div>
</section>
<style type="text/css">
   *{
   padding: 0px;
   margin: 0px;
   box-sizing: border-box;
   }
   table, th{
   border: 2px solid black;
   border-collapse: collapse;
   font-size: 14px;
   }
   td {
   text-align: left;
   border: 1px solid black;
   border-collapse: collapse;
   }
   table td p{
   font-size: 13px;
   padding: 2px;
   }
   table{
   width: 100%;
   }
   .ref, .date{
   display: inline-block;
   }
   .date{float:right;}
   .ref span{border:2px solid black;
   padding: 10px;
   }
   .last th, .last td,{
   border:0px;
   border-collapse: collapse;
   }
   .column {
   flex: 45%;
   max-width: 50%;
   padding: 0 4px;
   }
   .column img {
   margin: 8px;
   width: 100%;
   }
   .tbl{ margin-left: 10px; }
   .tbl .himg img{
   width: 100%;
   }
   .padding{
   padding: 8px;
   }
   .centerr{
   text-align: center;
   }
   .leftt{
   text-align: left;
   }
   .rightt{
   text-align: right;
   }
   .padding-tb{
   padding: 20px 15px;
   }
   .table-mb{
   margin-bottom: 20px;
   }

   @media print {
   .padding{
   padding: 3px;
   }
    .bottom{
    }
   }
</style>