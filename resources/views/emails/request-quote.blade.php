
<body>	
	To whom it may concern,
	<br/>
	<br/>
	Below are inquiry message from visitor of Tenglay Group Website for quote request:
	<br/>
	<br/>
	Contact point:
	<br/>
	<br/>
	<table style="border: 1px solid #B7B7B7; border-collapse: collapse; width: 100%">
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold;background-color: #FDFAF6;">Company: </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; background-color: #FDFAF6;">{{ $company }}</td>
		</tr>
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; ">Contact Person: </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px;">{{ $contact_person_name }}</td>
		</tr>
		
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold;">Email: </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; ">{{ $contact_email }}</td>
		</tr>
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; background-color: #FDFAF6;">Phone Number: </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; background-color: #FDFAF6;">{{ $contact_phone }}</td>
		</tr>
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold;background-color: #FDFAF6;">Country: </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; background-color: #FDFAF6;">{{ $country }}</td>
		</tr>
	</table>
	<br/>
	<br/>
	Quote detail:
	<br/>
	<br/>
	<table style="border: 1px solid #B7B7B7; border-collapse: collapse; width: 100%">
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold;background-color: #FDFAF6;">Quote Type: </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; background-color: #FDFAF6;" colspan="8">{{ $quote_type }}</td>
		</tr>
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold;">Place of receipt: </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; " colspan="8">{{ $por }}</td>
		</tr>
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold;background-color: #FDFAF6; ">Place of delivery: </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px;background-color: #FDFAF6;" colspan="8">{{ $pod }}</td>
		</tr>
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; ">Delivery term: </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px;" colspan="8">{{ $delivery }}</td>
		</tr>
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; background-color: #FDFAF6;">Schedule: </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px;background-color: #FDFAF6;" colspan="8">{{ $schedule }}</td>
		</tr>
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; ">Volume details (FCL): </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; ">{{ $fcl_cntr20 }}</td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 30px; font-weight: bold; ">&times; 20'</td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; ">{{ $fcl_cntr40 }}</td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 30px; font-weight: bold; ">&times; 40'</td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; ">{{ $fcl_cntr45 }}</td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 30px; font-weight: bold; ">&times; 45'</td>
			{{-- <td style="border: 1px solid #B7B7B7; padding: 10px; background-color: #FDFAF6;"></td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 30px; font-weight: bold; background-color: #FDFAF6;"></td> --}}
		</tr>
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; background-color: #FDFAF6;">Volume details (LCL): </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px;background-color: #FDFAF6;">{{ $lcl_length }}</td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 30px; font-weight: bold; background-color: #FDFAF6;">Length(mm)</td>
			<td style="border: 1px solid #B7B7B7; padding: 10px;background-color: #FDFAF6;">{{ $lcl_width }}</td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 30px; font-weight: bold; background-color: #FDFAF6;"> Width(mm)</td>
			<td style="border: 1px solid #B7B7B7; padding: 10px;background-color: #FDFAF6;">{{ $lcl_height }}</td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 30px; font-weight: bold; background-color: #FDFAF6;"> Height(mm)</td>
			{{-- <td style="border: 1px solid #B7B7B7; padding: 10px;">{{ $lcl_weight }}</td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 30px; font-weight: bold; "> Weight (kgs)</td> --}}
		</tr>
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; ">Commodity: </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; " colspan="8">{{ $commodity }}</td>
		</tr>
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; background-color: #FDFAF6;">Cargo Type: </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; background-color: #FDFAF6;" colspan="8">{{ $cargo }}</td>
		</tr>
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; ">Cargo Weight: </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px;" colspan="8">{{ $cargo_weight }}</td>
		</tr>
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; background-color: #FDFAF6;">Gross Weight: </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px;background-color: #FDFAF6;" colspan="8">{{ $gross_weight }}</td>
		</tr>
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; ">How Goods is packed? </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px;" colspan="8">{{ $how_good }}</td>
		</tr>
		<tr>
			<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; background-color: #FDFAF6;">Remark: </td>
			<td style="border: 1px solid #B7B7B7; padding: 10px; background-color: #FDFAF6;" colspan="8">{{ $remark }}</td>
		</tr>
	</table>

	<br/>
	<br/>
	<i>Sent from automatically alerted system,</i>
</body>