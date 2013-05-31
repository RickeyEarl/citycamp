function getPermitNumber(data){
	for(x=0;x<=data.features.length;x++){
		permitNumber = fixPermitNumber(permitNumber = data.features[x].attributes.PERMIT_NUMBER);		
		console.log(permitNumber);
		$('body').append("<table id='outputTable'></table>")
		$.ajax{
			url:"api.php",
			dataType:'json',
			data:{
				action:'getPermit',
				permitNumber:permitNumber
			},
			success:function(data0){
				var appendString = "<tr>"
				for(x=0;x<=data0.length;x++){
					var appendString = appendString + "<td>" + data0[x] + "</td>";
				}
				var appendString = appendString + "</tr>";
			},
			error:function(data0){
				alert(data)
			}
		}
	}
}

function fixPermitNumber(number){
	var numberArr = number.split(" ");
	return numberArr[0] + "-" + numberArr[1];
}