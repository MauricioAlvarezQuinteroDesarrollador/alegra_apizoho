<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#container {
		margin: 0 15px 0 15px;
		width: 800px;
	}	

	#container table {
		margin-top: 25px;
		border: 1px solid black;		
	}
	#container table tr, th{
		text-align: center;
		width: 14%;
	}
	</style>
	<script type="text/javascript">
var base_url="<?=base_url();?>";
</script>
</head>
<body>

<div id="container">
	<button class="refresh"> refrescar facturas</button>
	<button class="max"> facturas mayores a 100.000</button>
	<button class="re_order"> Cambiar tabla</button>
	<table >
		<THEAD>
			<tr>
				<th scope="col">customer name</th>
				<th scope="col">status</th>
				<th scope="col">invoice number</th>
				<th scope="col">reference number</th>
				<th scope="col">date</th>
				<th scope="col">currency id</th>
				<th scope="col">total</th>
			</tr>
		</THEAD>
		
		
		<tbody>
			<?php 
			foreach ($facturas as $item) {
			?>	
				<tr>
					<td><?php echo $item->customer_name; ?></td>
					<td><?php echo $item->status; ?></td>					
					<td><?php echo $item->invoice_number; ?></td>
					<td><?php echo $item->reference_number; ?></td>
					<td><?php echo $item->date; ?></td>
					<td><?php echo $item->currency_id; ?></td>
					<td><?php echo $item->total; ?></td>
				</tr>
				
			<?php
			}
			?>
		</tbody>
			
	
	</table>
	
</div>

</body>
<script type="text/javascript" src="<?=base_url();?>assets/js/jquery-1.9.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$(".refresh").click(function(){
			obtenerFacturas("ok");
	});

	$(".re_order").click(function(){
			obtenerFacturas("ord");
	});

	$(".max").click(function(){
		var bool=true;
		if(bool)
		{
			bool=false;
			var info = {  };
			$.ajax({                
			        url: base_url+'/index.php/Welcome/obtenerMayores',  
			        type: 'POST',              
			        data: info,              
			        success: function(msg){ 		           
			          pintar_tabla(JSON.parse(msg),"ok");		          
			          bool=true;  
			                                
			        }                          
			});  
		}
	})
  	
});

function obtenerFacturas(string){
	var bool=true;
	if(bool)
	{
		bool=false;
		var info = { res:string };
		$.ajax({                
		        url: base_url+'/index.php/Welcome/filtrarFacturas',  
		        type: 'POST',              
		        data: info,              
		        success: function(msg){ 		           
		          pintar_tabla(JSON.parse(msg),string);		          
		          bool=true;  
		                                
		        }                          
		});  
	}
}
function pintar_tabla(facturas,filtro){
	var thead='<tr><th scope="col">customer name</th><th scope="col">status</th><th scope="col">invoice number</th><th scope="col">reference number</th><th scope="col">date</th><th scope="col">currency id</th><th scope="col">total</th></tr>';
	if(filtro=="ord"){
		thead='<tr><th scope="col">invoice number</th><th scope="col">status</th><th scope="col">total</th><th scope="col">customer name</th></tr>'
	}
	var tbody="";
	for (var i = 0; i < facturas.length; i++) {
		tbody+='<tr>';
			if(filtro=="ok"){
				tbody+='<td>'+facturas[i]["customer_name"]+'</td>';
				tbody+='<td>'+facturas[i]["status"]+'</td>';
				tbody+='<td>'+facturas[i]["invoice_number"]+'</td>';
				tbody+='<td>'+facturas[i]["reference_number"]+'</td>';
				tbody+='<td>'+facturas[i]["date"]+'</td>';
				tbody+='<td>'+facturas[i]["currency_id"]+'</td>';
				tbody+='<td>'+facturas[i]["total"]+'</td>';
			}else{
				tbody+='<td>'+facturas[i]["invoice_number"]+'</td>';				
				tbody+='<td>'+facturas[i]["status"]+'</td>';
				tbody+='<td>'+facturas[i]["total"]+'</td>';
				tbody+='<td>'+facturas[i]["customer_name"]+'</td>';				
			}										
		tbody+='</tr>';		
		$("#container table tbody").html(tbody);
		$("#container table thead").html(thead);
	}
}

</script>
</html>