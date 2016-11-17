
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Factura_model extends CI_Model {


	public function obtenerFacturas()
	{
		$json_string = file_get_contents("https://invoice.zoho.com/api/v3/invoices?authtoken=66d50986cbe79649dfe7c54cd335d3fd");
		$parsed_json = json_decode($json_string);
		//$parsed_json = json_decode('[{"invoice_id":"441148000000052125","ach_payment_initiated":false,"zcrm_potential_id":"","zcrm_potential_name":"","customer_name":"eth","customer_id":"441148000000052079","status":"draft","invoice_number":"INV-000003","reference_number":"3","date":"2016-11-16","due_date":"2016-11-16","due_days":"","currency_id":"441148000000052020","schedule_time":"","currency_code":"COP","is_viewed_by_client":false,"has_attachment":false,"client_viewed_time":"","total":20,"balance":20,"created_time":"2016-11-16T16:02:47-0500","last_modified_time":"2016-11-16T16:02:47-0500","is_emailed":false,"reminders_sent":0,"last_reminder_sent_date":"","payment_expected_date":"","last_payment_date":"","custom_fields":[],"documents":"","salesperson_id":"","salesperson_name":"","shipping_charge":0,"adjustment":0,"write_off_amount":0,"exchange_rate":1},{"invoice_id":"441148000000052115","ach_payment_initiated":false,"zcrm_potential_id":"","zcrm_potential_name":"","customer_name":"eth","customer_id":"441148000000052079","status":"draft","invoice_number":"INV-000002","reference_number":"2","date":"2016-11-16","due_date":"2016-12-16","due_days":"","currency_id":"441148000000052020","schedule_time":"","currency_code":"COP","is_viewed_by_client":false,"has_attachment":false,"client_viewed_time":"","total":200,"balance":200,"created_time":"2016-11-16T10:53:13-0500","last_modified_time":"2016-11-16T10:53:13-0500","is_emailed":false,"reminders_sent":0,"last_reminder_sent_date":"","payment_expected_date":"","last_payment_date":"","custom_fields":[],"documents":"","salesperson_id":"","salesperson_name":"","shipping_charge":0,"adjustment":0,"write_off_amount":0,"exchange_rate":1},{"invoice_id":"441148000000052099","ach_payment_initiated":false,"zcrm_potential_id":"","zcrm_potential_name":"","customer_name":"eth","customer_id":"441148000000052079","status":"draft","invoice_number":"INV-000001","reference_number":"1","date":"2016-11-16","due_date":"2016-11-16","due_days":"","currency_id":"441148000000052020","schedule_time":"","currency_code":"COP","is_viewed_by_client":false,"has_attachment":false,"client_viewed_time":"","total":120000,"balance":120000,"created_time":"2016-11-16T10:48:38-0500","last_modified_time":"2016-11-16T10:48:38-0500","is_emailed":false,"reminders_sent":0,"last_reminder_sent_date":"","payment_expected_date":"","last_payment_date":"","custom_fields":[],"documents":"","salesperson_id":"","salesperson_name":"","shipping_charge":0,"adjustment":0,"write_off_amount":0,"exchange_rate":1}]');
		return $parsed_json;
	}
   
   
   
	
}
?>