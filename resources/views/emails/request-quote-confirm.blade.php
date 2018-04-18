
<body style="    background-color: #E8E7E6;font-family: sans-serif;">	
   	<div style="    max-width: 600px;
    margin: 0px auto;
    padding-bottom: 30px;
    background-color: white;
    margin-top: 50px;
    border-top: 10px solid #619c7f;
    box-shadow: 1px 1px 1px 1px #D4D4D4;">

	    <div class="" style="text-align: center;
    padding: 30px;
    border-bottom: 1px solid #DEDEDE;
    margin-bottom: 20px;">
	    	<img class="logo revel_animate" src="http://tenglaygroup.com/img/teng-lay-group.png" alt="tenglaygroup logo" data-sr-id="2" style="; visibility: visible;  -webkit-transform: translateY(0) scale(1); opacity: 1;transform: translateY(0) scale(1); opacity: 1;-webkit-transition: -webkit-transform 1s cubic-bezier( 0.6, 0.2, 0.1, 1 ) 0s, opacity 1s cubic-bezier( 0.6, 0.2, 0.1, 1 ) 0s; transition: transform 1s cubic-bezier( 0.6, 0.2, 0.1, 1 ) 0s, opacity 1s cubic-bezier( 0.6, 0.2, 0.1, 1 ) 0s;  width: 200px">
	    </div>
	    <div style="padding: 15px; border-bottom: 1px solid #F3F3F3;
    padding-bottom: 30px; ">
	    	<div style="font-weight: 400; font-size: 14px;">
				Dear {{ $contact_person_name }},
				<br/>
				<br/>
				We are grateful for your interests and having contacted us through our website contact form.
				Our team will got notified and be in your service shortly. 
				<br/>
				<br/>
				We love to help and hear from you!
			</div>
		</div>
		<div style="padding: 15px;">
			<br/>
			<h3>Your message</h3>
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
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; ">Phone Number: </td>
					<td style="border: 1px solid #B7B7B7; padding: 10px;">{{ $contact_phone }}</td>
				</tr>
				<tr>
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold;background-color: #FDFAF6;">Email: </td>
					<td style="border: 1px solid #B7B7B7; padding: 10px; background-color: #FDFAF6;">{{ $contact_email }}</td>
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
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold;background-color: #FDFAF6;">Place of receipt: </td>
					<td style="border: 1px solid #B7B7B7; padding: 10px; background-color: #FDFAF6;" colspan="8">{{ $por }}</td>
				</tr>
				<tr>
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; ">Place of delivery: </td>
					<td style="border: 1px solid #B7B7B7; padding: 10px;" colspan="8">{{ $pod }}</td>
				</tr>
				<tr>
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; background-color: #FDFAF6;">Volume details (FCL): </td>
					<td style="border: 1px solid #B7B7B7; padding: 10px; background-color: #FDFAF6;">{{ $fcl_cntr20 }}</td>
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 30px; font-weight: bold; background-color: #FDFAF6;">&times; 20'</td>
					<td style="border: 1px solid #B7B7B7; padding: 10px; background-color: #FDFAF6;">{{ $fcl_cntr40 }}</td>
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 30px; font-weight: bold; background-color: #FDFAF6;">&times; 40'</td>
					<td style="border: 1px solid #B7B7B7; padding: 10px; background-color: #FDFAF6;">{{ $fcl_cntr45 }}</td>
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 30px; font-weight: bold; background-color: #FDFAF6;">&times; 45'</td>
					<td style="border: 1px solid #B7B7B7; padding: 10px; background-color: #FDFAF6;"></td>
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 30px; font-weight: bold; background-color: #FDFAF6;"></td>
				</tr>
				<tr>
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; ">Volume details (LCL): </td>
					<td style="border: 1px solid #B7B7B7; padding: 10px;">{{ $lcl_length }}</td>
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 30px; font-weight: bold; ">Length(mm)</td>
					<td style="border: 1px solid #B7B7B7; padding: 10px;">{{ $lcl_width }}</td>
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 30px; font-weight: bold; "> Width(mm)</td>
					<td style="border: 1px solid #B7B7B7; padding: 10px;">{{ $lcl_height }}</td>
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 30px; font-weight: bold; "> Height(mm)</td>
					<td style="border: 1px solid #B7B7B7; padding: 10px;">{{ $lcl_weight }}</td>
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 30px; font-weight: bold; "> Weight (kgs)</td>
				</tr>
				<tr>
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; background-color: #FDFAF6;">Commodity: </td>
					<td style="border: 1px solid #B7B7B7; padding: 10px; background-color: #FDFAF6;" colspan="8">{{ $commodity }}</td>
				</tr>
				<tr>
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; ">Cargo Weight: </td>
					<td style="border: 1px solid #B7B7B7; padding: 10px;" colspan="8">{{ $cargo_weight }}</td>
				</tr>
				<tr>
					<td style="border: 1px solid #B7B7B7; padding: 10px; width: 150px; font-weight: bold; background-color: #FDFAF6;">Remark: </td>
					<td style="border: 1px solid #B7B7B7; padding: 10px; background-color: #FDFAF6;" colspan="8">{{ $remark }}</td>
				</tr>
			</table>
		</div>
		<br/>
		<br/>
		<i style="display: inline-block; padding: 15px;  font-size: 11px;">Sent from automatically alerted system,</i>
	</div>
</body>