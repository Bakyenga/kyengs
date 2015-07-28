<?php 

class Reminder extends Model{

	function get_reminders()
	{
	//pick all service reminders		
	$data['userdetails'] = $this->session->userdata('alluserdata');
 $id=$data['userdetails']['companyid'];
$rd="N";
 $tym=date("Y-m-d");
	
      $rmresult = $this->db->query('SELECT trucks.regnumber, services.`name`, services.duenext, services.service_id, services.truck_id,
                                   services.company_id FROM services INNER JOIN trucks ON trucks.truck_id = services.truck_id
                                    WHERE services.company_id = "'.$id.'" AND "'.$tym.'" >= services.lastdate AND trucks.odoqui >=                                     services.set_odo AND services.regnsd = "'.$rd.'" order by date_created DESC LIMIT 4');
	
	
	
	return  $rmresult->result();
	}
	
	function insurance_reminder()
	{
	//insurance remiders	
	$data['userdetails'] = $this->session->userdata('alluserdata');
 $id=$data['userdetails']['companyid'];

 $tym=date("Y-m-d");
$result2 = $this->db->query('SELECT trucks.show_lice_on, trucks.inscompany, trucks.endlicedate, trucks.enddate, trucks.show_ins_on,
                                  trucks.regnumber FROM trucks WHERE trucks.company_id = "'.$id.'" AND "'.$tym.'" >= trucks.show_ins_on                                    order by enddate DESC LIMIT 4');
      $data['ins']= $result2->num_rows();
	  
	  return  $result2->result();
	}
	
	
	
	function license_reminder()
	{
	 //licence reminders	
	$data['userdetails'] = $this->session->userdata('alluserdata');
 $id=$data['userdetails']['companyid'];

 $tym=date("Y-m-d");
 

      $result3 = $this->db->query('SELECT trucks.show_lice_on, trucks.endlicedate, trucks.regnumber FROM trucks WHERE
                                  "'.$tym.'" >= trucks.show_lice_on AND trucks.company_id = "'.$id.'"  order by endlicedate DESC LIMIT 5');
       $data['lic']= $result3->num_rows();  
	  return  $result3->result();
	}
	
	}
	?>